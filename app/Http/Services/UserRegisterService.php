<?php

namespace App\Http\Services;


use App\Models\Agent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRegisterService
{

    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function createUser($data,$request)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->role = $data['role'];
        $user->email = $data['email'];
        $user->password =  Hash::make($data['password']);


        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $fileName = time() . '.' . $imageFile->getClientOriginalExtension();

            $request->image->move(public_path('uploads'), $fileName);
            $imagePath = url("uploads/$fileName");
            $user->image = $imagePath;
        }

        if ($request->hasFile('nin_image')) {
            $imageFile1 = $request->file('nin_image');
            $fileName1 = time() . '.' . $imageFile1->getClientOriginalExtension();

            $request->nin_image->move(public_path('docs'), $fileName1);
            $imagePath1 = url("uploads/$fileName1");
            $user->nin_image = $imagePath1;

        }


        $user->save();

        return $user;
    }


    public function createAgent($uid,$request)
    {
        $agent = new Agent();
        $agent->uid = $uid;
        $agent->office_address = $request->office_address;
        $agent->home_address = $request->home_address;
        $agent->company_name = $request->company_name;
        $agent->company_contact = $request->company_contact;
        $agent->save();

        return $agent;
    }

}
