<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index(){
        $data = [
            'reviews' => Review::validated()->inRandomOrder()->get(),
        ];

        return view('welcome', $data);
    }

    public function switchBackground($background){
        if(file_exists(public_path('images/layout/'.$background.'.png'))){
            Session::put('user_bg', $background);
        }

        return redirect()->route('index');
    }
}
