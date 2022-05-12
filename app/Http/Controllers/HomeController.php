<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dash;
use App\Models\Content;
use App\Models\Contact;

class HomeController extends Controller
{

    public function index(){
        $data_dash = Dash::where('deleted_at', NULL)->first();
        $data_content = Content::with('pages')->where('deleted_at', NULL)->get();
        $data_contact = Contact::first();
        return view('home', compact('data_dash', 'data_content', 'data_contact'));
    }
}
