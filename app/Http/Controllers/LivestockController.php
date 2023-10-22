<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LivestockController extends Controller
{
    //
    public function index()
    {
        //return the view for all livestock module
        //$announcement = Announcement::all();
        return view('admin.livestock.lindex');

    }
}
