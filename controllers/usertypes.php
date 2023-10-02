<?php

class UserTypes extends Session
{
  public function __construct($url)
  {
    parent::__construct($url);
  }

  public function render()
  {
    $this->view->render('usertypes/index');
  }

  public function list()
  {
    $data = [];
    $types = $this->model->getAll();
    if (count($types) > 0) {
      foreach ($types as $type) {
        $buttons = "<button class='btn btn-warning edit' id='{$type["id"]}'><i class='fas fa-pencil-alt'></i></button>";
        $buttons .= "<button class='ml-1 btn btn-danger delete' id='{$type["id"]}'><i class='fas fa-times'></i></button>";

        $data[] = [
          $type["id"],
          $type["name"],
          $buttons,
        ];
      }
    }

    $this->response(["data" => $data]);
  }

  public function get()
  {
    if (empty($_POST['id'])) {
      $this->response(["error" => "Missing parameters"]);
    }

    $type = $this->model->get($_POST['id']);
    if ($type) {
      $this->response(["success" => "", "type" => $type]);
    } else {
      $this->response(["error" => "Not found user type"]);
    }
  }

  public function create()
  {
    if (empty($_POST['name'])) {
      $this->response(["error" => "Missing parameters"]);
    }

    if ($this->model->save($_POST['name'])) {
      $this->response(["success" => "Registered user type"]);
    } else {
      $this->response(["error" => "Error registering user type"]);
    }
  }

  public function edit()
  {
    if (empty($_POST['id']) || empty($_POST['name'])) {
      $this->response(["error" => "Missing parameters"]);
    }

    if ($this->model->update($_POST['name'], $_POST['id'])) {
      $this->response(["success" => "Updated user type"]);
    } else {
      $this->response(["error" => "Error updating user type"]);
    }
  }

  public function delete()
  {
    if (empty($_POST['id'])) {
      $this->response(["error" => "Missing parameters"]);
    }

    if ($this->model->delete($_POST['id'])) {
      $this->response(["success" => "Deleted user type"]);
    } else {
      $this->response(["error" => "Error deleting user type"]);
    }
  }
}
