<?php 
function add_escape_character($value) {
$magic_quotes_active = get_magic_quotes_gpc();
$compatible_version = function_exists("mysql_real_escape_string");
 
if($compatible_version) { // PHP v4.3.0 or higher
  if($magic_quotes_active) {$value=stripslashes($value);}
     // $value = mysql_real_escape_string($value);
} else {
  if(!$magic_quotes_active) {$value=addslashes($value);}
}

return $value;
}


function VerifyUserAccount($accountNumber, $accountPassword){
global $connection;

$isValid = false;
$query = "SELECT * FROM tbl_Account
  INNER JOIN  tbl_Person ON tbl_Account.person_id=tbl_Person.person_id";
$Users = mysqli_query($connection, $query);
while ($User = mysqli_fetch_array($Users)) {
	if($User['username'] == $accountNumber
		&& password_verify($accountPassword,$User['password'])){
		$isValid = true;
	}
}
return $isValid;
}//end of Function


function UserPersonName($personId){
global $connection;
$personCreated="";
$query = "SELECT * FROM tbl_Person 
WHERE person_id={$personId}";
$Users = mysqli_query($connection, $query);
while ($User = mysqli_fetch_array($Users)) {
	$personCreated="{$User['last_name']} {$User['affiliation_name']}, {$User['first_name']} {$User['middle_name']}";
}
return $personCreated;
}

function Get_User_Type_Description($personId){
global $connection;
$type_description="";
$query = "SELECT * FROM tbl_Person
INNER JOIN tbl_User_Type
ON tbl_Person.user_type_id = tbl_User_Type.user_type_id
WHERE tbl_Person.person_id={$personId}";
$Users = mysqli_query($connection, $query);
while ($User = mysqli_fetch_array($Users)) {
	$type_description="{$User['type_description']}";
}
return $type_description;
}

function Create_Logs($category,$id,$code,$status,$description,$added_by){
global $connection;

date_default_timezone_set("Asia/Manila");
$dateEncoded = date("Y-m-d");
$timeEncoded = date("h:i:s A");

$logs_id = 0;
$query = "SELECT * FROM tbl_Logs
ORDER BY logs_id ASC";
$Users = mysqli_query($connection, $query);
while ($User = mysqli_fetch_array($Users)) {
	$logs_id = $User['logs_id'];
}
$logs_id++;
$logs_code=date("d")."".date("Y")."".date("m")."".date("i")."".date("s")."".date("h").$logs_id;

$sql = "INSERT INTO tbl_Logs VALUES ($logs_id,'$logs_code','$category',$id,'$code','$status','$description','$dateEncoded @ $timeEncoded',$added_by)";
mysqli_query($connection, $sql);

}

function Get_Type_Description($type_id){
global $connection;
$type_description="";
$query = "SELECT * FROM  tbl_User_Type
WHERE user_type_id={$type_id}";
$Users = mysqli_query($connection, $query);
while ($User = mysqli_fetch_array($Users)) {
	$type_description="{$User['type_description']}";
}
return $type_description;
}


function GetMonthDescription($date){

	$months = array("", "Jan", "Feb", "Mar", "Apr", "May", "Jun",
		"Jul", "Aug", "Sept", "Oct", "Nov", "Dec");
	$dateYear = substr($date, 0,4);
	$monthDescription = $months[(int)(substr($date, 5,2))];
	$dateDays = substr($date, 8,2);
	$fullDate = $monthDescription."-".$dateDays."-".$dateYear;

	return $fullDate;
}

function statusColor($status){
	$arrayStatus = array("none","Restore","Queued","Pending","Registration","Expense","Damage", "LateTransaction","true","false","Added","Present","Absent","Late","Excuse","Not Yet","No Attendance","Done","Saved", "Cancelled", "Request", "Requested", "Active", "Deactive", "Confirmed","Expired","Activated","Deactivated","Blocked","No Account", "Incomplete", "Completed", "Open", "Closed", "Evaluated", "Unevaluated","Deleted", "Walk-In Request", "Online Register");
	$arrayBadge = array("None",
		"<span class=\"w3-tag w3-round w3-red\">Restored</span>",
		"<span class=\"w3-tag w3-round w3-green \">Queued</span>",
		"<span class=\"w3-tag w3-round w3-yellow\">Pending</span>",
		"<span class=\"w3-tag w3-round w3-yellow\">Registration</span>",
		"<span class=\"w3-tag w3-round w3-orange\">Expense</span>",
		"<span class=\"w3-tag w3-round w3-red\">Damage</span>",
		"<span class=\"w3-tag w3-round w3-yellow\">Late</span>",
		"<span class=\"w3-tag w3-round w3-green\">True</span>",
		"<span class=\"w3-tag w3-round w3-red\">False</span>", 
		"<span class=\"w3-tag w3-round w3-green\">Added</span>",
		"<span class=\"w3-tag w3-round w3-green\">Present</span>",
		"<span class=\"w3-tag w3-round w3-red\">Absent</span>", 
		"<span class=\"w3-tag w3-round w3-yellow\">Late</span>",
		"<span class=\"w3-tag w3-round w3-blue\">Excuse</span>", 
		"<span class=\"w3-tag w3-round w3-yellow\">Not Yet</span>", 
		"<span class=\"w3-tag w3-round w3-gray\">No Attendance</span>", 
		"<span class=\"w3-tag w3-round w3-green\">Done</span>", 
		"<span class=\"w3-tag w3-round w3-green\">Saved</span>", 
		"<span class=\"w3-tag w3-round w3-red\">Cancelled</span>", 
		"<span class=\"w3-tag w3-round w3-yellow\">Request</span>", 
		"<span class=\"w3-tag w3-round w3-yellow\">Requested</span>", 
		"<span class=\"w3-tag w3-round w3-green\">Active</span>", 
		"<span class=\"w3-tag w3-round w3-red\">Deactive</span>",
		"<span class=\"w3-tag w3-round w3-green\">Confirmed</span>",
		"<span class=\"w3-tag w3-round w3-red\">Expired</span>", 
		"<span class=\"w3-tag w3-round w3-green\">Activated</span>", 
		"<span class=\"w3-tag w3-round w3-red\">Deactivated</span>", 
		"<span class=\"w3-tag w3-round w3-yellow\">Blocked</span>", 
		"<span class=\"w3-tag w3-round w3-yellow\">No Account</span>", 
		"<span class=\"w3-tag w3-round w3-yellow\">Incomplete</span>", 
		"<span class=\"w3-tag w3-round w3-green\">Completed</span>", 
		"<span class=\"w3-tag w3-round w3-yellow\">Open</span>",
		"<span class=\"w3-tag w3-round w3-red\">Closed</span>",
		"<span class=\"w3-tag w3-round w3-green\">Evaluated</span>",
		"<span class=\"w3-tag w3-round w3-red\">Unevaluated</span>",
		"<span class=\"w3-tag w3-round w3-red\">Deleted</span>",
		"<span class=\"w3-tag w3-round w3-green\">Walk-In Request</span>",
		"<span class=\"w3-tag w3-round w3-blue\">Online Register</span>");

	$id = 0;
	for($index = 0; $index < COUNT($arrayStatus); $index++){
		if($status == $arrayStatus[$index]){
			$id = $index; break;
		}else{

		}
	}
	return "<span style=\"text-transform:uppercase\">".$arrayBadge[$id]."</span>";
}

function GenerateDisplayId($desc, $id){
	$newId = "";
	$zeroes = 6;
	$getZeroes = 0;
	$getZeroes = $zeroes-strlen($id);
	$generate = "";
	
	for($index = 0; $index < $getZeroes; $index++)
		$generate .= "0";

	$newId = $desc."-".$generate.$id;
	return $newId;
}

function addComma($number){
$counter = 0;
$whole = "";
$flipWhole = "";
$decimal = "";
$num_text = (string)$number; // convert into a string
$array = str_split($num_text);

//get whole numbers
foreach ($array as $char) {
	if($char != "."){
		$counter++; 
		$whole .= $char;
	}
	else
		break;
}

//get decimal numbers
for($index = $counter; $index <strlen($num_text); $index++){
	if($array[$index] != ".")
		$decimal .= $array[$index];
}

//flip whole numbers
$array2 = str_split($whole);
for($index2 = strlen($whole) - 1; $index2 >= 0; $index2--){
	$flipWhole .= $array2[$index2];
}

//add comma per 3 digits
$array3 = str_split($flipWhole, "3"); // break string in 3 character sets
$num_new_text = implode(",", $array3);  // implode array with comma
$array4 = str_split($num_new_text);
$whole = "";

//flip to the original 
for($index3 = strlen($num_new_text) - 1; $index3 >= 0; $index3--){
	$whole .= $array4[$index3];
}

if($decimal != "")
	return $whole . "." . $decimal;
else
	return $whole;
}

function AsOfDate(){
	date_default_timezone_set("Asia/Manila");
	$dateEncoded = GetMonthDescription(date("Y-m-d"));
	$timeEncoded = date("h:i:s A");
	echo "As of: $dateEncoded @ $timeEncoded<br>";
}
?>