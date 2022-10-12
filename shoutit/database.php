<?php 
//connect to MySQL
$con = mysqli_connect("localhost", "root", "", "shoutit");

//test connection
if(mysqli_connect_errno()){
	echo "Failed to connect: ".mysqli_connect_error();
}