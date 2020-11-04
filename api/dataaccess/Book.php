<?php
$clsBook = new Book();
class Book
{
  private $table = "book";

  public function __construct()
  {
  }

  public function Add($mdl)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "INSERT INTO `" . $this->table . "`
			(
				`Code`,
				`Keyword`,
				`Title`,
				`Author`,
				`Subject_Id`,
				`Synopsis`,
				`DatePublished`
			) VALUES (
				'" . $db->Escape($mdl->Code) . "',
				'" . $db->Escape($mdl->Keyword) . "',
				'" . $db->Escape($mdl->Title) . "',
				'" . $db->Escape($mdl->Author) . "',
				'" . $db->Escape($mdl->Subject_Id) . "',
				'" . $db->Escape($mdl->Synopsis) . "',
				'" . $db->Escape($mdl->DatePublished) . "'
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
						`Code`='" . $db->Escape($mdl->Code) . "',
						`Keyword`='" . $db->Escape($mdl->Keyword) . "',
						`Title`='" . $db->Escape($mdl->Title) . "',
						`Author`='" . $db->Escape($mdl->Author) . "',
						`Subject_Id`='" . $db->Escape($mdl->Subject_Id) . "',
						`Synopsis`='" . $db->Escape($mdl->Synopsis) . "',
						`DatePublished`='" . $db->Escape($mdl->DatePublished) . "'
						WHERE `Book_Id`='" . $db->Escape($mdl->Book_Id) . "'";
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
							WHERE `Book_Id` = '" . $db->Escape($id) . "';";
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

  public function GetDataTable()
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $lst = array();

    $query = "SELECT 
              `Book_Id`,
							`Code`,
							`Title`,
							`Author`,
							`DatePublished`
						FROM `" . $this->table . "`";
    $result = $mysqli->query($query);
    $mysqli->close();
    while ($obj = $result->fetch_object()) {
      $lst[] = $obj;
    }
    return $lst;
  }

  public function GetByBook_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT * FROM `" . $this->table . "`
							WHERE `Book_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object();
  }

  public function IsExistBook_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Book_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }

  public function IsExistCode($value, $id = "")
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Code` = '" . $db->Escape($value) . "'";
    if ($id != "") {
      $query .= " AND `Book_Id` != '" . $db->Escape($id) . "'";
    }
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }

  public function IsExistTitle($value, $id = "")
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Title` = '" . $db->Escape($value) . "'";
    if ($id != "") {
      $query .= " AND `Book_Id` != '" . $db->Escape($id) . "'";
    }
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }

  public function GetDropdown()
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $lst = array();

    $query = "SELECT 
                `Book_Id` AS `Value`,
                CONCAT(`Title`,' by ',`Author`) AS `Text`
              FROM `book`";
    $result = $mysqli->query($query);
    $mysqli->close();
    while ($obj = $result->fetch_object()) {
      $lst[] = $obj;
    }
    return $lst;
  }
}
