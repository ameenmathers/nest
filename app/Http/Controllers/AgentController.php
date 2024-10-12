<?php

namespace App\Http\Controllers;


use App\Models\Images;
use App\Models\Properties;
use App\Models\PropertyAmenities;
use App\Models\PropertyFeature;
use App\Models\Tours;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AgentController extends Controller
{

    public function agentDashboard()
    {

        $user = auth()->user();
        $tours = Tours::where('agent_id',$user->uid)->with('propertyTours')->count();
        $properties = Properties::where('agent_id',$user->uid)->count();

        return view('agent.dashboard',[
            'tours' => $tours,
            'properties' => $properties,
            'user' => $user,
        ]);
    }

    public function profile()
    {

        $user = auth()->user();
        return view('agent.profile',[
            'user' => $user,
        ]);
    }

    public function updateProfile(Request $request)
    {

        try{

            $user = User::findOrFail(auth()->user()->uid);
            $user->update($request->all());

            $request->session()->flash('success','Profile Updated');
            return Redirect::back();


        } catch (\Exception $exception){

            $request->session()->flash('error','Sorry an error occurred. Please try again');
            return Redirect::back();

        }


    }


    public function acceptScheduledTour(Request $request, $trid)
    {
        try{


            $tours = Tours::findorFail($trid);
            $tours->update([
                'tour_status' => 'accepted',
            ]);


            $request->session()->flash('success','Tour Accepted');
            return Redirect::back();

        } catch (\Exception $exception){

            $request->session()->flash('error','Sorry an error occurred. Please try again');
            return Redirect::back();

        }

    }

    public function rescheduleTour(Request $request, $trid)
    {
        try{

            $date = $request->date;
            $time = $request->time;
            $tours = Tours::find($trid);
            $tours->update([
                'date' => $date,
                'time' => $time,
            ]);


            $request->session()->flash('success','Tour Rescheduled');
            return Redirect::back();

        } catch (\Exception $exception){

            $request->session()->flash('error','Sorry an error occurred. Please try again');
            return Redirect::back();

        }

    }

    public function scheduledTourHistory()
    {
        $user = auth()->user();
        $uid = $user->uid;
        $tours = Tours::where('agent_id',$uid)->with('tourProperty')->paginate(15);

        return view('agent.tour-history',[
            'tours' => $tours,
            'user' => $user,
        ]);
    }

    public function properties()
    {
        $user = auth()->user();
        $uid = $user->uid;
        $properties = Properties::where('agent_id',$uid)->paginate(15);

        return view('agent.properties',[
            'properties' => $properties,
            'user' => $user,
        ]);
    }

    public function uploadPropertyView()
    {

        $user = auth()->user();
        return view('agent.upload-property',['user'=>$user]);
    }

    public function uploadProperty(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'district' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'bedroom' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'bathroom' => 'required|string|max:255',
            'parking_space' => 'required|string|max:255',
            'google_map_url' => 'required|string|max:255',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'feature_names.*' => 'nullable|string|max:255',
            'feature_values.*' => 'nullable|string|max:255',
            'amenities.*' => 'nullable|string|max:255',
        ]);

        //try {
            $thumbnailPath = $request->file('thumbnail');
            $fileName = time() . '.' . $thumbnailPath->getClientOriginalExtension();

            $request->thumbnail->move(public_path('images'), $fileName);
            $thumbPath = url("/images/$fileName");



            $property = Properties::create([
                'agent_id' => auth()->user()->uid,
                'name' => $request->name,
                'approved' => false,
                'category' => $request->category,
                'description' => $request->description,
                'thumbnail' => $thumbPath,
                'district' => $request->district,
                'size' => $request->size,
                'bedroom' => $request->bedroom,
                'price' => $request->price,
                'type' => $request->type,
                'bathroom' => $request->bathroom,
                'parking_space' => $request->parking_space,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);

            // Store property images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {

                    $fileName1 = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('property_images'), $fileName1);
                    $path = url("property_images/$fileName1");


                    Images::create([
                        'pid' => $property->pid,
                        'image' => $path,
                    ]);
                }
            }

            // Store property features
            if ($request->has('feature_names')) {
                foreach ($request->feature_names as $index => $feature_name) {
                    if (!empty($feature_name) && !empty($request->feature_values[$index])) {
                        PropertyFeature::create([
                            'pid' => $property->pid,
                            'feature_name' => $feature_name,
                            'feature_value' => $request->feature_values[$index],
                        ]);
                    }
                }
            }

            // Store property amenities
            if ($request->has('amenities')) {
                foreach ($request->amenities as $amenity) {
                    if (!empty($amenity)) {
                        PropertyAmenities::create([
                            'pid' => $property->pid,
                            'name' => $amenity,
                        ]);
                    }
                }
            }

            $request->session()->flash('success', 'Property created successfully');
            return redirect()->back();

//        } catch (\Exception $exception) {
//            $request->session()->flash('error', 'An error occurred. Please try again');
//            return redirect()->back()->withInput();
//        }
    }
}
