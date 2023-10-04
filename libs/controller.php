<?php

class Controller
{
  public $view;

  public function __construct($user)
  {
    $this->view = new View($user);
  }

  public function redirect($url, $mensajes = [])
  {
    $data = [];
    $params = '';

    foreach ($mensajes as $key => $value) {
      array_push($data, $key . '=' . $value);
    }
    $params = join('&', $data);

    if ($params != '') {
      $params = '?' . $params;
    }
    header('Location: ' . constant('URL') . $url . $params);
    exit();
  }

  public function response($data)
  {
    echo json_encode($data);
    exit();
  }

  public function generateSlug($texto)
  {
    // Reemplaza caracteres especiales y espacios con guiones
    $slug = strtolower($texto);
    $slug = preg_replace('/[^a-z0-9-]+/', '-', $slug);

    // Elimina guiones duplicados
    $slug = preg_replace('/-+/', '-', $slug);

    // Elimina guiones al principio y al final
    $slug = trim($slug, '-');

    return $slug;
  }
}
