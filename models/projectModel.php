<?php

class ProjectModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * * *`Get Project by parameter`*
   * @param string $value
   * @param string $colum
   * @return array|false
   */
  public function get($value, $colum = "p.id", $iduser)
  {
    try {
      $query = $this->prepare(
        "SELECT projects.*, (
          SELECT COUNT(id)
          FROM likes
          WHERE idproject = projects.id
        ) AS likes, (
          SELECT COUNT(id)
          FROM comments
          WHERE idproject = projects.id
        ) AS comments, (
          SELECT name
          FROM categories
          WHERE id = projects.idcategory
        ) AS category, (
          SELECT names
          FROM users
          WHERE id = projects.iduser
        ) AS user, (
          SELECT iduser
          FROM participants
          WHERE iduser = :iduser
        ) AS participant
        FROM projects
        WHERE $colum = :value;"
      );
      $query->execute(["value" => $value, "iduser" => $iduser]);
      return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("ProjectModel::get() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Get all projects without filter and with filter`*
   * @param string $column
   * @param mixed $value
   * `If $column and $value is not null, the filter is applied to the query`
   * @return array|false
   */
  public function getAll($colum = null, $value = null)
  {
    try {
      $sql = "";
      if ($colum !== null and $value !== null) $sql = "WHERE $colum = '$value'";
      $query = $this->query("SELECT p.*, COUNT(l.id) AS likes, COUNT(c.id) AS comments FROM projects p LEFT JOIN likes l ON p.id = l.idproject LEFT JOIN comments c ON p.id = c.idproject $sql GROUP BY p.id;");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log("ProjectModel::getAll() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Get all projects that are not the logged in user`*
   * * Feed
   * @param int $iduser
   * @return array|false
   */
  public function getLastProjects($iduser)
  {
    try {
      $query = $this->query("SELECT p.*, COUNT(l.id) AS likes, COUNT(c.id) AS comments FROM projects p LEFT JOIN likes l ON p.id = l.idproject LEFT JOIN comments c ON p.id = c.idproject WHERE p.iduser != $iduser GROUP BY p.id ORDER BY p.created_at DESC LIMIT 10;");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      error_log('ProjectModel::getLastProjects() -> ' . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Save a new Project`*
   * @param array $data
   * - 'iduser' (int)
   * - 'idcategory' (int)
   * - 'name' (string)
   * - 'description' (string)
   * 
   * @return int|false The Project id or FALSE on failure.
   */
  public function save($data)
  {
    try {
      $query = $this->prepare("INSERT INTO projects (iduser, idcategory, name, description, slug, url) VALUES (:iduser, :idcategory, :name, :description, :slug, :url);");

      $query->bindParam(':iduser', $data['iduser'], PDO::PARAM_INT);
      $query->bindParam(':idcategory', $data['idcategory'], PDO::PARAM_STR);
      $query->bindParam(':name', $data['name'], PDO::PARAM_STR);
      $query->bindParam(':description', $data['description'], PDO::PARAM_STR);
      $query->bindParam(':slug', $data['slug'], PDO::PARAM_STR);
      $query->bindParam(':url', $data['url'], PDO::PARAM_STR);

      return $query->execute();
    } catch (PDOException $e) {
      error_log("ProjectModel::save() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Update Project`*
   * * Example: ["name" => "value"]
   * * This way only the name is updated
   *
   * @param array $data
   * - 'iduser' (int)
   * - 'idcategory' (int)
   * - 'name' (string)
   * - 'description' (string)
   *
   * @return bool TRUE on success or FALSE on failure.
   */
  public function update($datos, $id)
  {
    try {
      $sql = "UPDATE projects SET ";
      foreach ($datos as $columna => $valor) {
        $sql .= "$columna = '$valor', ";
      }

      $sql = rtrim($sql, ', '); // elimina la última coma y el espacio
      $sql .= " WHERE id = $id;";
      $query = $this->query($sql);
      return $query->execute();
    } catch (PDOException $e) {
      error_log("ProjectModel::update() -> " . $e->getMessage());
      return false;
    }
  }

  /**
   * *`Delete a Project`*
   * @param int $id
   * @return bool TRUE on success or FALSE on failure.
   */
  public function delete($id)
  {
    try {
      $query = $this->prepare("DELETE FROM projects WHERE id = ?;");
      return $query->execute([$id]);
    } catch (PDOException $e) {
      error_log("ProjectModel::delete() -> " . $e->getMessage());
      return false;
    }
  }
}
