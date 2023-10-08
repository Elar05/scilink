<?php

/**
 * Class Errors to show page 404
 */
class Errores extends Controller
{
  public $view;

  function __construct()
  {
    parent::__construct("", "");
    $this->view->render('errores/index');
    exit();
  }
}
