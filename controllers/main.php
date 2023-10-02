<?php

class Main extends Session
{
  function __construct($url)
  {
    parent::__construct($url);
  }

  function render()
  {
    $this->view->render('main/index');
  }
}
