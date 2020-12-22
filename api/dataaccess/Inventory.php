<?php
$clsInventory = new Inventory();
class Inventory
{
  private $table = "inventory";

  public function __construct()
  {
  }

  public function Add($mdl)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "INSERT INTO `" . $this->table . "`
			(
				`Branch_Id`,
				`Book_Id`,
				`DateAcquired`
			) VALUES (
				'" . $db->Escape($mdl->Branch_Id) . "',
				'" . $db->Escape($mdl->Book_Id) . "',
				'" . $db->Escape($mdl->DateAcquired) . "'
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
						`Branch_Id`='" . $db->Escape($mdl->Branch_Id) . "',
						`Book_Id`='" . $db->Escape($mdl->Book_Id) . "',
						`DateAcquired`='" . $db->Escape($mdl->DateAcquired) . "'
						WHERE `Inventory_Id`='" . $db->Escape($mdl->Inventory_Id) . "'";
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
							WHERE `Inventory_Id` = '" . $db->Escape($id) . "';";
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

  public function GetByInventory_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT * FROM `" . $this->table . "`
							WHERE `Inventory_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object();
  }

  public function IsExistInventory_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Inventory_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }

  public function GetStatusByInventory_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT `Branch_Id` FROM `" . $this->table . "`
							WHERE `Inventory_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object()->Branch_Id;
  }

  public function GetDataTable()
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $lst = array();

    $query = "SELECT 
                A.`Inventory_Id`,
                C.`Code`,
                C.`Title`,
                B.`Name` AS `Branch`,
                'Available' AS `Status`
              FROM `inventory` A
              INNER JOIN `branch` B
              ON A.Branch_Id = B.Branch_Id
              INNER JOIN `book` C
              ON A.Book_Id = C.Book_Id
            ";
    $result = $mysqli->query($query);
    $mysqli->close();
    while ($obj = $result->fetch_object()) {
      $lst[] = $obj;
    }
    return $lst;
  }

  public function GetDropdown()
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $lst = array();

    $query = "SELECT 
                `Inventory_Id` AS `Value`,
                CONCAT(B.`Code`,': ',B.`Title`,' by ',B.`Author`, ' - ', C.Name) AS `Text`
              FROM `inventory` A
              INNER JOIN `book` B
              ON A.Book_Id = B.Book_Id
              INNER JOIN `branch` C
              ON A.Branch_Id = C.Branch_Id
              ";
    $result = $mysqli->query($query);
    $mysqli->close();
    while ($obj = $result->fetch_object()) {
      $lst[] = $obj;
    }
    return $lst;
  }

  public function GetStatusPerBranch($bookid)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $lst = array();

    $query = "SELECT 
                B.Branch_Id,
                B.Name Branch,
                (SELECT COUNT(*) 
                  FROM `loan` L
                  INNER JOIN `inventory` INV
                  ON L.Inventory_Id = INV.Inventory_Id
                  WHERE INV.Book_Id = I.Book_Id
                  AND INV.Branch_Id = B.Branch_Id
                  AND L.Date_Return IS NULL
                ) Loaned,
                COUNT(*) Total
              FROM `branch` B
              INNER JOIN `inventory` I
              ON B.Branch_Id = I.Branch_Id
              WHERE I.Book_Id = '{$db->Escape($bookid)}'
              GROUP BY B.Branch_Id
            ";
    $result = $mysqli->query($query);
    $mysqli->close();
    while ($obj = $result->fetch_object()) {
      $lst[] = $obj;
    }
    return $lst;
  }

  public function GetStatusCount()
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $lst = array();

    $query = "SELECT
              (SELECT COUNT(*) FROM `loan` WHERE `status` = '0') For_Approval,
              (SELECT COUNT(*) FROM `loan` WHERE `status` = '1') For_Claiming,
              (SELECT COUNT(*) FROM `loan` WHERE `status` = '2') On_Hand,
              COUNT(*) Total_Books
              FROM `inventory`;
            ";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object();
  }

  // Get One Available Book In Branch based on Book_Id and Branch_Id
  public function GetAvailableBook($bookid, $branchId)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $lst = array();

    $query = "SELECT I.*
                FROM `inventory` I
                LEFT JOIN `loan` L
                    ON I.Inventory_Id = L.Inventory_Id 
                    AND L.Date_Return IS NULL 
                    AND L.Status <> 3
                WHERE Book_Id = '{$db->Escape($bookid)}'
                AND Branch_Id = '{$db->Escape($branchId)}'
                AND L.Inventory_Id IS NULL;
            ";
    $result = $mysqli->query($query);
    $mysqli->close();
    while ($obj = $result->fetch_object()) {
      $lst[] = $obj;
    }
    return $lst;
  }
}
