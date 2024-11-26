<?php

namespace src\controllers;

use \core\Controller;
use \src\helpers\LoginHelper;
use \src\helpers\EmployeeHelper;
use src\helpers\SkillsHelper;
use src\models\Skill;

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
        $skills = SkillsHelper::getAll($employee['idEmployeer']);
        $_SESSION['idEmployeer'] = $idEmployeer['id'];

        $this->render('skills', [
            'actualEmployee' => $employee,
            'skills' => $skills

        ]);
    }

    public function createSkill()
    {
        (int)$idEmployeer = filter_input(INPUT_POST, 'idEmployeer');
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        $level = filter_input(INPUT_POST, 'level', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$name || !$description || !$level || !$idEmployeer) {
            setFlash('error', 'Favor preencher todos os campos');
            $this->redirect("/skills/$idEmployeer");
        }

        $skill = SkillsHelper::createSkill(
            $idEmployeer,
            $name,
            $description,
            $level,
        );

        if (!$skill) {
            setFlash('error', 'Erro ao adicionar skill');
            $this->redirect("/skills/$idEmployeer");
        }

        setFlash('success', 'Skill adicionada com sucesso', 'success');
        $this->redirect("/skills/$idEmployeer");
    }

    public function deleteSkill(array $idSkill)
    {
        $idSkill = (int)$idSkill['id'];
        $idEmployeer = $_SESSION['idEmployeer'];

        $deleteSkill = SkillsHelper::deleteSkill($idSkill);

        if (!$deleteSkill) {
            setFlash('error', 'Erro ao apagar skill');
            $this->redirect("/skills/$idEmployeer");
        }

        setFlash('success', 'Skill apagada com sucesso', 'success');
        $this->redirect("/skills/$idEmployeer");
    }

    public static function editSkill(string $name, string $level, string $description, int $idSkill)
    {
        if ($name || $level || $description) {
            Skill::update([
                'name' => $name,
                'idPosition' => $level,
                'description' => $description,
            ])->where('idSkill', $idSkill)->execute();

            return true;
        }

        return false;
    }
}
