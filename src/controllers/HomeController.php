<?php

namespace src\controllers;

use \core\Controller;
use \src\helpers\LoginHelper;
use \src\helpers\DepartmentHelper;
use \src\helpers\PositionHelper;
use \src\helpers\EmployeeHelper;

class HomeController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHelper::checkLogin();

        if (!$this->loggedUser) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $departments = DepartmentHelper::getAll();
        $positions = PositionHelper::getAll();
        $employees = EmployeeHelper::getAll();

        $this->render('home', [
            'departments' => $departments,
            'positions' => $positions,
            'employees' => $employees,
        ]);
    }

    public function search()
    {
        $search = $_GET['search'];

        // dd($search);

        $departments = DepartmentHelper::getAll();
        $positions = PositionHelper::getAll();
        $employees = EmployeeHelper::searchDepartment($search);

        // dd($employees);

        $this->render('home', [
            'departments' => $departments,
            'positions' => $positions,
            'employees' => $employees,
        ]);
    }
}
