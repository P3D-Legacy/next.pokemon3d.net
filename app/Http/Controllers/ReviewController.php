<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ReviewController extends Controller
{
    public function postSiteReview(Request $request){
        $data = [
            'session' => Cookie::get(session()->getName()),
            'scope' => $request->get(),
            'stars' => $request->get('stars'),
            'text' => $request->get('text'),
            'name' => $request->get('name'),
            'validated' => $request->get(false),
        ];

        Review::create($data);
        return redirect()->route('index');
    }
}
