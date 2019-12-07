<?php

//直接拿check_uni_api來改即可
//登入帳號 存在:true-登入成功,false-登入失敗
	
	//使用section前一定要加入此語法
	session_start();

	$Username = $_POST["Username"];
	$Password = $_POST["Password"];

	require_once("dbtools.inc.php");
	$conn=create_connect();

	//密碼加密
	$Password_md5=md5($Password);

	//更改此行內容(WHERE AND)
	$sql = "SELECT * FROM member WHERE Username = '$Username' AND Password='$Password_md5'";

	$result = execute_sql($conn, "demoDB", $sql);

	if(mysqli_num_rows($result) == 1){
		//先從$result抓資料(判斷資料庫有無與此筆相符資料)
		$row=mysqli_fetch_assoc($result);
		//把抓到的資料存給$_SESSION:$_SESSION["Username"]可直接給前端網站呼叫
		$_SESSION["Username"]=$row["Username"];  
		echo true;
	}else{
		echo false;
	}

	mysqli_close($conn);
?>