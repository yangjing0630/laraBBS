<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChinaBankController extends Controller
{
    //

    public function index()
    {
        return view('chinaBank.chinaBank', [
            'photoId' => 2348,
        ]);
    }
}
