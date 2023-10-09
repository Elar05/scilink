<?php

class SkillModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * *`Get Skill by id`*
   *
   * @param int $id
   */
  public function get($id): ?array
  {
    try {
      $query = $this->prepare("SELECT * FROM skills WHERE id = ?;");
      $query->execute([$id]);
      return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("SkillModel::get() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Get all Skill`*
   */
  public function getAll(): ?array
  {
    try {
      $query = $this->query("SELECT * FROM skills;");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("SkillModel::getAll() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Save Skill`*
   * @param string $name
   * @return bool TRUE on success, FALSE on failure
   */
  public function save($name): bool
  {
    try {
      $query = $this->prepare("INSERT INTO skills (name) VALUES (:name);");
      $query->bindValue(':name', $name, PDO::PARAM_STR);
      return $query->execute();
    } catch (PDOException $e) {
      error_log("SkillModel::save() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Update Skill`*
   * @param string $name
   * @param int $id
   * @return bool TRUE on success, FALSE on failure
   */
  public function update($name, $id): bool
  {
    try {
      $query = $this->prepare("UPDATE skills SET name = :name WHERE id = :id;");
      $query->bindValue(':name', $name, PDO::PARAM_STR);
      $query->bindValue(':id', $id, PDO::PARAM_STR);
      return $query->execute();
    } catch (PDOException $e) {
      error_log("SkillModel::update() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Delete Skill`*
   * @param int $id
   * @return bool TRUE on success, FALSE on failure
   */
  public function delete($id): bool
  {
    try {
      $query = $this->prepare("DELETE FROM skills WHERE id = ?;");
      return $query->execute([$id]);
    } catch (PDOException $e) {
      error_log("SkillModel::delete() -> " . $e->getMessage());
      return false;
    }
  }
}
