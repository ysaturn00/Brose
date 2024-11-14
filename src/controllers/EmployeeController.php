<?php

namespace src\controllers;

use \core\Controller;
use src\helpers\EmployeeHelper;

class EmployeeController extends Controller
{
    function createEmployee()
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $lastReview = filter_input(INPUT_POST, 'lastReview', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!$name || !$role || !$department || $email || $lastReview) {
            $_SESSION['flash'] = "Favor preencher todos os campos";
            $this->redirect('/');
        }
    }
}