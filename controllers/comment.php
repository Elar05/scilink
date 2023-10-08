<?php

class Comment extends Session
{
  public $model;

  public function __construct($url)
  {
    parent::__construct($url);

    require_once 'models/commentModel.php';
    $this->model = new CommentModel;
  }

  public function add()
  {
    if (empty($_POST['comment']) or empty($_POST['project'])) {
      $this->response(['error' => 'Missing parameters']);
    }

    if ($this->model->save($this->userId, $_POST['project'], $_POST['comment'])) {
      $this->response(['success' => 'Comment added successfully']);
    } else {
      $this->response(['error' => 'Error adding comment']);
    }
  }
}
