<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Validator;
use Exception;
class UserController extends Controller
{
    //
    public function index(Request $request)
    {

        // $user = User::select('*')
        //         ->where(['role', '=', 'farmers'],
        //                 ['status', '=', 'Default']);
        // $user = DB::table('users')// '=' operator is removed in this line
	  	// 		  ->where('role', '=', 'farmers')
	  	// 		  ->where('status', '=', 'Default')
        //           ->get()
	  	// 		  ->paginate(10);

        $user = User::where('role', '=', 'farmers')->where('status', '=', 'Default')->orderBy('created_at', 'DESC')->paginate(5);
        $pending = User::where('role', '=', 'farmers')->where('status', '=', 'Default')->count();
        $totalUser = User::where('role', '=', 'farmers')->count();
        $rejected = User::where('role', '=', 'farmers')->where('status', '=', 'Rejected')->count();
        //get the single image record without lopping through the entire collection
        // $facilityImage  = User::where('facility_picture')->first();

        // $validID  = User::where('valid_id')->first();


        return view('admin.members.mindex', compact('user', 'pending', 'rejected', 'totalUser'));
    }

    public function viewSingleRecord()
    {

    }

    public function approveApplication(Request $request, $id)
    {

        $userEmail = User::where('id',$id)->pluck('email');


        $mailData = [
            'title'=> 'Mail from HOGME',
            'body' => 'Your application has been approved',
        ];
        \Illuminate\Support\Facades\Mail::to($userEmail)->send(new DemoMail($mailData));

        User::where('id', $id)->update(['status'=>'Approve']);

        return redirect(route('memberIndex'))->with('success','Member Application has been Approved');
    }
    public function rejectApplication($id)
    {

        $userEmail = User::where('id',$id)->pluck('email');


        $mailData = [
            'title'=> 'Mail from HOGME',
            'body' => 'Your application has been Rejected. </br> The application must be rejected due to some reasons such as: </br> 1. The Image you attached during the application is not clear. </br> 2. The information you provided has some issues.',
        ];
        \Illuminate\Support\Facades\Mail::to($userEmail)->send(new DemoMail($mailData));

        User::where('id', $id)->update(['status'=>'Rejected']);

        return redirect(route('memberIndex'))->with('error','Member Application has been Rejected');
    }


    public function registerView()
    {
        //return the view for register of farmers
        return view('user.register_farmer');

    }
    public function registerFarmer(Request $request)
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
                // return response()->json([
                //     'status' => false,
                //     'message' => $validateUser->errors(),
                //     'errors' => $validateUser->errors(),
                // ]);
                return redirect()->route('home')->with('error', $validateUser->errors());

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
            if($registerfarmer){
                // return response([
                //     'status' => 200,
                //     'message' => 'Successfully Created! Plss wait for you application to be verified by the admin',
                //     'token' => $registerfarmer->createToken("API TOKEN")->plainTextToken
                // ], 200);
                return redirect()->route('home')->with('success', 'Your account has been created successfully. The admin will now review your application. Please wait for the email for any admin response');

            }else{
                return redirect()->route('home')->with('error', 'something went wrong');

            }

        }catch(Exception $e){
            return redirect()->route('home')->with('error', 'something went wrong: '+ $e);

        }
    }

}
