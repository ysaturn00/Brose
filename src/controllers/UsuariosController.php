<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Usuario;

class UsuariosController extends Controller {

   public function add() {
      $this->render('add');
   }

   public function addAction() {
      $name = filter_input(INPUT_POST, 'name');
      $email = filter_input(INPUT_POST, 'email');

      if($name && $email) {
         $data = Usuario::select()->where('email', $email)->execute();

         if(count($data) === 0) {
            // insert
            Usuario::insert([
               'nome' => $name,
               'email' => $email
            ])->execute();

            $this->redirect('/');
         } 

      } 
      $this->redirect('/novo');
   }

   public function edit($param) {
      $usuarios = Usuario::select()
      ->find($param['id']);

      $this->render('edit', array(
         'usuarios' => $usuarios
      ));
   }

   public function editAction($param) {
      $name = filter_input(INPUT_POST, 'name');
      $email = filter_input(INPUT_POST, 'email');

      if($name && $email) {
         Usuario::update()
         ->set('nome', $name)
         ->set('email', $email)
         ->where('id', $param['id'])
         ->execute();

         $this->redirect('/');
      }

      $this->redirect("/usuarios/" .$param['id']. "/editar");
   }

   public function delete($param) {
      Usuario::delete()
      ->where('id', $param['id'])
      ->execute();

      $this->redirect('/');

   }

}