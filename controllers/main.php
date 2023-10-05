<?php

class Main extends Session
{
  public $projects;
  public $categories;

  function __construct($url)
  {
    parent::__construct($url);

    require_once 'models/projectModel.php';
    $this->projects = new ProjectModel;

    require_once 'models/categoryModel.php';
    $this->categories = new CategoryModel;
  }

  function render()
  {
    $this->view->render('main/index', [
      "lastProjects" => $this->projects->getLastProjects($this->userId),
      "categories" => $this->categories->getAll(),
    ]);
  }
}
