<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dash;

class DashController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware(function($request, $next){
            $this->setFile = $request->fileDash;
            $this->setPostedBy = Auth::user()->name;
        });
    }

    public function store(){
        Dash::create([
            'posted_by' => $this->SetPostedBy,
            'file' => $this->setFile,
        ]);
        return redirect('home')->with(['success'=>'Data Terupload']);
    }

    public function update($id){
        Dash::where('id', $id)->update([
            'posted_by' => $this->SetPostedBy,
            'file' => $this->setFile,
        ]);
        return redirect('home')->with(['success'=>'Data Terganti']);
    }

    public function destroy($id){
        Dash::where('id', $id)->delete();
        return redirect('home')->with(['success'=>'Data Terhapus']);
    }

}
