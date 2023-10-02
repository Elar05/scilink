<?php

class UserTypesModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * *`Get user type by id`*
   *
   * @param int $id
   */
  public function get($id): ?array
  {
    try {
      $query = $this->prepare("SELECT * FROM user_types WHERE id = ?;");
      $query->execute([$id]);
      return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("UserTypesModel::get() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Get all user types`*
   */
  public function getAll(): ?array
  {
    try {
      $query = $this->query("SELECT * FROM user_types;");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("UserTypesModel::getAll() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Save user type`*
   * @param string $name
   * @return bool TRUE on success, FALSE on failure
   */
  public function save($name): bool
  {
    try {
      $query = $this->prepare("INSERT INTO user_types (name) VALUES (:name);");
      $query->bindValue(':name', $name, PDO::PARAM_STR);
      return $query->execute();
    } catch (PDOException $e) {
      error_log("UserTypesModel::save() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Update user type`*
   * @param string $name
   * @param int $id
   * @return bool TRUE on success, FALSE on failure
   */
  public function update($name, $id): bool
  {
    try {
      $query = $this->prepare("UPDATE user_types SET name = :name WHERE id = :id;");
      $query->bindValue(':name', $name, PDO::PARAM_STR);
      $query->bindValue(':id', $id, PDO::PARAM_STR);
      return $query->execute();
    } catch (PDOException $e) {
      error_log("UserTypesModel::update() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Delete user type`*
   * @param int $id
   * @return bool TRUE on success, FALSE on failure
   */
  public function delete($id): bool
  {
    try {
      $query = $this->prepare("DELETE FROM user_types WHERE id = ?;");
      return $query->execute([$id]);
    } catch (PDOException $e) {
      error_log("UserTypesModel::delete() -> " . $e->getMessage());
      return false;
    }
  }
}
