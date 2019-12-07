<?php

//尋找是否有帳號存在:true-存在,false-不存在

	$uni_username = $_POST["uni_username"];

	require_once("dbtools.inc.php");
	$conn=create_connect();
	$sql = "SELECT * FROM member WHERE Username = '$uni_username'";
	$result = execute_sql($conn, "demoDB", $sql);


	if(mysqli_num_rows($result) == 1){
		echo true;
	}else{
		echo false;
	}

	mysqli_close($conn);
?>