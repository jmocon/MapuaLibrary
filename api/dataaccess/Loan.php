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

    $mdl = $this->DefaultValues($mdl);

    if (empty($mdl->Date_Return)) {
      $mdl->Date_Return = "NULL";
    } else {
      $mdl->Date_Return = "'{$db->Escape($mdl->Date_Return)}'";
    }

    $query = "INSERT INTO `{$this->table}`
			(
				`User_Id`,
				`Inventory_Id`,
				`Date_Loan`,
				`Date_Return`,
				`Date_Due`,
				`PenaltyFee`,
				`Status`
			) VALUES (
				'{$db->Escape($mdl->User_Id)}',
				'{$db->Escape($mdl->Inventory_Id)}',
				'{$db->Escape($mdl->Date_Loan)}',
				{$mdl->Date_Return},
				'{$db->Escape($mdl->Date_Due)}',
				'{$db->Escape($mdl->PenaltyFee)}',
				'{$db->Escape($mdl->Status)}'
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

    $mdl = $this->DefaultValues($mdl);

    if (empty($mdl->Date_Return)) {
      $mdl->Date_Return = "NULL";
    } else {
      $mdl->Date_Return = "'{$db->Escape($mdl->Date_Return)}'";
    }

    $query = "UPDATE `{$this->table}` SET
						`User_Id`='{$db->Escape($mdl->User_Id)}',
						`Inventory_Id`='{$db->Escape($mdl->Inventory_Id)}',
						`Date_Loan`='{$db->Escape($mdl->Date_Loan)}',
						`Date_Return`={$mdl->Date_Return},
						`Date_Due`='{$db->Escape($mdl->Date_Due)}',
						`PenaltyFee`='{$db->Escape($mdl->PenaltyFee)}',
						`Status`='{$db->Escape($mdl->Status)}'
						WHERE `Loan_Id`='{$db->Escape($mdl->Loan_Id)}'";
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
                A.`Status`,
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

  public function IsLoaned($userId, $bookId)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT COUNT(*) CNT
							FROM `{$this->table}` L
              INNER JOIN `inventory` I
              ON L.Inventory_Id = I.Inventory_Id
              WHERE L.User_Id = '{$db->Escape($userId)}'
              AND I.Book_Id = '{$db->Escape($bookId)}'
              AND L.Date_Return IS NULL";
    $result = $mysqli->query($query);
    $mysqli->close();
    if ($result->fetch_object()->CNT > 0) {
      return true;
    }
    return false;
  }

  public function GetLoanStatus($userId, $bookId)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $query = "SELECT L.Status
							FROM `{$this->table}` L
              INNER JOIN `inventory` I
              ON L.Inventory_Id = I.Inventory_Id
              WHERE L.User_Id = '{$db->Escape($userId)}'
              AND I.Book_Id = '{$db->Escape($bookId)}'
              AND L.Date_Return IS NULL";
    $result = $mysqli->query($query);
    $mysqli->close();
    return $result->fetch_object()->Status;
  }

  public function GetBookByStatus($userId, $status, $limit = 5, $offset = 0)
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $lst = array();
    $query = "SELECT B.*,L.*
              FROM `loan` L
              INNER JOIN `inventory` I
              ON L.Inventory_Id = I.Inventory_Id
              INNER JOIN `book` B
              ON I.Book_Id = B.Book_Id
              WHERE L.User_Id = '{$db->Escape($userId)}'
              AND L.Status = '{$db->Escape($status)}'
              LIMIT {$limit} OFFSET {$offset}";
    $result = $mysqli->query($query);
    $mysqli->close();
    while ($obj = $result->fetch_object()) {
      $lst[] = $obj;
    }
    return $lst;
  }

  public function GetChart()
  {
    $db = new Database();
    $mysqli = $db->mysqli;
    $lst = array();
    $query = "SELECT
              COUNT(*) CNT,
              YEAR(Date_Loan) YEAR,
              MONTH(Date_Loan) MONTH,
              CONCAT(MONTH(Date_Loan) , '/' , YEAR(Date_Loan)) LABEL
              FROM `loan`
              WHERE Date_loan >= DATE_SUB(CURDATE(),INTERVAL 1 YEAR)
              GROUP BY YEAR(Date_Loan), MONTH(Date_Loan)
              ORDER BY YEAR(Date_Loan) ASC, MONTH(Date_Loan) ASC";
    $result = $mysqli->query($query);
    $mysqli->close();
    while ($obj = $result->fetch_object()) {
      $lst[] = $obj;
    }
    return $lst;
  }

  public function DefaultValues($mdl)
  {
    require_once("Subject.php");
    date_default_timezone_set('Asia/Manila');
    $mdlSubject = $clsSubject->GetLoanPeriodByInventory_Id($mdl->Inventory_Id);
    $mdl->Date_Loan = trim($mdl->Date_Loan);
    $mdl->Date_Due = trim($mdl->Date_Due);
    $mdl->Date_Return = trim($mdl->Date_Return);

    if (empty($mdl->Date_Loan)) {
      $mdl->Date_Loan = date("Y-m-d h:i:s");
    }

    if (empty($mdl->Date_Due)) {
      $hours = $mdlSubject->LoanPeriod;
      $mdl->Date_Due = date("Y-m-d H:i:s", strtotime($mdl->Date_Loan . " + {$hours} hour"));
    }

    if (empty($mdl->Date_Return)) {
      $mdl->Date_Return = null;
      $mdl->PenaltyFee = 0;
      if (!isset($mdl->Status)) {
        $mdl->Status = 0;
      }
    } else {
      $mdl->Status = 3;
      $overdue = $mdlSubject->Overdue;
      $date1 = new DateTime($mdl->Date_Loan);
      $date2 = new DateTime($mdl->Date_Return);
      $diff = $date2->diff($date1);
      $hours = $diff->h + ($diff->days * 24) - $mdlSubject->LoanPeriod;
      if ($hours > $mdlSubject->LoanPeriod) {
        $hours = $hours - $mdlSubject->LoanPeriod;
        $mdl->PenaltyFee = floor($hours / $overdue) * $mdlSubject->Penalty;
      } else {
        $mdl->PenaltyFee = 0;
      }
    }

    return $mdl;
  }
}
