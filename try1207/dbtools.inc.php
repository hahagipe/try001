<?php
	function create_connect(){
		
		$conn=mysqli_connect("localhost","demo","123456") 
		or die("Error Link: ".mysqli_connect_error());

	return $conn;
	}
	function execute_sql($conn,$dbname,$sql){
		mysqli_select_db($conn,$dbname) or die("Error Open: ".mysqli_error($conn));

		$result=mysqli_query($conn,$sql);

		return $result;
	}
?>