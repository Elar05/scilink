<?php

class ParticipantModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * *`Get Participant by id`*
   * @param int $id
   */
  public function get($id): ?array
  {
    try {
      $query = $this->prepare("SELECT * FROM participants WHERE id = ?;");
      $query->execute([$id]);
      return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("ParticipantModel::get() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Get all Participant`*
   * @param int $idproject
   */
  public function getAll($idproject): ?array
  {
    try {
      $query = $this->prepare(
        "SELECT p.*, u.names AS user
        FROM participants p
        INNER JOIN users u ON p.iduser = u.id
        WHERE p.idproject = ?;"
      );
      $query->execute([$idproject]);
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("ParticipantModel::getAll() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Save Participant`*
   * @param int $iduser
   * @param int $idproject
   * @return bool TRUE on success, FALSE on failure
   */
  public function save($iduser, $idproject): bool
  {
    try {
      $query = $this->prepare("INSERT INTO participants (iduser, idproject) VALUES (:iduser, :idproject);");
      $query->bindValue(':iduser', $iduser, PDO::PARAM_INT);
      $query->bindValue(':idproject', $idproject, PDO::PARAM_INT);
      return $query->execute();
    } catch (PDOException $e) {
      error_log("ParticipantModel::save() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Delete Participant`*
   * @param int $id
   * @return bool TRUE on success, FALSE on failure
   */
  public function delete($id): bool
  {
    try {
      $query = $this->prepare("DELETE FROM participants WHERE id = ?;");
      return $query->execute([$id]);
    } catch (PDOException $e) {
      error_log("ParticipantModel::delete() -> " . $e->getMessage());
      return false;
    }
  }
}
