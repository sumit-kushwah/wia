<?php 
include 'config.php';
session_start();


$con= mysqli_connect("$db_host","$db_user","$db_pass");

mysqli_select_db($con,"$db_name");

$qname= $_POST['quizcode'];



 	
 	$qnameans = $qname."ans";

 	if(isset($qname))
 	{
 		
 		$q = "delete from quizs where qcode = '$qname'";

 		$q2="drop table $qname,$qnameans";

 		$q3= "delete from userandquiz where qcode ='$qname'";

 		$res = mysqli_query($con, $q);
 		$res2 =mysqli_query($con,$q2);
 		$res3=mysqli_query($con,$q3);
 		
 		header('location:userprofile.php');

 		

 	}

  ?>