<?php

class Session extends Controller
{
  public $sites;
  public $defaultSite;
  public $user;
  public $userId;
  public $userType;
  public $url;
  public $slug;

  public function __construct($url)
  {
    if (session_status() == PHP_SESSION_NONE) session_start();

    $this->userType = $_SESSION["userType"] ?? 0;
    $this->userId = $_SESSION["userId"] ?? "";
    $this->user = $_SESSION["user"] ?? "";
    $this->slug = $_SESSION["slug"] ?? "";

    $this->url = $url;

    $this->defaultSite = "main";

    $this->sites = $this->sites();

    $this->validateSession();

    parent::__construct([
      "id" => $this->userId, "name" => $this->user,
      "userType" => $this->userType, "slug" => $this->slug
    ]);
  }

  public function sites()
  {
    return [
      "0" => [
        'login', 'register', 'reset', 'invite', 'landing'
      ],
      "1" => [
        "default" => 'admin',
        'main', 'logout', 'project',
      ],
      "2" => [
        "default" => 'user',
        'main', 'logout', 'project', 'participant', 'comment', 'profile', 'like'
      ],
    ];
  }

  public function validateSession()
  {
    if ($this->existsSession()) {
      if ($this->isAuthorized($this->url, $this->userType)) {
      } else {
        $this->redirect($this->defaultSite);
        // $this->redirect($this->sites[$this->userType]['default']);
      }
    } else {
      if ($this->isAuthorized($this->url, $this->userType)) {
      } else {
        new Errores;
      }
    }
  }

  public function existsSession()
  {
    return isset($_SESSION["userId"]);
  }

  public function initialize($user, $messages)
  {
    $_SESSION["userId"] = $user['id'];
    $_SESSION["userType"] = $user['idtype_user'];
    $_SESSION["user"] = $user['names'];
    $_SESSION["slug"] = $user['slug'];

    $this->redirect($this->defaultSite);
    // $this->redirect($this->sites[$_SESSION["userType"]]['default']);
  }

  public function isAuthorized($view, $tipo)
  {
    // return in_array($view, $this->sites); // Desde bd
    return in_array($view, $this->sites[$tipo]); // En codigo
  }

  public function logout()
  {
    session_unset();
    session_destroy();
  }
}
