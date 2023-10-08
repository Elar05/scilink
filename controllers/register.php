<?php

class Register extends Session
{
  public $userModel;

  public function __construct($url)
  {
    parent::__construct($url);

    require_once 'models/userModel.php';
    $this->userModel = new UserModel();
  }

  public function render()
  {
    $this->view->render('register/index');
  }

  public function singup()
  {
    if (
      empty($_POST['email']) or empty($_POST['password']) or
      empty($_POST['names']) or empty($_POST['phone'])
    ) {
      $this->redirect('register', ["error" => Errors::ERROR_REGISTER_USER_EMPTY]);
    }

    if (!preg_match("/[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/", $_POST['names'])) {
      $this->redirect('register', ["error" => Errors::ERROR_REGISTER_USER_NAMES]);
    }
    // if (strlen($_POST['password']) < 8) {
    // }
    // if (
    //   !preg_match('/[A-Z]/', $_POST['password']) or !preg_match('/[a-z]/', $_POST['password']) or
    //   !preg_match('/[0-9]/', $_POST['password']) or !preg_match('/[@._-]/', $_POST['password'])
    // ) {
    // }
    if (!preg_match("/^[0-9]+$/", $_POST['phone'])) {
      $this->redirect('register', ["error" => Errors::ERROR_REGISTER_USER_PHONE]);
    }
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $_POST['email'])) {
      $this->redirect('register', ["error" => Errors::ERROR_REGISTER_USER_EMAIL]);
    }
    $hash = hash('sha256', $_POST['email']);
    // $hashShort = substr($hash, 0, 8);
    $data = [
      "idtype_user" => 2,
      "names" => $_POST['names'],
      "email" => $_POST['email'],
      "password" => $_POST['password'],
      "picture" => $_POST['phone'],
      "picture" => NULL,
      "provider" => NULL,
      "slug" => $this->generateSlug($_POST['names']) . "-$hash",
    ];
    if ($this->userModel->save($data)) {
      $this->redirect('', ["success" => Success::SUCCESS_LOGIN_NEW_USER]);
    } else {
      $this->redirect('register', ["error" => Errors::ERROR_REGISTER_USER]);
    }
  }

  public function singupSocialNetwork()
  {
    if (
      empty($_POST['email']) or empty($_POST['names']) or
      empty($_POST['picture']) or empty($_POST['provider'])
    ) {
      $this->redirect('register', ["error" => Errors::ERROR_REGISTER_USER_EMPTY]);
    }

    $user = $this->userModel->get($_POST['email'], "email");

    if (!empty($user)) {
      $this->initialize($user, ["success" => "Bienvenido"]);
    }

    $data = [
      "idtype_user" => 2,
      "names" => $_POST['names'],
      "email" => $_POST['email'],
      "password" => NULL,
      "picture" => $_POST['picture'],
      "provider" => explode(".", $_POST['provider'])[0],
    ];
    if ($this->userModel->save($data)) {
      $user = $this->userModel->get($data['email'], "email");
      $this->initialize($user, ["success" => Success::SUCCESS_LOGIN_NEW_USER]);
    } else {
      $this->redirect('register', ["error" => Errors::ERROR_REGISTER_USER]);
    }
  }
}
