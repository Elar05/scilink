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

    require_once 'models/participantModel.php';
    $this->participantModel = new ParticipantModel;
  }

  public function render()
  {
    $this->view->render('project/index', [
      "projects" => $this->model->getAll("p.iduser", $this->userId),
      "categories" => $this->categoryModel->getAll(),
    ]);
  }

  public function save()
  {
    if (
      empty($_POST['category']) or empty($_POST['name']) or empty($_POST['description']) or
      empty($_POST['agency']) or empty($_POST['fields']) or empty($_POST['geographic'])
    ) {
      $this->response(["error" => "Missing parameters"]);
    }

    $slug = $this->generateSlug($_POST['name']);

    $url = NULL;
    if (!empty($_FILES["image"]['name'])) {
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
      "url" => $url,
      "link" => $_POST["link"] ?? NULL,
      "agency_sponsor" => $_POST["agency"],
      "fields_of_science" => $_POST["fields"],
      "geographic_scope" => $_POST["geographic"],
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
    $project = $this->model->get($slug, "p.slug", $this->userId);

    if (empty($project)) new Errores;

    $participants = $this->participantModel->getAll($project['id']);

    $arrEstado = [
      "0" => ["class" => "info", "text" => "Waiting <i class='fas fa-spinner'></i>"],
      "1" => ["class" => "danger", "text" => "Leave Project <i class='fas fa-times'></i>"],
      "2" => ["class" => "primary", "text" => "Join to project <i class='fas fa-plus'></i>"],
    ];
    $class = $arrEstado["2"]["class"];
    $text = $arrEstado["2"]["text"];
    $textId = "applyProject";

    if (!empty($participants)) {
      $ids = array_column($participants, "iduser");

      if (($key = array_search($this->userId, $ids)) !== false) {
        $foundUser = $participants[$key];
        $estado = $foundUser["status"];
        $class = $arrEstado[$estado]["class"];
        $text = $arrEstado[$estado]["text"];
        $textId = "";
      }
    }

    $this->view->render('project/show', [
      'project' => $project,
      "comments" => $this->commentModel->getAll("c.idproject", $project['id']),
      "text" => $text,
      "textId" => $textId,
      "class" => $class,
      "participants" => $participants
    ]);
  }

  public function getLastProjects()
  {
    $category = $_POST['category'] ?? null;
    $name = $_POST['name'] ?? null;

    // $limit = (empty($category) and empty($name)) ? true : false;

    $projects = $this->model->getLastProjects($this->userId, $category, $name, true);

    $this->response($projects);
  }

  public function saveData()
  {
    $data = file_get_contents("feed.json");
    $data = json_decode($data, true);

    $errores = [];
    $success = [];

    $idu = 0;
    foreach ($data['projects'] as $item) {
      $slug = $this->generateSlug($item['project_name']);
      $idu++;

      if ($this->model->saveData([
        "iduser" => $idu,
        "idcategory" => 1,
        "name" => $item['project_name'],
        "description" => $item['project_description'],
        "slug" => $slug,
        "url" => "",
        "link" => $item["project_url_external"],
        "agency_sponsor" => $item["agency_sponsor"],
        "fields_of_science" => $item["fields_of_science"],
        "participation_tasks" => $item["participation_tasks"],
        "geographic_scope" => $item["geographic_scope"],
        "keywords" => $item["keywords"]
      ])) {
        $success[] = $idu;
      } else {
        $errores[] = $idu;
      }
    }

    echo count($success) . " - " . count($errores);
  }
}
