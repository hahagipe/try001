<?php

	//註冊

	$Username=$_POST["Username"];
	$Password=$_POST["Password"];

	require_once("dbtools.inc.php");
	$conn=create_connect();

	//密碼加密
	$Password_md5=md5($Password);

	$sql="INSERT INTO member(Username,Password)VALUES('$Username','$Password_md5')";

	if (execute_sql($conn,"demoDB",$sql)) {
		echo true;
	}else{
		echo false;
	}

	mysqli_close($conn);
?>