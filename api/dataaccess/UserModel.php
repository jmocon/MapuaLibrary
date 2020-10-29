<?php
$mdlUser = new UserModel();
class UserModel{

	public $User_Id = "";
	public $IDNumber = "";
	public $Password = "";
	public $FirstName = "";
	public $MiddleName = "";
	public $LastName = "";
	public $SuffixName = "";
	public $HomeAddress = "";
	public $ContactNumber = "";
	public $EmailAddress = "";
	public $CardExpiration = "";
	public $Status = "";
	public $UserType = "";
	public $X_DateCreated = "";

	public function __construct(){}

	//User_Id
	public function getUser_Id(){
		return $this->User_Id;
	}

	public function getsqlUser_Id(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->User_Id);
		mysqli_close($conn);
		return $value;
	}

	public function setUser_Id($User_Id){
		$this->User_Id = $User_Id;
	}


	//IDNumber
	public function getIDNumber(){
		return $this->IDNumber;
	}

	public function getsqlIDNumber(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->IDNumber);
		mysqli_close($conn);
		return $value;
	}

	public function setIDNumber($IDNumber){
		$this->IDNumber = $IDNumber;
	}


	//Password
	public function getPassword(){
		return $this->Password;
	}

	public function getsqlPassword(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->Password);
		mysqli_close($conn);
		return $value;
	}

	public function setPassword($Password){
		$this->Password = $Password;
	}


	//FirstName
	public function getFirstName(){
		return $this->FirstName;
	}

	public function getsqlFirstName(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->FirstName);
		mysqli_close($conn);
		return $value;
	}

	public function setFirstName($FirstName){
		$this->FirstName = $FirstName;
	}


	//MiddleName
	public function getMiddleName(){
		return $this->MiddleName;
	}

	public function getsqlMiddleName(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->MiddleName);
		mysqli_close($conn);
		return $value;
	}

	public function setMiddleName($MiddleName){
		$this->MiddleName = $MiddleName;
	}


	//LastName
	public function getLastName(){
		return $this->LastName;
	}

	public function getsqlLastName(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->LastName);
		mysqli_close($conn);
		return $value;
	}

	public function setLastName($LastName){
		$this->LastName = $LastName;
	}


	//SuffixName
	public function getSuffixName(){
		return $this->SuffixName;
	}

	public function getsqlSuffixName(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->SuffixName);
		mysqli_close($conn);
		return $value;
	}

	public function setSuffixName($SuffixName){
		$this->SuffixName = $SuffixName;
	}


	//HomeAddress
	public function getHomeAddress(){
		return $this->HomeAddress;
	}

	public function getsqlHomeAddress(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->HomeAddress);
		mysqli_close($conn);
		return $value;
	}

	public function setHomeAddress($HomeAddress){
		$this->HomeAddress = $HomeAddress;
	}


	//ContactNumber
	public function getContactNumber(){
		return $this->ContactNumber;
	}

	public function getsqlContactNumber(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->ContactNumber);
		mysqli_close($conn);
		return $value;
	}

	public function setContactNumber($ContactNumber){
		$this->ContactNumber = $ContactNumber;
	}


	//EmailAddress
	public function getEmailAddress(){
		return $this->EmailAddress;
	}

	public function getsqlEmailAddress(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->EmailAddress);
		mysqli_close($conn);
		return $value;
	}

	public function setEmailAddress($EmailAddress){
		$this->EmailAddress = $EmailAddress;
	}


	//CardExpiration
	public function getCardExpiration(){
		return $this->CardExpiration;
	}

	public function getsqlCardExpiration(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->CardExpiration);
		mysqli_close($conn);
		return $value;
	}

	public function setCardExpiration($CardExpiration){
		$this->CardExpiration = $CardExpiration;
	}


	//Status
	public function getStatus(){
		return $this->Status;
	}

	public function getsqlStatus(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->Status);
		mysqli_close($conn);
		return $value;
	}

	public function setStatus($Status){
		$this->Status = $Status;
	}


	//UserType
	public function getUserType(){
		return $this->UserType;
	}

	public function getsqlUserType(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->UserType);
		mysqli_close($conn);
		return $value;
	}

	public function setUserType($UserType){
		$this->UserType = $UserType;
	}


	//X_DateCreated
	public function getX_DateCreated(){
		return $this->X_DateCreated;
	}

	public function getsqlX_DateCreated(){
		$Database = new Database();
		$conn = $Database->GetConn();
		$value = mysqli_real_escape_string($conn,$this->X_DateCreated);
		mysqli_close($conn);
		return $value;
	}

	public function setX_DateCreated($X_DateCreated){
		$this->X_DateCreated = $X_DateCreated;
	}


}
