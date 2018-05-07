<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //TODO:路由中 resource->show() 展示个人信息


    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

}
