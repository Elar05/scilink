<?php

class Project extends Session
{
  public $model;
  public $categoryModel;
  public $likeModel;
  public $commentModel;
  public $participantModel;

  public function __construct($url)
  {
    parent::__construct($url);

    require_once 'models/projectModel.php';
    $this->model = new ProjectModel;

    require_once 'models/categoryModel.php';
    $this->categoryModel = new CategoryModel;

    require_once 'models/likeModel.php';
    $this->likeModel = new LikeModel;

    require_once 'models/commentModel.php';
    $this->commentModel = new CommentModel;
  }

  public function render()
  {
    $this->view->render('project/index', [
      "projects" => $this->model->getAll("p.iduser", $this->userId),
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
    if (!isset($params)) new Errores;

    $slug = $params[0];
    $project = $this->model->get($slug, "slug", $this->userId);

    if (empty($project)) new Errores;

    if ($project['participant'] === $this->userId) {
      $text = 'Participating <i class="fas fa-check"></i>';
      $textId = "";
    } else {
      $textId = "applyProject";
      $text = 'Apply to project <i class="fas fa-plus"></i>';
    }

    $this->view->render('project/show', [
      'project' => $project,
      "comments" => $this->commentModel->getAll("c.idproject", $project['id']),
      "text" => $text,
      "textId" => $textId,
    ]);
  }

  public function edit($params)
  {
    $this->view->render('project/edit', ['' => '']);
  }
}
