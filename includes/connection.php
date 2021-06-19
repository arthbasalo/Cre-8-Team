<?php
	$server="localhost";
	$user="root";
	$pass="";
	$name="createteamdb";
	$connection = mysqli_connect($server,$user,$pass,$name);
	if(!$connection){
		die("");
	}
?>