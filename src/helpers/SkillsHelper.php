<?php

namespace src\helpers;

use PDOException;
use src\models\Skill;

class SkillsHelper
{
    public static function getAll($idEmployeer)
    {
        try {
            $data = Skill::select()->where('idEmployeer', $idEmployeer)->get();

            return $data;
        } catch (PDOException $e) {
            dd($e);
            return false;
        }
    }

    public static function createSkill(int $idEmployeer, $name, string $description, string $level)
    {
        try {
            Skill::insert([
                'idEmployeer' => $idEmployeer,
                'name' => $name,
                'description' => $description,
                'level' => $level,
            ])->execute();

            return true;
        } catch (PDOException $e) {
            dd($e->getMessage());
            return false;
        }
    }

    public static function deleteSkill(int $idSkill)
    {

        try {
            Skill::delete()->where('idSkill', $idSkill)->execute();

            return true;
        } catch (PDOException $e) {
            dd($e);
            return false;
        }
    }

    public static function editSkill(string $name, int $idPosition, int $idDepartment, string $email, array $idEmployeer)
    {
        if ($name || $idPosition || $idDepartment || $email) {
            Skill::update([
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
}
