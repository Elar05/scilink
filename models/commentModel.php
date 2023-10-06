<?php

class CommentModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * *`Get Comment by id`*
   *
   * @param int $id
   */
  public function get($id): ?array
  {
    try {
      $query = $this->prepare("SELECT * FROM comments WHERE id = ?;");
      $query->execute([$id]);
      return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("CommentModel::get() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Get all Comment`*
   *
   * @param string $column
   * @param string $value
   * @return array|null
   */
  public function getAll($column = null, $value = null): ?array
  {
    try {
      $sql = "";
      if ($column !== null and $value !== null) $sql = "WHERE $column = '$value'";
      $query = $this->query(
        "SELECT c.*, u.names AS user
        FROM comments c
        INNER JOIN users u ON c.iduser = u.id
        $sql;"
      );
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("CommentModel::getAll() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Save Comment`*
   * @param int $iduser
   * @param int $idproject
   * @param string $comment
   * @return bool TRUE on success, FALSE on failure
   */
  public function save($iduser, $idproject, $comment): bool
  {
    try {
      $query = $this->prepare("INSERT INTO comments (iduser, idproject, comment) VALUES (:iduser, :idproject, :comment);");
      $query->bindValue(':iduser', $iduser, PDO::PARAM_INT);
      $query->bindValue(':idproject', $idproject, PDO::PARAM_INT);
      $query->bindValue(':comment', $comment, PDO::PARAM_STR);
      return $query->execute();
    } catch (PDOException $e) {
      error_log("CommentModel::save() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Update Comment`*
   * @param int $iduser
   * @param int $idproject
   * @param string $comment
   * @param int $id
   * @return bool TRUE on success, FALSE on failure
   */
  public function update($iduser, $idproject, $comment, $id): bool
  {
    try {
      $query = $this->prepare("UPDATE comments SET comment = :comment WHERE id = :id;");
      $query->bindValue(':iduser', $iduser, PDO::PARAM_INT);
      $query->bindValue(':idproject', $idproject, PDO::PARAM_INT);
      $query->bindValue(':comment', $comment, PDO::PARAM_STR);
      $query->bindValue(':id', $id, PDO::PARAM_STR);
      return $query->execute();
    } catch (PDOException $e) {
      error_log("CommentModel::update() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Delete Comment`*
   * @param int $id
   * @return bool TRUE on success, FALSE on failure
   */
  public function delete($id): bool
  {
    try {
      $query = $this->prepare("DELETE FROM comments WHERE id = ?;");
      return $query->execute([$id]);
    } catch (PDOException $e) {
      error_log("CommentModel::delete() -> " . $e->getMessage());
      return false;
    }
  }
}
