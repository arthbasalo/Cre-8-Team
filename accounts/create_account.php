<?php include("../includes/connection.php");?>
<?php include("../includes/function.php");?>
<?php 
$obj = json_decode($_GET["data"], false);
$first_name = $obj->first_name;
$middle_name = $obj->middle_name;
$last_name = $obj->last_name;
$affiliation_name = $obj->affiliation_name;
$date_of_birth = $obj->date_of_birth;
$sex = $obj->sex;
$civil_status = $obj->civil_status;
$region_option = $obj->region_option;
$province_option = $obj->province_option;
$city_option = $obj->city_option;
$barangay_option = $obj->barangay_option;
$house_number = $obj->house_number;
$street = $obj->street;
$email_address = $obj->email_address;
$contact_number = $obj->contact_number;
$telephone_number = $obj->telephone_number;
$user_type_id = $obj->user_type_id;
$status = $obj->status;
$access_status = $obj->access_status;
$password = $obj->password;
$personAddedBy = $obj->personAddedBy;

date_default_timezone_set("Asia/Manila");
$dateEncoded = date("Y-m-d");
$timeEncoded = date("h:i:s A");

$person_id = 0;
$query = "SELECT * FROM tbl_Person
ORDER BY person_id ASC";
$Users = mysqli_query($connection, $query);
while ($User = mysqli_fetch_array($Users)) {
	$person_id = $User['person_id'];
}
$person_id++;

$account_id = 0;
$query = "SELECT * FROM tbl_Account
ORDER BY account_id ASC";
$Users = mysqli_query($connection, $query);
while ($User = mysqli_fetch_array($Users)) {
	$account_id = $User['account_id'];
}
$account_id++;

$generated_code = $user_type_id."".date("d")."".date("Y")."".date("m")."".date("i")."".date("s")."".date("h").$person_id;

$sql = "INSERT INTO tbl_Person VALUES ($person_id,'$generated_code','$first_name','$middle_name','$last_name','$affiliation_name','$date_of_birth','$sex','$civil_status','$house_number','$street','$barangay_option','$city_option','$province_option','$region_option','$email_address','$contact_number','$telephone_number','$dateEncoded @ $timeEncoded','$status',$user_type_id,$personAddedBy)";
if(mysqli_query($connection, $sql)){
	
	// LOGS
	$type_description=Get_Type_Description($user_type_id);
	// $category,$id(primary_key),$code,$status,$description,$added_by(person_id)
	Create_Logs("NEW USER",$person_id, $generated_code, "CREATE","New $type_description user successfully saved<br>New Information<br>Firstname: $first_name, Middlename:$middle_name, Lastname: $last_name, Affiliation: $affiliation_name, Date of Birth: $date_of_birth, Sex: $sex, Civil Status: $civil_status, House Number: $house_number, Street: $street, Barangay: $barangay_option, City: $city_option, Province: $province_option,Region: $region_option, Username: $email_address, Contact Number: $contact_number, Telephone Number: $telephone_number, Status: $status",$personAddedBy);
	// END OF LOGS

	$hashpassword=password_hash(add_escape_character($password),PASSWORD_DEFAULT);
	$sql = "INSERT INTO tbl_Account 
	VALUES ($account_id,$person_id,'$email_address','$hashpassword','$access_status')";
	if(mysqli_query($connection, $sql)){
		
		// LOGS
		// $category,$id(primary_key),$code,$status,$description,$added_by(person_id)
		Create_Logs("CREATE ACCOUNT",$account_id, "", "CREATE","New $type_description account successfully saved<br>Account Information<br>Name: $last_name $affiliation_name, $first_name $middle_name<br>Username: $email_address<br>Password: $password / $hashpassword<br>Access Status: $access_status",$personAddedBy);
		// END OF LOGS
		echo true;

	}else{
		echo "Account Error: ".$connection->error;
	}

}else{
	echo "Person Error: ".$connection->error." || ".$sql;
}
?>