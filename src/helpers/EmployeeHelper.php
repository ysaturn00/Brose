<?php

namespace src\helpers;

use src\models\Employee;

class EmployeeHelper
{
    public static function createEmployee(string $name, int $idPosition, int $idDepartment, string $email)
    {
        if ($name || $idPosition || $idDepartment || $email) {
            $data = Employee::insert([
                'name' => $name,
                'idPosition' => $idPosition,
                'idDepartment' => $idDepartment,
                'email' => $email,
                'lastReview' => date('Y-m-d H:i:s')
            ])->execute();

            return true;
        }

        return false;
    }

    public static function getAll() {}
}