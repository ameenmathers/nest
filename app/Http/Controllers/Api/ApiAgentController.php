<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Images;
use App\Models\Properties;
use App\Models\PropertyAmenities;
use App\Models\PropertyFeature;
use App\Models\Tours;
use App\Models\User;
use Illuminate\Http\Request;

class ApiAgentController extends Controller
{
    public function agentDashboard()
    {
        $user = auth()->user();
        $toursCount = Tours::where('agent_id', $user->uid)->count();
        $propertiesCount = Properties::where('agent_id', $user->uid)->count();

        return response()->json([
            'user' => $user,
            'tours_count' => $toursCount,
            'properties_count' => $propertiesCount,
        ]);
    }

    public function acceptScheduledTour(Request $request, $trid)
    {
        try {
            $tour = Tours::findOrFail($trid);
            $tour->update([
                'tour_status' => 'accepted',
            ]);

            return response()->json([
                'message' => 'Tour Accepted',
                'tour' => $tour,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Sorry, an error occurred. Please try again.',
                'error' => $exception->getMessage(),
            ], 500);
        }
    }

    public function rescheduleTour(Request $request, $trid)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
        ]);

        try {
            $tour = Tours::findOrFail($trid);
            $tour->update([
                'date' => $request->date,
                'time' => $request->time,
            ]);

            return response()->json([
                'message' => 'Tour Rescheduled',
                'tour' => $tour,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Sorry, an error occurred. Please try again.',
                'error' => $exception->getMessage(),
            ], 500);
        }
    }

    public function scheduledTourHistory()
    {
        $uid = auth()->user()->uid;
        $tours = Tours::where('agent_id', $uid)
            ->with('tourProperty')
            ->get();

        return response()->json([
            'tours' => $tours
        ]);
    }

    public function properties()
    {
        $uid = auth()->user()->uid;
        $properties = Properties::where('agent_id', $uid)->with('propertyAgent','features','amenities')->get();

        return response()->json([
            'properties'=> $properties
        ]);
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

        try {
            // Handle thumbnail upload
            $thumbnail = $request->file('thumbnail');
            $fileName = time() . '_' . $thumbnail->getClientOriginalName();
            $thumbnail->move(public_path('images'), $fileName);
            $thumbPath = url("/images/$fileName");

            // Create property
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
                'google_map_url' => $request->google_map_url,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);

            // Store property images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('property_images'), $imageName);
                    $path = url("property_images/$imageName");

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

            return response()->json([
                'message' => 'Property created successfully',
                'property' => $property,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'An error occurred. Please try again.',
                'error' => $exception->getMessage(),
            ], 500);
        }
    }
}
