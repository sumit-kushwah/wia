<?php 
include 'config.php';
session_start();


$con= mysqli_connect("$db_host","$db_user","$db_pass");

mysqli_select_db($con,"$db_name");

	// if($con)
 // {
 // 	echo "connection succesful";
 // }
 // else
 // {
 // 	echo "connection failed";
 // }

$qname= $_POST['quizcode'];



 	
 	$qnameans = $qname."ans";

 	if(isset($qname))
 	{
 		
 		$q = "delete from quizs where qcode = '$qname'";

 		$q2="drop table $qname,$qnameans";

 		$res = mysqli_query($con, $q);
 		$res2 =mysqli_query($con,$q2);
 		
 		header('location:userprofile.php');

 		

 	}

  ?>