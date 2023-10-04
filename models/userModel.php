<?php

class UserModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * *`Login with email and password`*
   *
   * @param string $email
   * @param string $password
   * @return array|null
   */
  public function login($email, $password)
  {
    try {
      $query = $this->prepare("SELECT * FROM users WHERE email = :email;");
      $query->execute(["email" => $email]);

      if ($query->rowCount() == 1) {
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $user['password'])) {
          return $user;
        }

        return NULL;
      }
    } catch (PDOException $e) {
      error_log("LoginModel::login() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * * *`Get user by parameters`*
   * @param int $id
   * @param string $colum
   * @return array|false
   */
  public function get($value, $colum = "id")
  {
    try {
      $query = $this->prepare("SELECT * FROM users WHERE $colum = ?;");
      $query->execute([$value]);
      return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("UserModel::get() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Get all users without filter and with filter`*
   *
   * @param string $column
   * @param mixed $value
   * 
   * `If $column and $value is not null, the filter is applied to the query`
   *
   * @return array|false
   */
  public function getAll($colum = null, $value = null)
  {
    try {
      $sql = "";
      if ($colum !== null) $sql = " WHERE $colum = '$value'";
      $query = $this->query("SELECT u.*, ut.nombre AS tipo FROM users u JOIN users_tipo ut ON u.idtipo_usuario = ut.id$sql;");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("UserModel::getAll() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Save a new user`*
   *
   * @param array $data
   * - 'idtype_user' (int)
   * - 'names' (string)
   * - 'email' (string)
   * - 'password' (string | NULL)
   * - 'picture' (string)
   * - 'provider' (string)
   *
   * @return int|false
   * The user id or FALSE on failure.
   */
  public function save($data)
  {
    try {
      $pdo = $this->connect();
      $query = $pdo->prepare("INSERT INTO users (idtype_user, names, email, password, picture, provider) VALUES (:idtype_user, :names, :email, :password, :picture, :provider);");

      $password = $data['password'] ? $this->hash($data['password']) : NULL;
      $query->bindParam(':idtype_user', $data['idtype_user'], PDO::PARAM_INT);
      $query->bindParam(':names', $data['names'], PDO::PARAM_STR);
      $query->bindParam(':email', $data['email'], PDO::PARAM_STR);
      $query->bindParam(':password', $password, PDO::PARAM_STR);
      $query->bindParam(':picture', $data['picture'], PDO::PARAM_STR);
      $query->bindParam(':provider', $data['provider'], PDO::PARAM_STR);

      $query->execute();
      return $pdo->lastInsertId();
    } catch (PDOException $e) {
      error_log("UserModel::save() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Update user`*
   * * Example: ["name" => "value"]
   * * This way only the name is updated
   *
   * @param array $data
   * - 'idtype_user' (int)
   * - 'names' (string)
   * - 'email' (string)
   * - 'password' (string | NULL)
   * - 'picture' (string)
   * - 'provider' (string)
   *
   * @return bool TRUE on success or FALSE on failure.
   */
  public function update($datos, $id)
  {
    try {
      $sql = "UPDATE users SET ";
      foreach ($datos as $columna => $valor) {
        if ($columna == "password") $valor = $this->hash($valor);
        $sql .= "$columna = '$valor', ";
      }

      $sql = rtrim($sql, ', '); // elimina la última coma y el espacio
      $sql .= " WHERE id = $id;";
      $query = $this->query($sql);
      return $query->execute();
    } catch (PDOException $e) {
      error_log("UserModel::update() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Delete a user`*
   * @param int $id
   * @return bool TRUE on success or FALSE on failure.
   */
  public function delete($id)
  {
    try {
      $query = $this->prepare("DELETE FROM users WHERE id = ?;");
      return $query->execute([$id]);
    } catch (PDOException $e) {
      error_log("UserModel::delete() -> " . $e->getMessage());
      return false;
    }
  }

  public function hash($password)
  {
    return password_hash($password, PASSWORD_DEFAULT, ["cost" => 10]);
  }
}
