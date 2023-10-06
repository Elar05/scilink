<?php

class Like extends Session
{
  public $model;

  public function __construct($url)
  {
    parent::__construct($url);

    require_once 'models/likeModel.php';
    $this->model = new LikeModel;
  }

  public function store()
  {
    if (empty($_POST['idproject'])) {
      $this->response(["error" => "Missing parameters"]);
    }

    $like = $this->model->get($this->userId, $_POST['idproject']);

    if ($like) {
      $this->model->delete($this->userId, $_POST['idproject']);
      $this->response(["success" => "Like removed"]);
    } else {
      $this->model->save($this->userId, $_POST['idproject']);
      $this->response(["success" => "Like added"]);
    }
  }
}
