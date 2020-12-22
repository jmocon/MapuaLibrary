<?php
class Database
{
	public $mysqli;

	public function Database()
	{

		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$dbname = 'mapualibrary';

		$this->mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($this->mysqli->connect_errno) {
			die("Failed to connect to MySQL: " . $this->mysqli->connect_error);
		}
	}

	public function Escape($value)
	{
		return $this->mysqli->real_escape_string($value);
	}
}
