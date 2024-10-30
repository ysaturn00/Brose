<?php

namespace src\controllers;

use \core\Controller;

class LoginController extends Controller
{

    public function signin()
    {
        $this->render('login');
    }

    public function signinAction()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (empty($email) && empty($password)) {
            $this->redirect('/login');
        }

        $email = filter_var($email, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
}