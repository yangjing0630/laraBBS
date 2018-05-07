<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Handlers\ImageUploadHandler;

class UsersController extends Controller
{
    //TODO:路由中 resource->show() 展示个人信息


    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    //TODO:编辑用户信息

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    //TODO:更新用户信息

    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user)
    {
        $data = $request->all();

        if ($request->avatar) {

            $result = $uploader->save($request->avatar, 'avatars', $user->id, 362);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }
        $user->update($data);

        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功');
    }

}
