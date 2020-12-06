<?php
$clsLoan = new Loan();
class Loan
{
  private $table = "loan";

  public function __construct()
  {
  }

  public function Add($mdl)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "INSERT INTO `" . $this->table . "`
			(
				`User_Id`,
				`Inventory_Id`,
				`Date_Loan`,
				`Date_Return`,
				`Date_Due`,
				`PenaltyFee`
			) VALUES (
				'" . $db->Escape($mdl->User_Id) . "',
				'" . $db->Escape($mdl->Inventory_Id) . "',
				'" . $db->Escape($mdl->Date_Loan) . "',
				'" . $db->Escape($mdl->Date_Return) . "',
				'" . $db->Escape($mdl->Date_Due) . "',
				'" . $db->Escape($mdl->PenaltyFee) . "'
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
						`User_Id`='" . $db->Escape($mdl->User_Id) . "',
						`Inventory_Id`='" . $db->Escape($mdl->Inventory_Id) . "',
						`Date_Loan`='" . $db->Escape($mdl->Date_Loan) . "',
						`Date_Return`='" . $db->Escape($mdl->Date_Return) . "',
						`Date_Due`='" . $db->Escape($mdl->Date_Due) . "',
						`PenaltyFee`='" . $db->Escape($mdl->PenaltyFee) . "'
						WHERE `Loan_Id`='" . $db->Escape($mdl->Loan_Id) . "'";
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
							WHERE `Loan_Id` = '" . $db->Escape($id) . "';";
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

  public function GetByLoan_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT * FROM `" . $this->table . "`
							WHERE `Loan_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object();
  }

  public function IsExistLoan_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Loan_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }

  // Custom

  public function GetDataTable()
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $lst = array();

    $query = "SELECT 
                A.`Loan_Id`,
                C.`IDNumber` AS `User`,
                D.`Title` AS `Book`,
                E.`Name` AS `Branch`,
                A.`Date_Loan`,
                A.`Date_Due`,
                A.`Date_Return`
              FROM `loan` A
              INNER JOIN `inventory` B
              ON A.Inventory_Id = B.Inventory_Id
              INNER JOIN `user` C
              ON A.User_Id = C.User_Id
              INNER JOIN `book` D
              ON B.Book_Id = D.Book_Id
              INNER JOIN `branch` E
              ON B.Branch_Id = E.Branch_Id
            ";
    $result = $mysqli->query($query);
    $mysqli->close();
    while ($obj = $result->fetch_object()) {
      $lst[] = $obj;
    }
    return $lst;
  }
}
