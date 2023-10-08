<?php

class Profile extends Session
{
  public $userModel;
  public $projectModel;

  public function __construct($url)
  {
    parent::__construct($url);

    require_once 'models/userModel.php';
    $this->userModel = new UserModel;

    require_once 'models/projectModel.php';
    $this->projectModel = new ProjectModel;
  }

  public function in($params)
  {
    if (!isset($params)) new Errores;

    $slug = $params[0];

    $user = $this->userModel->get($slug, "slug");

    $projects = $this->projectModel->getAll("p.iduser", $user['id']);

    $this->view->render('profile/index', [
      "user" => $user, "projects" => $projects
    ]);
  }

  public function update()
  {
    if (!empty($_POST['names'])) {
      $this->userModel->update(["names" => $_POST['names']], $this->userId);
    }
    if (!empty($_POST['phone'])) {
      $this->userModel->update(["phone" => $_POST['phone']], $this->userId);
    }
    if (!empty($_POST['description'])) {
      $this->userModel->update(["description" => $_POST['description']], $this->userId);
    }
    if (!empty($_FILES["image"]['name'])) {
      $image = $_FILES["image"];

      $types = ["jpg", "png", "webp", "jpeg"];
      $type = pathinfo($image["name"], PATHINFO_EXTENSION);

      if (!in_array($type, $types)) $this->response(["error" => "The file type is not valid."]);

      $folder = "public/img/users/{$this->userId}/";
      if (!file_exists($folder)) mkdir($folder, 0777, true);

      $url = $folder . str_replace("-", "_", $image['name']) . ".$type";
      if (move_uploaded_file($image['tmp_name'], $url)) {
        $this->userModel->update(["picture" => $url], $this->userId);
      } else {
        $this->response(["error" => "An error occurred while uploading the project image"]);
      }
    }

    $this->response(['success' => 'Changes saved']);
  }
}
