<?php

class RatingModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * *`Get Rating by id`*
   *
   * @param int $id
   */
  public function get($id): ?array
  {
    try {
      $query = $this->prepare("SELECT * FROM ratings WHERE id = ?;");
      $query->execute([$id]);
      return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("RatingModel::get() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Get all Rating`*
   */
  public function getAll(): ?array
  {
    try {
      $query = $this->query("SELECT * FROM ratings;");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("RatingModel::getAll() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Save Rating`*
   * @param int $iduser
   * @param int $idproject
   * @param int $value
   * @return bool TRUE on success, FALSE on failure
   */
  public function save($iduser, $idproject, $value): bool
  {
    try {
      $query = $this->prepare("INSERT INTO ratings (iduser, idproject, value) VALUES (:iduser, :idproject, :value);");
      $query->bindValue(':iduser', $iduser, PDO::PARAM_INT);
      $query->bindValue(':idproject', $idproject, PDO::PARAM_INT);
      $query->bindValue(':value', $value, PDO::PARAM_STR);
      return $query->execute();
    } catch (PDOException $e) {
      error_log("RatingModel::save() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Update Rating`*
   * @param int $iduser
   * @param int $idproject
   * @param int $value
   * @param int $id
   * @return bool TRUE on success, FALSE on failure
   */
  public function update($iduser, $idproject, $value, $id): bool
  {
    try {
      $query = $this->prepare("UPDATE ratings SET value = :value WHERE id = :id;");
      $query->bindValue(':iduser', $iduser, PDO::PARAM_INT);
      $query->bindValue(':idproject', $idproject, PDO::PARAM_INT);
      $query->bindValue(':value', $value, PDO::PARAM_STR);
      $query->bindValue(':id', $id, PDO::PARAM_STR);
      return $query->execute();
    } catch (PDOException $e) {
      error_log("RatingModel::update() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Delete Rating`*
   * @param int $id
   * @return bool TRUE on success, FALSE on failure
   */
  public function delete($id): bool
  {
    try {
      $query = $this->prepare("DELETE FROM ratings WHERE id = ?;");
      return $query->execute([$id]);
    } catch (PDOException $e) {
      error_log("RatingModel::delete() -> " . $e->getMessage());
      return false;
    }
  }
}
