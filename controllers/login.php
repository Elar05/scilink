<?php

class Login extends Session
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
    $this->view->render('login/index');
  }

  public function auth()
  {
    if (
      !isset($_POST['email']) or !isset($_POST['password']) or
      empty($_POST['email']) or empty($_POST['password'])
    ) {
      $this->redirect('', ["error" => Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY]);
    }

    $user = $this->userModel->login($_POST['email'], $_POST['password']);

    if ($user !== NULL) {
      $this->initialize($user, ["success" => "Bienvenido"]);
    } else {
      $this->redirect('', ["error" => Errors::ERROR_LOGIN_AUTHENTICATE_DATA]);
    }
  }

  public function authSocialNetwork()
  {
    if (
      empty($_POST['email']) or empty($_POST['names']) or
      empty($_POST['picture']) or empty($_POST['provider'])
    ) {
      $this->redirect('', ["error" => Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY]);
    }

    $user = $this->userModel->get($_POST['email'], "email");

    if (!empty($user)) {
      $this->initialize($user, ["success" => "Bienvenido"]);
    }

    $hash = hash('sha256', $_POST['email']);
    // $hashShort = substr($hash, 0, 8);
    $data = [
      "idtype_user" => 2,
      "names" => $_POST['names'],
      "email" => $_POST['email'],
      "password" => NULL,
      "phone" => NULL,
      "picture" => $_POST['picture'],
      "provider" => explode(".", $_POST['provider'])[0],
      "slug" => $this->generateSlug($_POST['names']) . "-$hash",
    ];
    if ($this->userModel->save($data)) {
      $user = $this->userModel->get($data['email'], "email");
      $this->initialize($user, ["success" => Success::SUCCESS_LOGIN_NEW_USER]);
    } else {
      $this->redirect('', ["error" => Errors::ERROR_LOGIN_AUTHENTICATE]);
    }
  }
}
