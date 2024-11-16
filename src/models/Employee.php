<?php

namespace src\models;

use \core\Model;

class Employee extends Model
{
    public $idEmployee;
    public $name;
    public $idPosition;
    public $idDepartment;
    public $email;
    public $lastReview;
}