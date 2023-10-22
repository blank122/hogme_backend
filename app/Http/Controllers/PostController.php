<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class PostController extends Controller
{
    //
    public function imageupload(Request $request)
    {
        try{

        //     $image = new Post;
        //     $image->title = $request->title;

        //     if ($request->hasFile('image')) {

        //     $path = $request->file('image')->store('images');
        //     $image->url = $path;
        //    }
        // $image->save();
        // return new ImageResource($image);

            $validatePost = Validator::make($request->all(),
            [
                'body' => 'required',
                'image' => 'required',
            ]);
            if($validatePost->fails())
            {
                return response()->json([
                    'status' => false,
                    'errors' => $validatePost->errors(),
                    'message' => $validatePost->errors(),
                ]);
            }
            $image = $request->file('image');
            $imageName = uniqid().$image->getClientOriginalName();
            $image->move(public_path('testpostimage'), $imageName);
            $post = Post::create([
                'body'=> $request->body,
                'image'=>$imageName,
            ]);
            if($post){
                return response([
                    'status' => 200,
                    'message' => 'Post has been created'
                ], 200);
            }else{
                return response([
                    'message' => 'Something went wrong'
                ], 500);
            }

            // validate the incoming inputs from the user
            // $user = User::create([
            //     'first_name' => $request->firstname,
            //     'last_name' => $request->lastname,
            //     'contact_number' => $request->contact_number,
            //     'email' => $request->email,
            //     'password' => Hash::make($request->password)
            // ]);

            // return response()->json([
            //     'status' => true,
            //     'message' => 'User created Successfully',
            //     'token' => $user->createToken("API TOKEN")->plainTextToken
            // ]);
        }catch(Exception $e){
            $response =['status'=>500,'message'=> $e];
        }
    }
}
