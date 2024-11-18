<?php

namespace src\helpers;

use PDOException;
use src\models\Skill;

class SkillsHelper
{
    public static function getAll(array $fields = [])
    {
        try {
            $data = Skill::select($fields)->get();

            return $data;
        } catch (PDOException $e) {
            dd($e);
            return false;
        }
    }

    public static function createSkill(string $name, string $description, string $level)
    {
        try {
            Skill::insert([
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
}