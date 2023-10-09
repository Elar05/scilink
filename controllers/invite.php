<?php

class Invite extends Controller
{
  public $projectModel;
  public $categories;
  public $participantModel;
  public $commentModel;
  public $userModel;

  function __construct()
  {
    parent::__construct([]);

    require_once 'models/projectModel.php';
    $this->projectModel = new ProjectModel;

    require_once 'models/categoryModel.php';
    $this->categories = new CategoryModel;

    require_once 'models/participantModel.php';
    $this->participantModel = new ParticipantModel;

    require_once 'models/commentModel.php';
    $this->commentModel = new CommentModel;

    require_once 'models/userModel.php';
    $this->userModel = new UserModel;
  }

  function render()
  {
    $this->view->render('invite/index', [
      "lastProjects" => $this->projectModel->getLastProjects(0, null, null, true),
      "categories" => $this->categories->getAll(),
    ]);
  }

  public function getLastProjects()
  {
    $category = $_POST['category'] ?? null;
    $name = $_POST['name'] ?? null;

    // $limit = (empty($category) and empty($name)) ? true : false;
    $projects = $this->projectModel->getLastProjects(0, $category, $name, true);
    $this->response($projects);
  }

  public function show($params)
  {
    if (!isset($params)) new Errores;

    $slug = $params[0];
    $project = $this->projectModel->get($slug, "p.slug");

    if (empty($project)) new Errores;

    $this->view->render('invite/show', [
      'project' => $project,
      "comments" => $this->commentModel->getAll("c.idproject", $project['id']),
      "participants" => $this->participantModel->getAll($project['id'])
    ]);
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
}
