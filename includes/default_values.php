<!-- Default UserType Data -->
<?php 
	global $connection;
	$newID = 0; $noData = 0;
	$query = "SELECT * FROM tbl_User_Type";
	$Users = mysqli_query($connection, $query);
	while ($User = mysqli_fetch_array($Users)) {
		$noData++;
	}
	if($noData == 0){
		$dataArray = array("System Administrator", "Business Administrator", "Staff", "Client");
		for($index = 0; $index < COUNT($dataArray); $index++){
			
			$newID++;
			global $connection;
			$sql = "INSERT INTO tbl_User_Type 
			VALUES ($newID,'{$dataArray[$index]}', 'Activated')";
			if(mysqli_query($connection, $sql)){
			}else{
			}	
		}
	}
	else{
	}
?>
<!-- Default UserType Data -->

<!-- Default Person Data -->
<?php 
	
	global $connection;
	$newID = 0; $noData = 0;
	$query2 = "SELECT * FROM tbl_Person";
	$Users2 = mysqli_query($connection, $query2);
	while ($User2 = mysqli_fetch_array($Users2)) {
		$noData++;
	}
	if($noData == 0){
		date_default_timezone_set("Asia/Manila");
		$Date = date("Y-m-d");
		$Time = date("h:i:sa");
		global $connection;
		$generated_code = "1".date("d")."".date("Y")."".date("m")."".date("i")."".date("s")."".date("h")."1";

		$sql1 = "INSERT INTO tbl_Person 
		VALUES (1,'$generated_code','John Stewarth','Gutang','Basalo','','0000-00-00','','','','','','','','', 'arthbasalo','','','$Date @ $Time', 'Saved',1,1)";
		if(mysqli_query($connection, $sql1)){
		}else{
		}
	}
	else{
	}
?>
<!-- Default Person Data -->

<!-- Default LogIn Data -->
<?php 
	
	global $connection;
	$newID = 0; $noData = 0;
	$query2 = "SELECT * FROM tbl_Account";
	$Users2 = mysqli_query($connection, $query2);
	while ($User2 = mysqli_fetch_array($Users2)) {
		$noData++;
	}
	if($noData == 0){
		date_default_timezone_set("Asia/Manila");
		$Date = date("Y-m-d");
		$Time = date("h:i:sa");
		$password=password_hash(add_escape_character("default123"), PASSWORD_DEFAULT);
		global $connection;
		$sql1 = "INSERT INTO tbl_Account 
		VALUES (1,1,'arthbasalo','$password','Activated')";
		if(mysqli_query($connection, $sql1)){
		}else{
		}
	}
	else{
	}
?>
<!-- Default LogIn Data -->