<?php

namespace src\helpers;

use src\models\User;

class LoginHelper
{
    public static function checkLogin()
    {
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();

            if ($data) {
                $user = new User();
                $user->idUser = $data['idUser'];
                $user->email = $data['email'];
                $user->type = $data['type'];
                $user->token = $data['token'];

                return $user;
            }
        }

        return false;
    }

    public static function verifyLogin($email, $password)
    {
        $data = User::select()->where('email', $email)->one();

        if (!empty($data)) {
            // if (password_verify($password, $data['password'])) {
            if ($password == $data['password']) {
                $token = md5(time() . rand(1, 99999999));

                User::update()->set('token', $token)->where('email', $email)->execute();

                return $token;
            }
        }

        return false;
    }
}