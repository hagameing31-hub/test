<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profile;
use App\Models\Service;
use App\Models\Experience;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $services = Service::all();
        $experiences = Experience::orderBy('year', 'desc')->get();

        return view('client.home', compact('profile', 'services', 'experiences'));
    }
}
