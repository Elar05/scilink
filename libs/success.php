<?php

class Success
{
  const SUCCESS_LOGIN_NEW_USER       = "8281e04ed52ccfc13820d0f6acb0985a";

  private $successList = [];

  public function __construct()
  {
    $this->successList = [
      Success::SUCCESS_LOGIN_NEW_USER => "Usuario registrado correctamente"
    ];
  }

  function get($hash)
  {
    return $this->successList[$hash];
  }

  function existsKey($key)
  {
    return array_key_exists($key, $this->successList);
  }
}
