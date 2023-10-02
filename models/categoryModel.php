<?php

class CategoryModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * *`Get category by id`*
   *
   * @param int $id
   */
  public function get($id): ?array
  {
    try {
      $query = $this->prepare("SELECT * FROM categories WHERE id = ?;");
      $query->execute([$id]);
      return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("CategoryModel::get() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Get all category`*
   */
  public function getAll(): ?array
  {
    try {
      $query = $this->query("SELECT * FROM categories;");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("CategoryModel::getAll() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Save category`*
   * @param string $name
   * @return bool TRUE on success, FALSE on failure
   */
  public function save($name): bool
  {
    try {
      $query = $this->prepare("INSERT INTO categories (name) VALUES (:name);");
      $query->bindValue(':name', $name, PDO::PARAM_STR);
      return $query->execute();
    } catch (PDOException $e) {
      error_log("CategoryModel::save() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Update category`*
   * @param string $name
   * @param int $id
   * @return bool TRUE on success, FALSE on failure
   */
  public function update($name, $id): bool
  {
    try {
      $query = $this->prepare("UPDATE categories SET name = :name WHERE id = :id;");
      $query->bindValue(':name', $name, PDO::PARAM_STR);
      $query->bindValue(':id', $id, PDO::PARAM_STR);
      return $query->execute();
    } catch (PDOException $e) {
      error_log("CategoryModel::update() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Delete category`*
   * @param int $id
   * @return bool TRUE on success, FALSE on failure
   */
  public function delete($id): bool
  {
    try {
      $query = $this->prepare("DELETE FROM categories WHERE id = ?;");
      return $query->execute([$id]);
    } catch (PDOException $e) {
      error_log("CategoryModel::delete() -> " . $e->getMessage());
      return false;
    }
  }
}
