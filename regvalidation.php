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



$username= $_POST['username'];
$pass = $_POST['psw'];
$email= $_POST['email'];


$q1= " select * from user where username = '$username'";

$res = mysqli_query($con,$q1);

$nor = mysqli_num_rows($res);


if($nor >= 1)
{	session_destroy();
	session_start();
	$_SESSION['regstatus']=1;
	header('location:register.php');
}
else
{
	$q2= "insert into user (username, password, userMail) values ('$username' , '$pass' , '$email')";
	session_destroy();
	session_start();
	$_SESSION['regstatus'] = 2;
	$res2 = mysqli_query($con,$q2);
	
	header('location:index.php');

	?>

	

	<?php
	
}


 ?>