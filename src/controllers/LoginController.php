<?php

namespace src\controllers;

use \core\Controller;
use src\helpers;

class LoginController extends Controller
{

    public function signin()
    {
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            unset($_SESSION['flash']);
        }

        $this->render('login', ['flash' => $flash ?? '']);
    }

    public function signinAction()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (empty($email) || empty($password)) {
            $_SESSION['flash'] = 'Preencha todos os campos obrigatórios';

            $this->redirect('/login');
        }

        $email = filter_var($email, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
}
