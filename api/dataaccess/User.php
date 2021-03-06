<?php
$clsUser = new User();
class User
{

	private $table = "user";

	public function __construct()
	{
	}

	public function Add($mdl)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$password = password_hash($mdl->IDNumber, PASSWORD_DEFAULT);

		$query = "INSERT INTO `" . $this->table . "`
			(
				`IDNumber`,
				`Password`,
				`FirstName`,
				`MiddleName`,
				`LastName`,
				`SuffixName`,
				`HomeAddress`,
				`ContactNumber`,
				`EmailAddress`,
				`CardExpiration`,
				`Status`,
				`UserType`
			) VALUES (
				'" . $db->Escape($mdl->IDNumber) . "',
				'" . $db->Escape($password) . "',
				'" . $db->Escape($mdl->FirstName) . "',
				'" . $db->Escape($mdl->MiddleName) . "',
				'" . $db->Escape($mdl->LastName) . "',
				'" . $db->Escape($mdl->SuffixName) . "',
				'" . $db->Escape($mdl->HomeAddress) . "',
				'" . $db->Escape($mdl->ContactNumber) . "',
				'" . $db->Escape($mdl->EmailAddress) . "',
				'" . $db->Escape($mdl->CardExpiration) . "',
				'" . $db->Escape($mdl->Status) . "',
				'" . $db->Escape($mdl->UserType) . "'
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
							`IDNumber`='" . $db->Escape($mdl->IDNumber) . "',
							`FirstName`='" . $db->Escape($mdl->FirstName) . "',
							`MiddleName`='" . $db->Escape($mdl->MiddleName) . "',
							`LastName`='" . $db->Escape($mdl->LastName) . "',
							`SuffixName`='" . $db->Escape($mdl->SuffixName) . "',
							`HomeAddress`='" . $db->Escape($mdl->HomeAddress) . "',
							`ContactNumber`='" . $db->Escape($mdl->ContactNumber) . "',
							`EmailAddress`='" . $db->Escape($mdl->EmailAddress) . "',
							`CardExpiration`='" . $db->Escape($mdl->CardExpiration) . "',
							`Status`='" . $db->Escape($mdl->Status) . "',
							`UserType`='" . $db->Escape($mdl->UserType) . "'
						WHERE `User_Id`='" . $db->Escape($mdl->User_Id) . "';";
		$mysqli->query($query);
		$rows = $mysqli->affected_rows;
		$mysqli->close();
		return $rows;
	}

	public function UpdateLimited($mdl)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "UPDATE `{$this->table}` SET
							`FirstName`='" . $db->Escape($mdl->FirstName) . "',
							`MiddleName`='" . $db->Escape($mdl->MiddleName) . "',
							`LastName`='" . $db->Escape($mdl->LastName) . "',
							`SuffixName`='" . $db->Escape($mdl->SuffixName) . "',
							`HomeAddress`='" . $db->Escape($mdl->HomeAddress) . "',
							`ContactNumber`='" . $db->Escape($mdl->ContactNumber) . "',
							`EmailAddress`='" . $db->Escape($mdl->EmailAddress) . "'
						WHERE `User_Id`='" . $db->Escape($mdl->User_Id) . "';";
		$mysqli->query($query);
		$rows = $mysqli->affected_rows;
		$mysqli->close();
		return $rows;
	}

	public function UpdatePassword($userid, $password)
	{
		$db = new Database();
		$mysqli = $db->mysqli;

		$userid = $db->Escape($userid);
		$password = $db->Escape(password_hash($password, PASSWORD_DEFAULT));

		$query = "UPDATE `{$this->table}` SET
							`Password`='{$password}'
						WHERE `User_Id`='{$userid}';";
		$mysqli->query($query);
		$rows = $mysqli->affected_rows;
		$mysqli->close();
		return $rows;
	}

	public function UpdateDefaultPassword($userid)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$userid = $db->Escape($userid);

		$password = $this->GetIDNumber($userid);
		$password = $db->Escape(password_hash($password, PASSWORD_DEFAULT));

		$query = "UPDATE `" . $this->table . "` SET
							`Password`='" . $password . "'
						WHERE `User_Id`='" . $userid . "';";
		$mysqli->query($query);
		$rows = $mysqli->affected_rows;
		$mysqli->close();
		return $rows;
	}

	public function Delete($userid)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$userid = $db->Escape($userid);
		$query = "DELETE FROM `" . $this->table . "` 
							WHERE `User_Id`='" . $userid . "';";
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

	public function GetByUser_Id($userid)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$userid = $db->Escape($userid);

		$query = "SELECT 
							`User_Id`, 
							`IDNumber`, 
							`FirstName`, 
							`MiddleName`, 
							`LastName`, 
							`SuffixName`, 
							`HomeAddress`, 
							`ContactNumber`, 
							`EmailAddress`, 
							`CardExpiration`, 
							`Status`, 
							`UserType`, 
							`X_DateCreated`
						FROM `" . $this->table . "`
						WHERE `User_Id` = '" . $userid . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetIDNumber($userid)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$userid = $db->Escape($userid);

		$query = "SELECT `IDNumber` 
						FROM `" . $this->table . "`
						WHERE `User_Id` = '" . $userid . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object()->IDNumber;
	}

	public function GetName($userid)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$userid = $db->Escape($userid);

		$query = "SELECT `FirstName`,`MiddleName`,`LastName`,`SuffixName` 
						FROM `" . $this->table . "`
						WHERE `User_Id` = '" . $userid . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		return $result->fetch_object();
	}

	public function GetTable()
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();

		$query = "SELECT 
							`User_Id`,
							`IDNumber`,
							`FirstName`,
							`MiddleName`,
							`LastName`,
							`SuffixName`,
							`EmailAddress`,
							`UserType`,
							`Status`
						FROM `" . $this->table . "`";
		$result = $mysqli->query($query);
		$mysqli->close();
		while ($obj = $result->fetch_object()) {
			$lst[] = $obj;
		}
		return $lst;
	}

	public function IsExistUser_Id($userid)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$userid = $db->Escape($userid);

		$query = "SELECT COUNT(*) CNT
						FROM `" . $this->table . "`
						WHERE `User_Id` = '" . $userid . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function IsExistIDNumber($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$value = $db->Escape($value);

		$query = "SELECT COUNT(*) CNT
						FROM `" . $this->table . "`
						WHERE `IDNumber` = '" . $value . "'";
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}

	public function FormatName($mdl)
	{
		if (strlen($mdl->MiddleName) > 0) {
			$mdl->MiddleName = $mdl->MiddleName[0] . '.';
		}
		$output = ucwords($mdl->FirstName . ' ' . $mdl->MiddleName . ' ' . $mdl->LastName . ' ' . $mdl->SuffixName);
		$output = preg_replace('!\s+!', ' ', $output);
		return $output;
	}

	public function Login($idnumber, $password, $admin = false)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$idnumber = $db->Escape($idnumber);
		$password = $db->Escape($password);
		$admin = $db->Escape($admin);

		$query = "SELECT `User_Id`,`Password` FROM `" . $this->table . "`
						WHERE `IDNumber` = '" . $idnumber . "'
						AND `Status` = '0'";
		if ($admin) {
			$query .= " AND `UserType` = '0'";
		}
		$result = $mysqli->query($query);
		$mysqli->close();
		$mdl = $result->fetch_object();

		if ($mdl) {
			if (password_verify($password, $mdl->Password)) {
				return $mdl->User_Id;
			} else {
				return null;
			}
		} else {
			return null;
		}
	}

	public function IsPasswordCorrect($userId, $password)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$password = $db->Escape($password);

		$query = "SELECT `Password` FROM `{$this->table}`
							WHERE `User_Id` = '{$db->Escape($userId)}'";

		$result = $mysqli->query($query);
		$mysqli->close();
		$mdl = $result->fetch_object();

		if ($mdl) {
			if (password_verify($password, $mdl->Password)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function GetDropdown()
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();

		$query = "SELECT 
                `User_Id` AS `Value`,
                `IDNumber` AS `Text`
              FROM `user`
              ";
		$result = $mysqli->query($query);
		$mysqli->close();
		while ($obj = $result->fetch_object()) {
			$lst[] = $obj;
		}
		return $lst;
	}
}
