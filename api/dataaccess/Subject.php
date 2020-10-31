<?php
$clsSubject = new Subject();
class Subject
{

  private $table = "subject";

  public function __construct()
  {
  }

  public function Add($mdl)
  {
    $db = new Database();
    $mysqli = $db->mysqli;

    $query = "INSERT INTO `" . $this->table . "`
			(
				`Name`
			) VALUES (
				'" . $db->Escape($mdl->Name) . "'
			)";
    $mysqli->query($query);
    $id = $mysqli->insert_id;
    $mysqli->close();
    return $id;
  }

  public function Update($mdl)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "UPDATE `" . $this->table . "` SET
							`Name`='" . $db->Escape($mdl->Name) . "'
						  WHERE `Subject_Id`='" . $db->Escape($mdl->Subject_Id) . "';";
    $mysqli->query($query);
    $rows = $mysqli->affected_rows;
    $mysqli->close();
    return $rows;
  }

  public function Delete($id)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "DELETE FROM `" . $this->table . "` 
							WHERE `Subject_Id`='" . $db->Escape($id) . "';";
    $mysqli->query($query);
    $rows = $mysqli->affected_rows;
    $mysqli->close();
    return $rows;
  }

  public function Get()
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $lst = array();
    $query = "SELECT * FROM `" . $this->table . "`";
    $result = $mysqli->query($query);
    $mysqli->close();
    while ($obj = $result->fetch_object()) {
      $lst[] = $obj;
    }
    return $lst;
  }

  public function GetBySubject_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;

    $query = "SELECT *
              FROM `" . $this->table . "`
              WHERE `Subject_Id` = '" . $db->Escape($value) . "'";

    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object();
  }

  public function IsExistSubject_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;

    $query = "SELECT COUNT(*) CNT
						FROM `" . $this->table . "`
						WHERE `Subject_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }

  public function IsExistName($value, $id = "")
  {
    $db = new Database();
    $mysqli = $db->mysqli;

    $query = "SELECT COUNT(*) CNT
						FROM `" . $this->table . "`
            WHERE `Name` = '" . $db->Escape($value) . "'";
    if ($id != "") {
      $query .= " AND `Subject_Id` != '" . $db->Escape($id) . "'";
    }
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }
}
