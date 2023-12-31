<?php

class LikeModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * *`Get Like by id`*
   * @param int $id
   * @throws PDOException
   */
  public function get($iduser, $idproject)
  {
    try {
      $query = $this->prepare("SELECT * FROM likes WHERE iduser = :idu AND idproject = :idp;");
      $query->execute(["idu" => $iduser, "idp" => $idproject]);
      return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("LikeModel::get() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Get all Like`*
   * @throws PDOException
   */
  public function getAll(): ?array
  {
    try {
      $query = $this->query("SELECT * FROM likes;");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("LikeModel::getAll() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Save Like`*
   * @param int $iduser
   * @param int $idproject
   * @return bool TRUE on success, FALSE on failure
   * @throws PDOException
   */
  public function save($iduser, $idproject): bool
  {
    try {
      $query = $this->prepare("INSERT INTO likes (iduser, idproject) VALUES (:iduser, :idproject);");
      $query->bindValue(':iduser', $iduser, PDO::PARAM_INT);
      $query->bindValue(':idproject', $idproject, PDO::PARAM_INT);
      return $query->execute();
    } catch (PDOException $e) {
      error_log("LikeModel::save() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Delete Like`*
   * @param int $id
   * @return bool TRUE on success, FALSE on failure
   * @throws PDOException
   */
  public function delete($iduser, $idproject): bool
  {
    try {
      $query = $this->prepare("DELETE FROM likes WHERE iduser = :idu AND idproject = :idp;");
      return $query->execute(["idu" => $iduser, "idp" => $idproject]);
    } catch (PDOException $e) {
      error_log("LikeModel::delete() -> " . $e->getMessage());
      return false;
    }
  }
}
