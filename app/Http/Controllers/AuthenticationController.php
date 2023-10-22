<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;

class AuthenticationController extends Controller
{


    // public function multipleUploadRegister(Request $request)
    // {
    //     try{
    //         $validateUser = Validator::make($request->all(),
    //         [
    //             'first_name' => 'required',
    //             'last_name' => 'required',
    //             'contact_number' => 'required|min:11|unique:users,contact_number',
    //             'facility_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //             'valid_id'=>'required|image|mimes:jpeg,png,jpg|max:2048',
    //             'email' => 'required|email|unique:users,email',
    //             'password' => 'required|min:6'
    //         ]);
    //         if($validateUser->fails())
    //         {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => $validateUser->errors(),
    //                 'errors' => $validateUser->errors(),
    //             ]);
    //         }
    //         $facilityImages = []; //this variable will hold the data of multiple file upload of facility images
    //         $validId = [];

    //         //logic for multiple file upload
    //         if($request->facility_picture('users')){
    //             foreach($request->facility_picture('users') as $key => $file)
    //             {

    //             $facilityImagesFileName = time().rand(1,99).'.'.$file->extension();
    //             $file->move(public_path('uploads'), $facilityImagesFileName);
    //             $files[]['name'] = $file_name;

    //             }
    //         }

    //     }catch(Exception $e){

    //     }
    // }

    public function register(Request $request)
    {
        try{
            $validateUser = Validator::make($request->all(),
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'contact_number' => 'required|min:11|unique:users,contact_number',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'facility_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'valid_id'=>'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            if($validateUser->fails())
            {
                return response()->json([
                    'status' => false,
                    'message' => $validateUser->errors(),
                    'errors' => $validateUser->errors(),
                ]);
            }

            $facility_picture = $request->file('facility_picture');
            $imageNameFacility = uniqid().$facility_picture->getClientOriginalName();
            $facility_picture->move(public_path('postImages'), $imageNameFacility);

            $valid_id = $request->file('valid_id');
            $imageNameValidId = uniqid().$valid_id->getClientOriginalName();
            $valid_id->move(public_path('postImages'), $imageNameValidId);

            $registerfarmer = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'contact_number' => $request->contact_number,
                'email' => $request->email,
                'password' => $request->password,
                'facility_picture' => $imageNameFacility,
                'valid_id'=>$imageNameValidId
            ]);
           $registerfarmer->save();
           return response()->json([
            'message' => 'User registered successfully',
            ], 200);

        }catch(Exception $e){
            return response([
                'message' => 'Something went wrong' + $e
            ], 500);
        }
    }

    public function loginApi(Request $request)
    {
        //to validate input fields comming from the user to prevent sql injection attack
        $attrs = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(!Auth::attempt($attrs)){
            return response([
                'message' => 'Invalid Credentials.'
            ], 403);
        }

        if($request->user()->role === 'farmers' && $request->user()->status === 'Approve')
        {
            return response([
                'user' => auth()->user(),
                'token' => $request->user()->createToken('blog_db')->plainTextToken
            ], 200);
        }else if($request->user()->role === 'farmers' && $request->user()->status !== 'Approve')
        {
            return response([
                'message' => 'Your application is still ongoing.'
            ], 401);
        }
        else
        {
            return response([
                'message' => 'Unauthorized Access'
            ], 401);
        }

    }

}
