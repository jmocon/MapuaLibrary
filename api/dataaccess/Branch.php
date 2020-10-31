<?php
$clsBranch = new Branch();
class Branch
{
  private $table = "branch";

  public function __construct()
  {
  }

  public function Add($mdl)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "INSERT INTO `" . $this->table . "`
			(
				`Name`,
				`Address`
			) VALUES (
				'" . $db->Escape($mdl->Name) . "',
				'" . $db->Escape($mdl->Address) . "'
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
							`Name`='" . $db->Escape($mdl->Name) . "',
							`Address`='" . $db->Escape($mdl->Address) . "'
						WHERE `Branch_Id`='" . $db->Escape($mdl->Branch_Id) . "';";
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
							WHERE `Branch_Id`='" . $db->Escape($id) . "';";
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

  public function GetByBranch_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT *
              FROM `" . $this->table . "`
              WHERE `Branch_Id` = '" . $db->Escape($value) . "'";

    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object();
  }

  public function GetDataTable()
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $lst = array();

    $query = "SELECT 
							`Branch_Id`,
							`Name`,
							`Address`
						FROM `" . $this->table . "`";
    $result = $mysqli->query($query);
    $mysqli->close();
    while ($obj = $result->fetch_object()) {
      $lst[] = $obj;
    }
    return $lst;
  }

  public function IsExistBranch_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;

    $query = "SELECT COUNT(*) CNT
						FROM `" . $this->table . "`
						WHERE `Branch_Id` = '" . $db->Escape($value) . "'";
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
      $query .= " AND `Branch_Id` != '" . $id . "'";
    }
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }
}
