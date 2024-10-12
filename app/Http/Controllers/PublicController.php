<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserRegistrationRequest;

use App\Http\Services\UserRegisterService;
use App\Models\Images;
use App\Models\Properties;
use App\Notifications\SignUpActivate;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Property;

class PublicController extends Controller
{

    protected $userRegistrationService;


    public function __construct(UserRegisterService $userRegistrationService)
    {
        $this->userRegistrationService = $userRegistrationService;

    }

    public function signUp()
    {
        return view('auth.register');
    }

    public function clientRegister(Request $request ,UserRegistrationRequest $userRequest)
    {
        try {
            $validatedData = $userRequest->validated();
            $user = $this->userRegistrationService->createUser($validatedData,$request);
//          $user->notify(new SignupActivate($user));

            $request->session()->flash('success', 'Client signed up successfully');
            return redirect()->route('login');
        } catch (\Exception $exception) {
            return redirect()->route('signup')->with('error', 'Client signup was unsuccessful. Please try again');
        }
    }

    public function agentRegister(Request $request ,UserRegistrationRequest $userRequest)
    {
      try {
            $validatedData = $userRequest->validated();

            $user = $this->userRegistrationService->createUser($validatedData,$request);

            $this->userRegistrationService->createAgent($user->uid,$request);
//          $user->notify(new SignupActivate($user));

            $request->session()->flash('success', 'Agent signed up successfully');
            return redirect()->route('login');
        } catch (\Exception $exception) {
            return redirect()->route('signup')->with('error', 'Agent signup was unsuccessful. Please try again');
        }
    }

    public function index()
    {

        return view('welcome');
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function properties()
    {
        $properties = Properties::all();
        return view('properties',[
            'properties' => $properties,
        ]);
    }

    public function propertyDetail($pid)
    {
        $property = Properties::with('propertyAgent')->with('images')->findOrFail($pid);
        $images = Images::where('pid', $pid)->get();
        return view('property-detail',[
            "property" => $property,
            "images" => $images,

        ]);
    }

    public function contact()
    {
        return view('contact-us');
    }

    public function propertySearch(Request $request)
    {
        $category = $request->input('category');
        $type = $request->input('type');
        $district = $request->input('district');
        $price = $request->input('price');
        $bedrooms = $request->input('bedrooms');

        $query = Properties::with('propertyAgent')->with('images');

        if ($category) {
            $query->orWhereRaw('LOWER(category) = ?', [strtolower($category)]);
        }

        if ($type) {
            $query->orWhereRaw('LOWER(type) = ?', [strtolower($type)]);
        }

        if ($district) {
            $query->orWhereRaw('LOWER(district) = ?', [strtolower($district)]);
        }

        if ($price) {
            $query->orWhere('price', '<=', $price);
        }

        if ($bedrooms) {
            $query->orWhere('bedroom', $bedrooms);
        }

        $results = $query->get();


        return view('property-search', compact('results'));
    }



}
