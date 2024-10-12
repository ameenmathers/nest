<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\UserRegistrationRequest;
use App\Http\Services\UserRegisterService;
use App\Models\Images;
use App\Models\Properties;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    protected $userRegistrationService;


    public function __construct(UserRegisterService $userRegistrationService)
    {
        $this->userRegistrationService = $userRegistrationService;

    }

    public function register(Request $request, UserRegistrationRequest $userRequest)
    {
        $validator = $userRequest->validated();
        $user = $this->userRegistrationService->createUser($validator,$request);

        $success['message'] = "User Registration Successfully!";
        return response()->json(['data' => $success], 200);
    }

    public function agentRegister(Request $request ,UserRegistrationRequest $userRequest)
    {

            $validatedData = $userRequest->validated();

            $user = $this->userRegistrationService->createUser($validatedData,$request);

            $this->userRegistrationService->createAgent($user->uid,$request);
//          $user->notify(new SignupActivate($user));

            $success['message'] = "User Registration Successfully!";
            return response()->json(['data' => $success], 200);

    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = auth()->user();
            $token = $user->createToken('passport_token')->accessToken;
            $success['massage'] = "Login Successfully!";
            return response()->json([
                'data'=>$success,
                'token'=>$token,
                'role'=>$user->role,
            ], 200);
        }
        else{
            return response()->json(['message'=> 'User does not exist'], 422);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        return response()->json(['message' => 'You have been successfully logged out!'], 200);
    }

    public function properties()
    {
        $properties = Properties::with('propertyAgent','features','amenities')->get();
        return response()->json([
            'properties' => $properties,
        ]);
    }

    public function propertySearch(Request $request)
    {
        $category = $request->input('category');
        $type = $request->input('type');
        $district = $request->input('district');
        $price = $request->input('price');
        $bedrooms = $request->input('bedrooms');

        $query = Properties::with('propertyAgent', 'images');

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

        return response()->json([
            'results' => $results,
        ]);
    }

    public function propertyDetail($pid)
    {
        $property = Properties::with('propertyAgent', 'images')->findOrFail($pid);
        $images = Images::where('pid', $pid)->get();

        return response()->json([
            'property' => $property,
            'images' => $images,
        ]);
    }

    public function profile()
    {
        $user = auth()->user();
        return response()->json([
            'user' => $user,
        ]);
    }

    public function updateProfile(Request $request)
    {
        try {
            $user = User::findOrFail(auth()->user()->uid);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->save();

            return response()->json([
                'message' => 'Profile Updated',
                'user' => $user,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'Sorry, an error occurred'. $exception,
                'error' => $exception->getMessage(),
            ], 500);
        }
    }


}
