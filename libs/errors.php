<?php
/**
 * Errors class for error messages
 */
class Errors
{
  const ERROR_LOGIN_AUTHENTICATE          = "11c37cfab311fdbe2";
  const ERROR_LOGIN_AUTHENTICATE_EMPTY    = "2194ac064912bse67";
  const ERROR_LOGIN_AUTHENTICATE_DATA     = "bcbe63ed846468d4a";

  const ERROR_REGISTER_USER               = "ds78ds87ds87ds87d";
  const ERROR_REGISTER_USER_EMPTY         = "asdf5598df87s87sd";
  const ERROR_REGISTER_USER_DATA          = "a8sa78ds87ds78ds8";
  const ERROR_REGISTER_USER_NAMES         = "s98ds76kjf8734lkd";
  const ERROR_REGISTER_USER_EMAIL         = "0923ghsd7643sdsdj";
  const ERROR_REGISTER_USER_PASSWORD      = "f9ds98ds8sd7kkd87";
  const ERROR_REGISTER_USER_PHONE         = "0aj45nc62kd61kdu5";

  private $errorsList = [];

  public function __construct()
  {
    $this->errorsList = [
      Errors::ERROR_LOGIN_AUTHENTICATE        => 'Hubo un problema al autenticarse',
      Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY  => 'Los parámetros para autenticar no pueden estar vacíos',
      Errors::ERROR_LOGIN_AUTHENTICATE_DATA   => 'Correo y/o password incorrectos',

      Errors::ERROR_REGISTER_USER             => 'Hubo un problema al registrar',
      Errors::ERROR_REGISTER_USER_EMPTY       => 'Los parámetros para registrar no pueden estar vacíos',
      Errors::ERROR_REGISTER_USER_NAMES       => 'The names field contains incorrect characters',
      Errors::ERROR_REGISTER_USER_EMAIL       => 'The email field does not comply with an appropriate format',
      Errors::ERROR_REGISTER_USER_PASSWORD    => 'The password field can contain lowercase, uppercase, numbers and . _ - @',
      Errors::ERROR_REGISTER_USER_PHONE       => 'The phone field must be numeric digits only.',
    ];
  }

  public function get($hash)
  {
    return $this->errorsList[$hash];
  }

  public function existsKey($key)
  {
    return array_key_exists($key, $this->errorsList);
  }
}
