
<?php 
include 'config.php';
session_start();


$con= mysqli_connect("$db_host","$db_user","$db_pass");

mysqli_select_db($con,"$db_name");

//  if($con)
//  {
//  	echo "connection succesful";
//  }
//  else
//  {
//  	echo "connection failed";
//  }



$username = $_POST['username'];
$password= $_POST['psw'];


$q1= " select * from user where username = '$username' && password='$password' ";

$res = mysqli_query($con,$q1);

$nor = mysqli_num_rows($res);

if($nor ==1 )
{
	// echo "login successful";

	$_SESSION['username']=$username;
	$_SESSION['status']=1;

	header('location:index.php');
}
else
{
	$_SESSION['status']=0;
	header('location:index.php');
}
?>