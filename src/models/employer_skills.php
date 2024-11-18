<?php

namespace src\models;

use \core\Model;

class employer_skills extends Model
{
    public $idEmployeerSkill;
    public $idEmployer;
    public $idSkill;
    public $description;
}