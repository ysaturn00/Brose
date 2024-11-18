<?php

namespace src\controllers;

use \core\Controller;
use \src\helpers\LoginHelper;
use \src\helpers\DepartmentHelper;
use \src\helpers\PositionHelper;
use \src\helpers\EmployeeHelper;
use src\helpers\SkillsHelper;

class SkillsController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHelper::checkLogin();

        if (!$this->loggedUser) {
            $this->redirect('/login');
        }
    }

    public function index(array $idEmployeer)
    {
        $employee = EmployeeHelper::getEmployee($idEmployeer);

        $this->render('skills', [
            'actualEmployee' => $employee

        ]);
    }

    public function createSkill()
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        $level = filter_input(INPUT_POST, 'level', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$name || !$description || $level) {
            setFlash('error', 'Favor preencher todos os campos');
            $this->redirect('/skill');
        }

        $skill = SkillsHelper::createSkill(
            $name,
            $description,
            $level,
        );

        if (!$skill) {
            setFlash('error', 'Erro ao adicionar skill');
            $this->redirect('/skill');
        }

        setFlash('success', 'Skill adicionada com sucesso', 'success');
        $this->redirect('/skill');
    }
}