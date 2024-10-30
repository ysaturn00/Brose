<?php

namespace src\controllers;

use \core\Controller;

class HomeController extends Controller
{
    public $loggedUser = false;

    public function __construct()
    {
        if (!$this->loggedUser) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $this->render('home', ['name' => 'Matheus']);
    }
}