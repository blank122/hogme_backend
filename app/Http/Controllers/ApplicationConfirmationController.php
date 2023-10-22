<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicationConfirmationController extends Controller
{
    //
    public function index()
    {

    }
    public function approveApplication(User $user)
    {
        $user->status = 'Approve';
        $user->save();
        return redirect(route('memberIndex'))->with('success','Member Application has been Approved');
    }
    public function rejectApplication(User $user)
    {
        $user->status = 'Rejected';
        $user->save();
        return redirect(route('memberIndex'))->with('success','Member Application has been Rejected Sucessfully');
    }
}
