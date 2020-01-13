<?php 
include 'config.php';
session_start();


$con= mysqli_connect("$db_host","$db_user","$db_pass");

mysqli_select_db($con,"$db_name");

 if($con)
 {
 	echo "connection succesful";
 }
 else
 {
 	echo "connection failed";
 }



$name= $_POST['name'];
$quizcode = $_POST['quizcode'];
$rollno= $_POST['rollno'];
$email= $_POST['email'];

echo $rollno . " </br>";
echo $quizcode . "</br>";

$q1= " select * from students where strollno = '$rollno' && stquizname='$quizcode' ";

$res = mysqli_query($con,$q1);

$nor = mysqli_num_rows($res);

echo "</br>".$nor;

if($nor >= 1)
{
	// echo "you are already registered";
	header('location:register.php');
}
else
{
	$q2= "insert into students (stname, stquizname, stemail, strollno) values ('$name' , '$quizcode' , '$email' , '$rollno')";
	$res2 = mysqli_query($con,$q2);
	$_SESSION['message'] = "you are registered now you can login";
	header('location:home_page.php');

	?>

	

	<?php
	
}


 ?>