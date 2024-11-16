<?php

namespace src\controllers;

use \core\Controller;
use src\helpers\EmployeeHelper;
use src\helpers\LoginHelper;

class EmployeeController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHelper::checkLogin();

        if (!$this->loggedUser) {
            $this->redirect('/login');
        }
    }

    function createEmployee()
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $IdPostition = filter_input(INPUT_POST, 'role', FILTER_VALIDATE_INT);
        $IdDepartment = filter_input(INPUT_POST, 'department', FILTER_VALIDATE_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if (!$name || !$IdPostition || !$IdDepartment || !$email) {
            setFlash('error', 'Favor preencher todos os campos');
            $this->redirect('/');
        }

        $employee = EmployeeHelper::createEmployee(
            $name,
            $IdPostition,
            $IdDepartment,
            $email
        );

        if (!$employee) {
            setFlash('error', 'Erro ao adicionar funcionário');
            $this->redirect('/');
        }

        setFlash('success', 'Funcionário adicionado com sucesso', 'success');
        $this->redirect('/');
    }
}