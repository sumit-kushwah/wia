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





 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>delete your quiz
 	</title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 </head>
 <body>
 <div class="container border">

 	<div class="text-center">
 		<h1>Delete your quiz</h1>
 		<form action="#" method="post">
 			<div class="form-group">
 				<label for="quizcode">Enter quizcode to be deleted</label>
 				<input type="text" name="quizcode" id="quizcode">

 			</div>
 			<div >
 				 <button type="submit" class="btn btn-primary text-center">Delete</button>
 			</div>
 		</form>
 	</div>
 	
 </div>
 </body>
 </html>

 <?php 

 	$qname = $_POST['quizcode'];
 	$qnameans = $qname."ans";

 	if(isset($qname))
 	{
 		echo $qname."<br>";
 		$q= "drop table $qname";
 		$q2= "drop table $qnameans";

 		$q3 = "delete from teacher where tcodename = '$qname'";

 		$res = mysqli_query($con, $q);
 		$res2 =mysqli_query($con,$q2);
 		$res3 =mysqli_query($con,$q3);

 		echo "successfully deleted";
 		echo $res;

 	}

  ?>