<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecretaryController extends Controller
{
    //
    public function secretarydashboard()
    {
        return view('secretary.secretarydashboard');
    }
}
