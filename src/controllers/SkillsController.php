<?php

namespace src\controllers;

use \core\Controller;
use \src\helpers\LoginHelper;
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
        $skills = SkillsHelper::getAll($employee['idEmployeer']);
        $_SESSION['idEmployeer'] = $employee['idEmployeer'];

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

    public function editSkill(array $idSkill)
    {
        $idEmployeer = $_SESSION['idEmployeer'];
        $skill = SkillsHelper::getSkill($idSkill);
        $employee = EmployeeHelper::getEmployee($idEmployeer);
        $skills = SkillsHelper::getAll($employee['idEmployeer']);

        $this->render('skills', [
            'actualEmployee' => $employee,
            'skills' => $skills,
            'skill' => $skill
        ]);
    }

    public function editSkillAction(array $idSkill)
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $IdPostition = filter_input(INPUT_POST, 'role', FILTER_VALIDATE_INT);
        $IdDepartment = filter_input(INPUT_POST, 'department', FILTER_VALIDATE_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if (!$name || !$IdPostition || !$IdDepartment || !$email) {
            setFlash('error', 'Favor preencher todos os campos');
            $this->redirect("/skills/{$idSkill['id']}");
        }

        // $employee = EmployeeHelper::editEmployee(
        //     // $name,
        //     // $IdPostition,
        //     // $IdDepartment,
        //     // $email,
        //     // $idEmployeer
        // );

        // if (!$employee) {
        //     setFlash('error', 'Erro ao atualizar adicionar funcionário');
        //     $this->redirect("/skills/$idSkill");
        // }

        setFlash('success', 'Funcionário atualizar com sucesso', 'success');
        $this->redirect("/skills/{$idSkill['id']}");
    }

    public function deleteSkill(array $idSkill)
    {
        $idSkill = $idSkill['id'];
        $deleteSkill = SkillsHelper::deleteSkill($idSkill);

        if (!$deleteSkill) {
            setFlash('error', 'Erro ao apagar Skill');
            $this->redirect("/skills/{$idSkill['id']}");
        }

        setFlash('success', 'Skill apagado com sucesso', 'success');
        $this->redirect("/skills/$idSkill");
    }
}
