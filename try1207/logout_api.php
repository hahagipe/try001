<?php
	session_start();
	if (session_destroy()) {
		//php跳頁語法:header(location:"")
		header("location:http://192.168.60.69/webdesign/20190826_member/login.php");
	}
	
?>