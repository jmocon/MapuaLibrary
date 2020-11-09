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
				`Date_Due`
			) VALUES (
				'" . $db->Escape($mdl->User_Id) . "',
				'" . $db->Escape($mdl->Inventory_Id) . "',
				'" . $db->Escape($mdl->Date_Loan) . "',
				'" . $db->Escape($mdl->Date_Return) . "',
				'" . $db->Escape($mdl->Date_Due) . "'
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
						`Date_Due`='" . $db->Escape($mdl->Date_Due) . "'
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

  public function GetUser_IdByLoan_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT `User_Id` FROM `" . $this->table . "`
							WHERE `Loan_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object()->User_Id;
  }

  public function GetInventory_IdByLoan_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT `Inventory_Id` FROM `" . $this->table . "`
							WHERE `Loan_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object()->Inventory_Id;
  }

  public function GetDate_LoanByLoan_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT `Date_Loan` FROM `" . $this->table . "`
							WHERE `Loan_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object()->Date_Loan;
  }

  public function GetDate_ReturnByLoan_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT `Date_Return` FROM `" . $this->table . "`
							WHERE `Loan_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object()->Date_Return;
  }

  public function GetDate_DueByLoan_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT `Date_Due` FROM `" . $this->table . "`
							WHERE `Loan_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object()->Date_Due;
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

  public function GetByUser_Id($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT * FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object();
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

  public function GetByDate_Loan($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT * FROM `" . $this->table . "`
							WHERE `Date_Loan` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object();
  }

  public function GetByDate_Return($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT * FROM `" . $this->table . "`
							WHERE `Date_Return` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object();
  }

  public function GetByDate_Due($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT * FROM `" . $this->table . "`
							WHERE `Date_Due` = '" . $db->Escape($value) . "'";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object();
  }

  public function GetByX_DateCreated($value)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT * FROM `" . $this->table . "`
							WHERE `X_DateCreated` = '" . $db->Escape($value) . "'";
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

  public function IsExistUser_Id($value, $id = "")
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `User_Id` = '" . $db->Escape($value) . "'";
    if ($id != "") {
      $query .= " AND `Loan_Id` != '" . $db->Escape($id) . "'";
    }
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }

  public function IsExistInventory_Id($value, $id = "")
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Inventory_Id` = '" . $db->Escape($value) . "'";
    if ($id != "") {
      $query .= " AND `Loan_Id` != '" . $db->Escape($id) . "'";
    }
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }

  public function IsExistDate_Loan($value, $id = "")
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Date_Loan` = '" . $db->Escape($value) . "'";
    if ($id != "") {
      $query .= " AND `Loan_Id` != '" . $db->Escape($id) . "'";
    }
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }

  public function IsExistDate_Return($value, $id = "")
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Date_Return` = '" . $db->Escape($value) . "'";
    if ($id != "") {
      $query .= " AND `Loan_Id` != '" . $db->Escape($id) . "'";
    }
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }

  public function IsExistDate_Due($value, $id = "")
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `Date_Due` = '" . $db->Escape($value) . "'";
    if ($id != "") {
      $query .= " AND `Loan_Id` != '" . $db->Escape($id) . "'";
    }
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }

  public function IsExistX_DateCreated($value, $id = "")
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT COUNT(*) CNT
							FROM `" . $this->table . "`
							WHERE `X_DateCreated` = '" . $db->Escape($value) . "'";
    if ($id != "") {
      $query .= " AND `Loan_Id` != '" . $db->Escape($id) . "'";
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
