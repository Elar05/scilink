<?php

class User extends Session
{
  public $model;

  public function __construct($url)
  {
    parent::__construct($url);

    require_once 'models/userModel.php';
    $this->model = new UserModel;
  }

  public function render()
  {
    $this->view->render('user/index', [
      "types" => $this->getUserTypes(),
    ]);
  }

  public function list()
  {
    $data = [];
    $users = $this->model->getAll();
    if (count($users) > 0) {
      foreach ($users as $user) {
        $buttons = "<button class='btn btn-warning edit' id='{$user["id"]}'><i class='fas fa-pencil-alt'></i></button>";
        $buttons .= "<button class='ml-1 btn btn-danger delete' id='{$user["id"]}'><i class='fas fa-times'></i></button>";

        $class = "success";
        $text = "Active";
        if ($user["estado"] === "0") {
          $class = "danger";
          $text = "Inactive";
        }
        $estado = "<span class='badge badge-$class text-uppercase font-weight-bold cursor-pointer delete' id='{$user["id"]}'>$text</span>";

        $data[] = [
          $user["id"],
          $user["names"],
          $user["email"],
          $user["phone"],
          $user["picture"],
          $user["idtype_user"],
          $estado,
          $buttons,
        ];
      }
    }

    $this->response(["data" => $data]);
  }

  public function create()
  {
    if (
      empty($_POST['names']) or empty($_POST['email']) or
      empty($_POST['password']) or empty($_POST['phone'])
    ) {
      $this->response(["error" => "Missing parameters"]);
    }

    if (!preg_match("/^[\p{L}]+$/u", $_POST['names'])) {
      $this->redirect('register', ["error" => Errors::ERROR_REGISTER_USER_NAMES]);
    }
    if (!preg_match("/^[a-zA-Z0-9@._- ]+$/", $_POST['password'])) {
      $this->redirect('register', ["error" => Errors::ERROR_REGISTER_USER_PASSWORD]);
    }
    if (!preg_match("/^[0-9]+$/", $_POST['phone'])) {
      $this->redirect('register', ["error" => Errors::ERROR_REGISTER_USER_PHONE]);
    }
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $_POST['email'])) {
      $this->redirect('register', ["error" => Errors::ERROR_REGISTER_USER_EMAIL]);
    }

    if ($this->model->save([
      'idtipo_user' => 2,
      'names' => $_POST['names'],
      'email' => $_POST['email'],
      'password' => $_POST['password'],
      'phone' => $_POST['phone'],
    ])) {
      $this->response(["success" => "Registered user"]);
    } else {
      $this->response(["error" => "Error registering user"]);
    }
  }

  public function get()
  {
    if (empty($_POST['id'])) {
      $this->response(["error" => "Missing parameters"]);
    }

    $user = $this->model->get($_POST['id']);
    if ($user) {
      unset($user["password"]);
      $this->response(["success" => "", "user" => $user]);
    } else {
      $this->response(["error" => "Not found user"]);
    }
  }

  public function edit()
  {
    if (
      empty($_POST['names']) or empty($_POST['email']) or
      empty($_POST['password']) or empty($_POST['phone'])
    ) {
      $this->response(["error" => "Missing parameters"]);
    }

    if (!preg_match("/^[\p{L}]+$/u", $_POST['names'])) {
      $this->response(["error" => ""]);
    }
    if (!preg_match("/^[a-zA-Z0-9@._- ]+$/", $_POST['password'])) {
      $this->response(["error" => ""]);
    }
    if (!preg_match("/^[0-9]+$/", $_POST['phone'])) {
      $this->response(["error" => ""]);
    }
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $_POST['email'])) {
      $this->response(["error" => ""]);
    }

    if ($this->model->update([
      'names' => $_POST['names'],
      'email' => $_POST['email'],
      'phone' => $_POST['phone'],
    ], $_POST['id'])) {
      if (!empty($_POST['password']))
        $this->model->update(['password' => $_POST['password']], $_POST['id']);

      $this->response(["success" => "user actualizado"]);
    } else {
      $this->response(["error" => "Error al actualizar user"]);
    }
  }

  public function delete()
  {
    if (empty($_POST['id'])) {
      $this->response(["error" => "Missing parameters"]);
    }

    if ($this->model->delete($_POST['id'])) {
      $this->response(["success" => "user delete"]);
    } else {
      $this->response(["error" => "Error al eliminar user"]);
    }
  }

  public function getUserTypes()
  {
    require_once 'models/userTiposModel.php';
    $tipos = new UserTypesModel();
    return $tipos->getAll();
  }
}
