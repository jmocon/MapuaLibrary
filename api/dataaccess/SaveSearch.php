<?php
$clsSaveSearch = new SaveSearch();
class SaveSearch
{
	private $table = "savesearch";

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
				`Book_Id`
			) VALUES (
				'" . $db->Escape($mdl->User_Id) . "',
				'" . $db->Escape($mdl->Book_Id) . "'
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
						`Book_Id`='" . $db->Escape($mdl->Book_Id) . "'
						WHERE `SaveSearch_Id`='" . $db->Escape($mdl->SaveSearch_Id) . "'";
		$mysqli->query($query);
		$rows = $mysqli->affected_rows;
		$mysqli->close();
		return $rows;
	}

	public function Delete($bookId, $userId)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "DELETE FROM `{$this->table}`
							WHERE `Book_Id` = '{$db->Escape($bookId)}'
							AND `User_Id` = '{$db->Escape($userId)}';";
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

	public function GetByUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT * FROM `{$this->table}`
							WHERE `User_Id` = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		while ($obj = $result->fetch_object()) {
			$lst[] = $obj;
		}
		return $lst;
	}

	public function GetBookByUser_Id($value)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$lst = array();
		$query = "SELECT B.* FROM `{$this->table}` SS
							INNER JOIN `book` B
							ON SS.Book_Id = B.Book_Id
							WHERE SS.User_Id = '{$db->Escape($value)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		while ($obj = $result->fetch_object()) {
			$lst[] = $obj;
		}
		return $lst;
	}

	public function IsExistBook_Id($bookId, $userId)
	{
		$db = new Database();
		$mysqli = $db->mysqli;
		$query = "SELECT COUNT(*) CNT
							FROM `{$this->table}`
							WHERE `Book_Id` = '{$db->Escape($bookId)}'
							AND `User_Id` = '{$db->Escape($userId)}'";
		$result = $mysqli->query($query);
		$mysqli->close();
		if ($result->fetch_object()->CNT > 0) {
			return true;
		}
		return false;
	}
}
