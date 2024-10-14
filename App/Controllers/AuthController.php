<?php

namespace App\Controllers;

use App\Models\User;
use App\Helpers\Auth;

class AuthController
{
    public function loginPage()
    {
        return view("auth/login", 'Login');
    }
    public function registerPage()
    {
        return view('auth/register', 'Register');
    }
    public function login()
    {
        if (isset($_POST['ok'])) {
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $data = [
                    $_POST['email'],
                    $_POST['password']
                ];
                $user = Auth::attach($data);

                if ($user->role == 'user') {
                    header('location: /');
                } elseif ($user->role == 'admin') {
                    header('location: /kitob');
                }else{
                    header('location: /login');
                }
            }
        }
    }
    public function register()
    {
        if (!empty($_POST['name']) && !empty($_POST['email'] && !empty($_POST['password']))) {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            ];

            $user = Auth::registr($data);
            if ($user) {
                header('location: /');
            }
        } else {

        }
    }
    public function logout()
    {
        Auth::logout();
        header('location: /login');
    }
}
?>