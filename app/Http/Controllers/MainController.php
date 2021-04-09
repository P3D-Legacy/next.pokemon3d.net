<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function switchBackground($background){
        if(file_exists(public_path('images/layout/'.$background.'.png'))){
            Session::put('user_bg', $background);
        }
        return redirect()->route('index');
    }
}
