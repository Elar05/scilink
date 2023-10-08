<?php

class Profile extends Session
{
  public $userModel;

  public function __construct($url)
  {
    parent::__construct($url);

    require_once 'models/userModel.php';
    $this->userModel = new UserModel;
  }

  public function in($params)
  {
    if (!isset($params)) new Errores;

    $slug = $params[0];

    $user = $this->userModel->get($slug, "slug");

    $this->view->render('profile/index', ["user" => $user]);
  }

  public function update()
  {
    if (!empty($_POST['names'])) {
      $this->userModel->update(["names" => $_POST['names']], $this->userId);
    }
    if (!empty($_POST['phone'])) {
      $this->userModel->update(["phone" => $_POST['phone']], $this->userId);
    }

    $this->response(['success' => 'Changes saved']);
  }
}
