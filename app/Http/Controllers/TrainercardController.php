<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainercardController extends Controller
{

    function index() {
        return view('trainercard.form');
    }

    function generate(Request $request) {
        $name = $request->get('name');
        $bg = $request->get('background');
        $data = ['name' => $name, 'bg' => $bg];
        return view('trainercard.result', $data);
    }

    function getImage(Request $request) {
        $name = $request->get('name');
        $bg = $request->get('background');
        $image = (new \App\CustHelpers\TrainercardHelper($name, $bg))->makeTrainerCardPng();
        $data = ['name' => $name, 'bg' => $bg];
        return $image->response('png');
    }
}
