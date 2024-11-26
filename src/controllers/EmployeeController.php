<?php

namespace src\controllers;

use \core\Controller;
use src\helpers\DepartmentHelper;
use src\helpers\EmployeeHelper;
use src\helpers\LoginHelper;
use src\helpers\PositionHelper;
use src\models\Employee;

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

    public function createEmployee()
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
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

    public function editEmployee($idEmployeer = [])
    {
        $departments = DepartmentHelper::getAll();
        $positions = PositionHelper::getAll();
        $employees = EmployeeHelper::getAll();

        $employee = EmployeeHelper::getEmployee($idEmployeer);


        $this->render('home', [
            'departments' => $departments,
            'positions' => $positions,
            'employees' => $employees,
            'actualEmployee' => $employee

        ]);
    }

    public function editEmployeeAction(array $idEmployeer)
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $IdPostition = filter_input(INPUT_POST, 'role', FILTER_VALIDATE_INT);
        $IdDepartment = filter_input(INPUT_POST, 'department', FILTER_VALIDATE_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if (!$name || !$IdPostition || !$IdDepartment || !$email) {
            setFlash('error', 'Favor preencher todos os campos');
            $this->redirect('/');
        }

        $employee = EmployeeHelper::editEmployee(
            $name,
            $IdPostition,
            $IdDepartment,
            $email,
            $idEmployeer
        );

        if (!$employee) {
            setFlash('error', 'Erro ao atualizar adicionar funcionário');
            $this->redirect('/');
        }

        setFlash('success', 'Funcionário atualizar com sucesso', 'success');
        $this->redirect('/');
    }

    public function deleteEmployee(array $idEmployeer)
    {
        $deletedEmployee = EmployeeHelper::deleteEmployee($idEmployeer);

        if (!$deletedEmployee) {
            setFlash('error', 'Erro ao apagar funcionário');
            $this->redirect('/');
        }

        setFlash('success', 'Funcionário apagado com sucesso', 'success');
        $this->redirect('/');
    }

    public function createDepartment()
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$name || !$description) {
            setFlash('error', 'Favor preencher todos os campos');
            $this->redirect('/');
        }

        $department = DepartmentHelper::createDepartment(
            $name,
            $description
        );

        if (!$department) {
            setFlash('error', 'Erro ao adicionar departamento');
            $this->redirect('/');
        }

        setFlash('success', 'Departamento adicionado com sucesso', 'success');
        $this->redirect('/');
    }

    public function createPosition()
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$name || !$description) {
            setFlash('error', 'Favor preencher todos os campos');
            $this->redirect('/');
        }

        $department = PositionHelper::createPosition(
            $name,
            $description
        );

        if (!$department) {
            setFlash('error', 'Erro ao adicionar cargo');
            $this->redirect('/');
        }

        setFlash('success', 'Cargo adicionado com sucesso', 'success');
        $this->redirect('/');
    }
}
