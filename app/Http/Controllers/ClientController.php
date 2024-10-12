<?php

namespace App\Http\Controllers;


use App\Http\Requests\ScheduleTourRequest;
use App\Http\Services\ScheduleTourService;
use App\Models\Properties;
use App\Models\Tours;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    protected $scheduleTourService;


    public function __construct(ScheduleTourService $scheduleTourService)
    {
        $this->scheduleTourService = $scheduleTourService;

    }

    public function clientDashboard()
    {

        $user = auth()->user();
        $tours = Tours::where('uid',$user->uid)->with('propertyTours')->count();

        return view('client.dashboard',[
            'tours' => $tours,
            'user' => $user,
        ]);
    }

    public function profile()
    {

        $user = auth()->user();
        return view('client.profile',[
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

    public function tourView($pid)
    {
        $property = Properties::with('propertyAgent')->with('images')->findOrFail($pid);
        return view('client.schedule-tour',[
            "property"=> $property,
        ]);
    }

    public function scheduleTour(Request $request,ScheduleTourRequest $tourRequest)
    {
        try{


            $tour = $tourRequest->validated();

            $existingTour = Tours::where('uid', auth()->user()->uid)
                ->where('pid', $tour['pid'])
                ->first();

            if ($existingTour) {
                return Redirect::back()->with('error', 'You already have a scheduled tour for this property.');
            }


            $this->scheduleTourService->createTour($tour);

            $request->session()->flash('success','Tour Scheduled');
            return to_route('property-detail', ['pid' => $tour['pid']]);

        } catch (\Exception $exception){
            $request->session()->flash('error','Sorry an error occurred. Please try again');
            return Redirect::back();


        }

    }

    public function tourHistory()
    {
        $user = auth()->user();
        $uid = auth()->user()->uid;
        $tours = Tours::where('uid',$uid)->with('tourProperty')->with('agent')->paginate(15);

        return view('client.tour-history',[
            'tours' => $tours,
            'user' => $user,
        ]);
    }

}
