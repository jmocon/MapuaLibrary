<?php
$clsEJournal = new EJournal();
class EJournal
{
  private $table = "ejournal";

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
				`Link`,
				`Description`
			) VALUES (
				'" . $db->Escape($mdl->Name) . "',
				'" . $db->Escape($mdl->Link) . "',
				'" . $db->Escape($mdl->Description) . "'
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
						`Link`='" . $db->Escape($mdl->Link) . "',
						`Description`='" . $db->Escape($mdl->Description) . "'
						WHERE `EJournal_Id`='" . $db->Escape($mdl->EJournal_Id) . "'";
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
							WHERE `EJournal_Id` = '" . $db->Escape($id) . "';";
    $mysqli->query($query);
    $rows = $mysqli->affected_rows;
    $mysqli->close();
    return $rows;
  }

  public function Get()
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT * FROM `" . $this->table . "`";
    $result = $mysqli->query($query);
    $mysqli->close();
    while ($obj = $result->fetch_object()) {
      $lst[] = $obj;
    }
    return $lst;
  }

  public function GetByEJournal_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT * FROM `" . $this->table . "`
							WHERE `EJournal_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object();
  }

  public function IsExistEJournal_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `EJournal_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }

  public function IsExistLink($value, $id = "")
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Link` = '" . $db->Escape($value) . "'";
    if ($id != "") {
      $query .= " AND `EJournal_Id` != '" . $db->Escape($id) . "'";
    }
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }

  public function GetDataTable()
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $lst = array();

    $query = "SELECT 
              `EJournal_Id`,
							`Name`,
							`Link`
						FROM `" . $this->table . "`";
    $result = $mysqli->query($query);
    $mysqli->close();
    while ($obj = $result->fetch_object()) {
      $lst[] = $obj;
    }
    return $lst;
  }
}
