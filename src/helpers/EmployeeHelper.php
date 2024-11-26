<?php

namespace src\helpers;

use PDOException;
use src\models\Employee;

use src\helpers\PositionHelper;
use src\helpers\DepartmentHelper;

class EmployeeHelper
{
    public static function createEmployee(string $name, int $idPosition, int $idDepartment, string $email)
    {
        try {
            Employee::insert([
                'name' => $name,
                'idPosition' => $idPosition,
                'idDepartment' => $idDepartment,
                'email' => $email,
                'lastReview' => date('Y-m-d H:i:s'),
            ])->execute();

            return true;
        } catch (PDOException $e) {
            dd($e->getMessage());
            return false;
        }
    }

    public static function editEmployee(string $name, int $idPosition, int $idDepartment, string $email, array $idEmployeer)
    {
        if ($name || $idPosition || $idDepartment || $email) {
            Employee::update([
                'name' => $name,
                'idPosition' => $idPosition,
                'idDepartment' => $idDepartment,
                'email' => $email,
                'lastReview' => date('Y-m-d H:i:s')
            ])->where('idEmployeer', $idEmployeer)->execute();

            return true;
        }

        return false;
    }

    public static function deleteEmployee($idEmployeer)
    {
        try {
            Employee::delete()->where('idEmployeer', $idEmployeer)->execute();

            return true;
        } catch (PDOException $e) {
            dd($e);
            return false;
        }
    }

    public static function getAll(array $fields = [])
    {
        $departments = DepartmentHelper::getAll();
        $positions = PositionHelper::getAll();

        $result = [];

        try {
            $employees = Employee::select($fields)->get();

            foreach ($employees as $employee) {

                foreach ($positions as $position) {
                    if ($employee['idPosition'] == $position['idPosition']) {
                        $employee['position'] = $position['name'];
                        break;
                    }
                }

                foreach ($departments as $department) {
                    if ($employee['idDepartment'] == $department['idDepartment']) {
                        $employee['department'] = $department['name'];
                        break;
                    }
                }

                $timestamp = strtotime($employee['lastReview']);
                $formattedDate = date('d/m/Y H:i', $timestamp);
                $employee['lastReview'] = $formattedDate;

                $result[] = $employee;
            }

            return $result;
        } catch (PDOException $e) {
            dd($e);
            return false;
        }
    }

    public static function getEmployee($idEmployee)
    {
        $departments = DepartmentHelper::getAll();
        $positions = PositionHelper::getAll();

        $employee = Employee::select()->where('idEmployeer', $idEmployee)->one();

        foreach ($positions as $position) {
            if ($employee['idPosition'] == $position['idPosition']) {
                $employee['position'] = $position['name'];
                break;
            }
        }

        foreach ($departments as $department) {
            if ($employee['idDepartment'] == $department['idDepartment']) {
                $employee['department'] = $department['name'];
                break;
            }
        }


        return $employee;
    }

    public static function searchDepartment($value, array $fields = [])
    {
        $departments = DepartmentHelper::getAll();
        $positions = PositionHelper::getAll();

        $result = [];

        try {
            $employees = Employee::select($fields)->where('name', 'like', '%' . $value . '%')->get();

            foreach ($employees as $employee) {

                foreach ($positions as $position) {
                    if ($employee['idPosition'] == $position['idPosition']) {
                        $employee['position'] = $position['name'];
                        break;
                    }
                }

                foreach ($departments as $department) {
                    if ($employee['idDepartment'] == $department['idDepartment']) {
                        $employee['department'] = $department['name'];
                        break;
                    }
                }

                $timestamp = strtotime($employee['lastReview']);
                $formattedDate = date('d/m/Y H:i', $timestamp);
                $employee['lastReview'] = $formattedDate;

                $result[] = $employee;
            }

            return $result;
        } catch (PDOException $e) {
            dd($e);
            return false;
        }
    }
}
