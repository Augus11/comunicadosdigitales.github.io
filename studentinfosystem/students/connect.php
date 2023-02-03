<?php 

	$host = "localhost";
	$username = "root";
	$password = "";
	$db_name = "studentinfosystem";

	$con  = mysqli_connect('localhost','root','','studentinfosystem');


	if(!$con) {
		die("Cannot connect to the database");
	}

?>