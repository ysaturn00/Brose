<?php

namespace src\controllers;

use \core\Controller;
use src\helpers\LoginHelper;

class LoginController extends Controller
{

    public function signin()
    {
        $this->render('login', ['flash' => getFlash('error') ?? '']);
    }

    public function signinAction()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($email) || empty($password)) {
            setFlash('error', 'Preencha todos os campos obrigatórios');
            $this->redirect('/login');
        }

        $email = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);
        $password = trim($password);

        $token = LoginHelper::verifyLogin($email, $password);

        if ($token) {
            $_SESSION['token'] = $token;
            $this->redirect('/');
        }

        setFlash('error', 'Credenciais erradas ou inválidas');
        $this->redirect('/login');
    }

    public function signout()
    {
        unset($_SESSION['token']);
        $this->redirect('/');
    }
}