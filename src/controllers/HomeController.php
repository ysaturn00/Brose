<?php

namespace src\controllers;

use \core\Controller;

class HomeController extends Controller
{
    private $loggedUser = true;

    public function __construct($loggedUser)
    {
        if (!$loggedUser) {
            $this->redirect('login');
        }
    }
}
