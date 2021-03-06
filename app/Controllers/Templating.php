<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel; //ini biar bisa nyimpen ke DB nya, tp perlu dibuat constructornya
class Templating extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel(); //nah ini contruct utk usermodel
    }

    public function index()
    {
        $data = [
            'title' => "Blog - Posts",
        ];
        return view('v_admin', $data);
    }

    public function register()
    {
        $data = [
            'title' => "Register",
        ];
        return view('v_register', $data);
    }

    public function saveRegister()
    {
        $request = service('request');
        $data = [
            'fullname' => $request->getVar('fullname'),
            'email' => $request->getVar('email'),
            'password' => $request->getVar('password'),
        ];

        $this->userModel->insert($data);
        return redirect()->to(base_url('register'));
    }
}