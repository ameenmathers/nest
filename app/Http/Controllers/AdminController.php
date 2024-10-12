<?php

namespace App\Http\Controllers;

use App\Models\Properties;
use App\Models\Tours;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{


    public function dashboard()
    {

        $user = auth()->user();
        $properties = Properties::get();
        $agents = User::where('role', 'agent')->get();
        $clients = User::where('role', 'client')->get();
        $tours = Tours::get();

        return view('admin.dashboard',[
            'properties' => $properties,
            'clients' => $clients,
            'agents' => $agents,
            'tours' => $tours,
            'user' => $user,
        ]);
    }

    public function agents()
    {
        $agents = User::where('role', 'agent')->with('agentUser')->paginate(15);
        $user = auth()->user();
        return view('admin.agents',[
            'agents' => $agents,
            'user' => $user,
        ]);
    }

    public function clients()
    {
        $clients = User::where('role', 'client')->paginate(15);
        $user = auth()->user();
        return view('admin.clients',[
            'clients' => $clients,
            'user' => $user,
        ]);
    }

    public function tours()
    {
        $tours = Tours::with('client')->with('agent')->with('tourProperty')->paginate(15);
        $user = auth()->user();
        return view('admin.tours',[
            'tours' => $tours,
            'user' => $user,
        ]);
    }

    public function properties(Request $request)
    {
        $properties = Properties::with('agent')->paginate(15);
        $user = auth()->user();
        return view('admin.properties',[
            'properties' => $properties,
            'user' => $user,
        ]);
    }

    public function propertyDetail($pid){

        $properties = Properties::where('pid',$pid)->paginate(15);
        $user = auth()->user();
        return view('admin.properties-detail',[
            'properties' => $properties,
            'user' => $user,
        ]);
    }


    public function approveProperty(Request $request, $pid)
    {
        try{

            $property = Properties::findOrFail($pid);
            $property->update([
                'approved' => 1,
            ]);

            $request->session()->flash('success','Property approved');
            return Redirect::back();



        } catch (\Exception $exception){

            $request->session()->flash('error','Sorry an error occurred. Please try again');
            return Redirect::back();

        }


    }

    public function hideProperty(Request $request, $pid)
    {
        try{

            $property = Properties::findOrFail($pid);
            $property->update([
                'approved' => 0,
            ]);

            $request->session()->flash('success','Property hidden');
            return Redirect::back();



        } catch (\Exception $exception){

            $request->session()->flash('error','Sorry an error occurred. Please try again');
            return Redirect::back();

        }


    }


    public function approveAgent(Request $request, $uid)
    {
        try{

            $user = User::findOrFail($uid);
            $user->update([
                'approved' => 1,
            ]);

            $request->session()->flash('success','Agent approved');
            return Redirect::back();



        } catch (\Exception $exception){

            $request->session()->flash('error','Sorry an error occurred. Please try again');
            return Redirect::back();

        }


    }

    public function banAgent(Request $request, $uid)
    {
        try{

            $user = User::findOrFail($uid);
            $user->update([
                'approved' => 0,
            ]);

            $request->session()->flash('success','Agent banned');
            return Redirect::back();



        } catch (\Exception $exception){

            $request->session()->flash('error','Sorry an error occurred. Please try again');
            return Redirect::back();

        }


    }

    public function deleteProperty(Request $request, $pid)
    {
        try{

            $property = Properties::findOrFail($pid);
            $property->delete();

            $request->session()->flash('success','Property Deleted');
            return Redirect::back();

        } catch (\Exception $exception){
            $request->session()->flash('error','Sorry an error occurred. Please try again');
            return Redirect::back();

        }
    }

    public function deleteUser(Request $request, $uid)
    {
        try{

            $user = User::findOrFail($uid);
            $user->delete();

            $request->session()->flash('success','User Deleted');
            return Redirect::back();

        } catch (\Exception $exception){
            $request->session()->flash('error','Sorry an error occurred. Please try again');
            return Redirect::back();

        }
    }


}
