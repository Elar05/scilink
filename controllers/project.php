<?php

class Project extends Session
{
  public $model;
  public $categoryModel;

  public function __construct($url)
  {
    parent::__construct($url);

    require_once 'models/projectModel.php';
    $this->model = new ProjectModel;

    require_once 'models/categoryModel.php';
    $this->categoryModel = new CategoryModel;
  }

  public function render()
  {
    $this->view->render('project/index', [
      "projects" => $this->model->getAll("iduser", $this->userId),
    ]);
  }

  public function create()
  {
    $this->view->render('project/create', [
      "categories" => $this->categoryModel->getAll(),
      "action" => "save",
    ]);
  }

  public function save()
  {
    if (empty($_POST['category']) or empty($_POST['name']) or empty($_POST['description'])) {
      $this->response(["error" => "Missing parameters"]);
    }

    $slug = $this->generateSlug($_POST['name']);

    $url = NULL;
    if (!empty($_FILES["image"])) {
      $image = $_FILES["image"];

      $types = ["jpg", "png", "webp", "jpeg"];
      $type = pathinfo($image["name"], PATHINFO_EXTENSION);

      if (!in_array($type, $types)) $this->response(["error" => "The file type is not valid."]);

      $folder = "public/img/projects/{$this->userId}/";
      if (!file_exists($folder)) mkdir($folder, 0777, true);

      $url = $folder . str_replace("-", "_", $slug) . ".$type";
      if (move_uploaded_file($image['tmp_name'], $url)) {
      } else {
        $this->response(["error" => "An error occurred while uploading the project image"]);
      }
    }

    if ($this->model->save([
      "iduser" => $this->userId,
      "idcategory" => $_POST['category'],
      "name" => $_POST['name'],
      "description" => $_POST['description'],
      "slug" => $slug,
      "url" => $url
    ])) {
      $this->response(['success' => "Project registered successfully"]);
    } else {
      $this->response(["error" => "Error registering project"]);
    }
  }

  public function show($params)
  {
    if (!isset($params)) {
      new Errores;
    }
    $slug = $params[0];
    $project = $this->model->get($slug, "slug");
    if (empty($project)) {
      new Errores;
    }
    $this->view->render('project/show', ['project' => $project]);
  }

  public function edit($params)
  {
    $this->view->render('project/edit', ['' => '']);
  }
}
