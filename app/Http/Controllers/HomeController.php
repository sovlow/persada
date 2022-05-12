<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dash;

class HomeController extends Controller
{
    public function index(){
        $data = Dash::where('deleted_at', NULL)->first();
        return view('home', compact('data'));
    }
}
