<?php

class Participant extends Session
{
  public $model;

  public function __construct($url)
  {
    parent::__construct($url);

    require_once 'models/participantModel.php';
    $this->model = new ParticipantModel;
  }

  public function add()
  {
    if (empty($_POST['idproject'])) {
      $this->response(["error" => "Missing parameters"]);
    }

    if ($this->model->save($this->userId, $_POST['idproject'])) {
      $this->response(["success" => "Added participant"]);
    } else {
      $this->response(["error" => "Error adding participant"]);
    }
  }
}
