<?php

namespace src\helpers;

use PDOException;
use src\models\Position;

class PositionHelper
{
    public static function createPosition(string $name, string $description)
    {
        $url = setUrl($name);

        try {
            Position::insert([
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
            $dados = Position::select($fields)->get();

            return $dados;
        } catch (PDOException $e) {
            dd($e);
            return false;
        }
    }

    public static function getPosition($idPosition)
    {
        $position = Position::select()
            ->where('idPosition', $idPosition)
            ->one();

        return $position;
    }
}