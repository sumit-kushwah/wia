
<?php 
include('config.php');
session_start();


$con= mysqli_connect('$db_host','$db_user','$db_pass');

mysqli_select_db($con,'$db_name');

 if($con)
 {
 	echo "connection succesful";
 }
 else
 {
 	echo "connection failed";
 }



$quizcode = $_POST['quizcode'];
$rollno= $_POST['rollno'];


$q1= " select * from students where strollno = '$rollno' && stquizname='$quizcode' ";

$res = mysqli_query($con,$q1);

$nor = mysqli_num_rows($res);

if($nor ==1 )
{
	echo "login successful";

	$_SESSION['qcode']=$quizcode;
	$_SESSION['rollno']=$rollno;

	header('location:showquestions.php');




}
else
{
	echo "login unsuccessful as you are not registered user";
}

 ?>