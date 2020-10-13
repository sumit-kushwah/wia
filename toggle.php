<?php 
include 'config.php';
session_start();


$con= mysqli_connect("$db_host","$db_user","$db_pass");

mysqli_select_db($con,"$db_name");



$qname= $_POST['quizcode'];

$qq="select * from quizs where qcode='$qname'";

$ress= mysqli_query($con,$qq);

$ressarr=mysqli_fetch_array($ress);

 	
 	$qnameans = $qname."ans";
 	// echo $ressarr['qstatus'];

 	if($ressarr['qstatus']==1)
 	{
 		
 		

 		$q2="update quizs set qstatus=0 where qcode='$qname'";

 		
 		$res2 =mysqli_query($con,$q2);
 		
 		header('location:userprofile.php');

 		

 	}
 	else
 	{
 		$q2="update quizs set qstatus=1 where qcode='$qname'";

 		
 		$res2 =mysqli_query($con,$q2);
 		
 		header('location:userprofile.php');
 	}

  ?>