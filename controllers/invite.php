<?php

class Invite extends Controller
{
  public $projects;
  public $categories;
  public $participantModel;
  public $commentModel;

  function __construct()
  {
    parent::__construct([]);

    require_once 'models/projectModel.php';
    $this->projects = new ProjectModel;

    require_once 'models/categoryModel.php';
    $this->categories = new CategoryModel;

    require_once 'models/participantModel.php';
    $this->participantModel = new ParticipantModel;

    require_once 'models/commentModel.php';
    $this->commentModel = new CommentModel;
  }

  function render()
  {
    $this->view->render('invite/index', [
      "lastProjects" => $this->projects->getLastProjects(0, null, null, true),
      "categories" => $this->categories->getAll(),
    ]);
  }

  public function getLastProjects()
  {
    $category = $_POST['category'] ?? null;
    $name = $_POST['name'] ?? null;

    // $limit = (empty($category) and empty($name)) ? true : false;
    $projects = $this->projects->getLastProjects(0, $category, $name, true);
    $this->response($projects);
  }

  public function show($params)
  {
    if (!isset($params)) new Errores;

    $slug = $params[0];
    $project = $this->projects->get($slug, "p.slug");

    if (empty($project)) new Errores;

    $this->view->render('invite/show', [
      'project' => $project,
      "comments" => $this->commentModel->getAll("c.idproject", $project['id']),
      "participants" => $this->participantModel->getAll($project['id'])
    ]);
  }
}
