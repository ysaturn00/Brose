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

<<<<<<< HEAD
    public static function deleteSkill(int $idSkill)
    {

=======
    public static function getSkill($idSkill)
    {
        try {
            $skill = Skill::select()->where('idSkill', $idSkill)->one();

            return $skill;
        } catch (PDOException $e) {
            dd($e);
            return false;
        }
    }

    public static function deleteSkill($idSkill)
    {
>>>>>>> 39a6561098536da0acb926afb3ee6ce2cb38beb0
        try {
            Skill::delete()->where('idSkill', $idSkill)->execute();

            return true;
        } catch (PDOException $e) {
            dd($e);
            return false;
        }
    }
}