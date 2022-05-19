<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function postLogin(Request $request) {
        $userData = array(
            'login' => $request->input('login'),
            'password' => $request->input('password')
        );

        if (ControllerLogic::isNull($userData)) {
            return "false";
        }

        $account = User::where('login', $request->input('login'))->first();
        $user = array(
            'login' => $account->login,
            'password' => $account->password,
            'email' => $account->email,
            'email_confirmed' => $account->email_confirmed,
            'telephone' => $account->telephone,
            'gender' => $account->gender
        );

        if (ControllerLogic::isNull($user) || !ControllerLogic::isCorrectPassword($user['password'], $request->input('password'))) {
            return "false";
        }

        return $user['login'] . "\n"
            . $user['password'] . "\n"
            . $user['email'] . "\n"
            . $user['email_confirmed'] . "\n"
            . $user['telephone'] . "\n"
            . $user['gender'];
        //return "true";
    }

    public function postRegister(Request $request) {
        $userData = array(
            'login' => $request->input('login'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender')
        );

        if (ControllerLogic::isNull($userData)) {
            return "false";
        }

        // Написать валидацию для логина и пароля

        $user = new User();
        $user->login = $userData['login'];
        $user->password = md5($userData['password']);
        $user->email = $userData['email'];
        $user->email_confirmed = false;
        $user->telephone = 'null';
        $user->gender = $userData['gender'];
        $user->save();

        return "true";
    }
}
