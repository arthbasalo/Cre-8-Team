<?php include("../includes/connection.php");?>
<?php include("../includes/function.php");?>
<?php include("../includes/session.php");?>
<?php 
	$signedin_user_type_id = $_SESSION['userTypeId'];
	$signedin_person_id = $_SESSION['personId'];
?>
<table class="table table-hover w3-responsive" style="color: black;">
<thead>
	<tr>
	  <th style="width: 2%">#</th>
	  <th style="width: 15%">Name</th>
	  <th style="width: 20%">Home Address</th>
	  <th style="width: 10%">Username</th>
	  <th style="width: 15%">Date & Time Created</th>
	  <th style="width: 5%">Account Status</th>
	  <th style="width: 10%">Action</th>
	</tr>
</thead>
<?php 
$obj = json_decode($_GET["data"], false);
$filter = $obj->filter;
$userType = $obj->userType;
$start = $obj->start;
$end = $obj->end;

if($signedin_user_type_id==1){
$filterCounter = 0;
$query = "SELECT * FROM tbl_Person INNER JOIN tbl_Account
ON tbl_Person.person_id=tbl_Account.person_id 
WHERE tbl_Person.last_name LIKE \"%$filter%\" 
OR tbl_Person.first_name LIKE \"%$filter%\" OR 
tbl_Person.middle_name LIKE \"%$filter%\" 
OR tbl_Person.affiliation_name LIKE \"%$filter%\" 
OR tbl_Person.person_code LIKE \"%$filter%\" OR 
tbl_Account.account_status LIKE \"%$filter%\"
ORDER BY tbl_Person.last_name, tbl_Person.first_name, tbl_Person.middle_name ASC";
$Users = mysqli_query($connection, $query);
while ($User = mysqli_fetch_array($Users)) {
if($User['user_type_id'] == $userType){
	$filterCounter++;
	if($filterCounter>=$start && $filterCounter<=$end){
	$statusColor = statusColor($User['account_status']);

echo "<tr>
	<td>{$filterCounter}</td>
	<td>{$User['last_name']} {$User['affiliation_name']}, {$User['first_name']} 
		{$User['middle_name']}</td>
	<td>{$User['house_no']} {$User['street']} Brgy. {$User['barangay']}, {$User['city']}, {$User['province']}, {$User['region']}</td>
	<td>{$User['email_address']}</td>
	<td>{$User['person_created_at']}</td>
	<td>{$statusColor}</td>
	<td>
		<button class='btn alert-success btn-medium' 
		name='{$User['person_id']}'
		style='margin-bottom:2px;'
		onclick='btnViewPersonInformation({$User['person_id']})' 
		data-toggle='tooltip' title='View User\"s Profile'
		id='{$User['person_id']}' >
		<i class='icofont-eye'></i></button>

		<button class='btn alert-info btn-medium' 
		name='{$User['person_id']}'
		style='margin-bottom:2px;'
		onclick='btnUpdatePersonInformation({$User['person_id']})' 
		data-toggle='tooltip' title='Update User\"s Profile'
		id='{$User['person_id']}' >
		<i class='icofont-edit'></i></button> 

		<button class='btn alert-warning btn-medium' 
		name='{$User['person_id']}'
		style='margin-bottom:2px;'
		onclick='btnChangeAccessStatus({$User['person_id']})' 
		data-toggle='tooltip' title='Change Access Account Status'
		id='{$User['person_id']}' >
		<i class='icofont-refresh'></i></button> 

		<button class='btn alert-danger btn-medium' 
		name='{$User['person_id']}'
		style='margin-bottom:2px;'
		onclick='btnResetPassword({$User['person_id']})' 
		data-toggle='tooltip' title='Reset Password'
		id='{$User['person_id']}' >
		<i class='icofont-lock'></i></button>
	</td>
</tr>";
	}//end of pagination
}//end of if
}//end of while
}//end of if
else if($signedin_user_type_id==2){
$filterCounter = 0;
$query = "SELECT * FROM tbl_Person INNER JOIN tbl_Account
ON tbl_Person.person_id=tbl_Account.person_id 
WHERE tbl_Person.last_name LIKE \"%$filter%\" OR 
tbl_Person.first_name LIKE \"%$filter%\" OR 
tbl_Person.middle_name LIKE \"%$filter%\" OR 
tbl_Person.affiliation_name LIKE \"%$filter%\" OR 
tbl_Person.person_code LIKE \"%$filter%\" OR 
tbl_Account.account_status LIKE \"%$filter%\"
ORDER BY tbl_Person.last_name, tbl_Person.first_name, tbl_Person.middle_name ASC";
$Users = mysqli_query($connection, $query);
while ($User = mysqli_fetch_array($Users)) {
if($User['user_type_id'] == $userType && $User['added_by']==$signedin_person_id){
	$filterCounter++;
	if($filterCounter>=$start && $filterCounter<=$end){
	$statusColor = statusColor($User['account_status']);

	
echo "<tr>
	<td>{$filterCounter}</td>
	<td>{$User['last_name']} {$User['affiliation_name']}, {$User['first_name']} 
		{$User['middle_name']}</td>
	<td>{$User['house_no']} {$User['street']} Brgy. {$User['barangay']}, {$User['city']}, {$User['province']}, {$User['region']}</td>
	<td>{$User['email_address']}</td>
	<td>{$User['person_created_at']}</td>
	<td>{$statusColor}</td>
	<td>
		<button class='btn alert-success btn-medium' 
		name='{$User['person_id']}'
		style='margin-bottom:2px;'
		onclick='btnViewPersonInformation({$User['person_id']})' 
		data-toggle='tooltip' title='View User\"s Profile'
		id='{$User['person_id']}' >
		<i class='icofont-eye'></i></button>

		<button class='btn alert-info btn-medium' 
		name='{$User['person_id']}'
		style='margin-bottom:2px;'
		onclick='btnUpdatePersonInformation({$User['person_id']})' 
		data-toggle='tooltip' title='Update User\"s Profile'
		id='{$User['person_id']}' >
		<i class='icofont-edit'></i></button> 

		<button class='btn alert-warning btn-medium' 
		name='{$User['person_id']}'
		style='margin-bottom:2px;'
		onclick='btnChangeAccessStatus({$User['person_id']})' 
		data-toggle='tooltip' title='Change Access Account Status'
		id='{$User['person_id']}' >
		<i class='icofont-refresh'></i></button> 

		<button class='btn alert-danger btn-medium' 
		name='{$User['person_id']}'
		style='margin-bottom:2px;'
		onclick='btnResetPassword({$User['person_id']})' 
		data-toggle='tooltip' title='Reset Password'
		id='{$User['person_id']}' >
		<i class='icofont-lock'></i></button>
	</td>
</tr>";
	}//end of pagination
}//end of if
}//end of while
}
	if($filterCounter == 0){
		echo "<tr>
			<td colspan='1000' class='alert alert-success'>
				<i class='fa fa-warning'></i> No Records Found !.
			</td>
		</tr>";
	}
?>
</table>