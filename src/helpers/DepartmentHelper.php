<?php

namespace src\helpers;

use PDOException;
use src\models\Department;

class DepartmentHelper
{
    public static function createDepartment(string $name, string $description)
    {
        $url = setUrl($name);

        try {
            Department::insert([
                'name' => $name,
                'description' => $description,
                'url' => $url
            ])->execute();

            return true;
        } catch (PDOException $e) {
            dd($e->getMessage());
            return false;
        }
    }

    public static function getAll(array $fields = [])
    {
        try {
            $dados = Department::select($fields)->get();

            return $dados;
        } catch (PDOException $e) {
            dd($e);
            return false;
        }
    }

    public static function getDepartment($idDepartment)
    {
        $department = Department::select()
            ->where('idDepartment', $idDepartment)
            ->one();

        return $department;
    }
}
