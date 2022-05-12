<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dash;
use App\Models\Content;

class HomeController extends Controller
{

    public function index(){
        $data_dash = Dash::where('deleted_at', NULL)->first();
        $data_cont = Content::with('pages')->where('deleted_at', NULL)->get();
        return view('home', compact('data_dash', 'data_cont'));
    }
}
