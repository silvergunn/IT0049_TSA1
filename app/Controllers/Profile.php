<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $data = [
            'title' => 'User Profile',
            'user'  => $userModel->first(),
        ];

        return view('profile/index', $data);
    }
}