<?php 
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
	# code...
	header('location:login.php');
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>resultpage</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<style type="text/css">
		.contm{
			padding:15%; 

			padding-left: 27%;

		}
	</style>
</head>
<body onload="">
<div class="container contm">
	<div class="card shadow col-lg-8 " >
  <div class="card-header">  YOUR RESULT</div>

  	<div class="card-body">

  	<?php error_reporting (E_ALL ^ E_NOTICE); ?>


<?php

$con= mysqli_connect("$db_host","$db_user","$db_pass");

mysqli_select_db($con,"$db_name");

if(isset($_POST['submit'])){
	if(!empty($_POST['quizcheck'])){

	$c = count($_POST['quizcheck']);

	$selected = $_POST['quizcheck'];}
	else
	{
		$c=0;
	}

	$quizcode = $_SESSION['qcode'];
	$qans = $quizcode."ans";

	$q= "select * from $quizcode";

	$attempt=0;
	

	$query = mysqli_query($con,$q);

	$num= mysqli_num_rows($query);

	$qq= "select * from quizs where qcode ='$quizcode'";

	$res=mysqli_query($con,$qq);

	$resarray = mysqli_fetch_array($res);

	$numofopt=$resarray['numofopt'];
	$numofque=$resarray['numofq'];

	$result=0;

	$i=1;
	$correctopt=0;
	while ($rows = mysqli_fetch_array($query)) {


		if ($selected[$i]%$numofopt==0) {
			# code...
			$correctopt=$numofopt;
		}
		else
		{
			$correctopt=$selected[$i]%$numofopt;
		}

		$pp =  ($rows['correctans'] == ($correctopt));
		if($pp)
		{
			$result++;
		}
$i++;
		
	}		
}


	$username= $_SESSION['username'];

$quer= "select * from quizs where qcode = '$quizcode'";

$resquer= mysqli_query($con,$quer);

$ressarr=mysqli_fetch_array($resquer);


?>

	
	<h2><?php echo "$result"."/"."$num" ?></h2>

  </div>
  <div>
  	
  	<?php 

  	if ($ressarr['qstatus']==0) {
  		# code...
  		?>

  		<p>But your submission is invalid because quiz is deactivated by author.</p>

  		<?php
  	}

  	 ?>

  </div>
  </div>
  <br>
  <div class="row " style="padding-left: 25%">
  	
  	<form action="logout.php" >
  		<input type="submit" name="submit" value="Logout" class="mr-3 btn btn-success">
  	</form>
  		<form action="index.php" >
  		<input type="submit" name="submit" value="Home page" class="btn btn-success">
  	</form>

  </div>


<?php
	$username= $_SESSION['username'];

$quer= "select * from quizs where qcode = '$quizcode'";

$resquer= mysqli_query($con,$quer);

$ressarr=mysqli_fetch_array($resquer);



if ($_SESSION['refreshstatus']==2) {

	
	header('location:index.php');
	$_SESSION['refreshstatus']=3;

}
else if ($_SESSION['refreshstatus']==1 && $ressarr['qstatus']==1) {
	# code...

		# code...


$q = "select * from userandquiz where username='$username' && qcode='$quizcode'";

$resq=mysqli_query($con,$q); 
$attemptvalue= mysqli_num_rows($resq)+1;
date_default_timezone_set('Asia/Kolkata');
$date= date("Y-m-d");
$time=date('h:i:s a');
$q2= "insert into userandquiz (username,qcode ,attempt,dateparticipated,score,numoque,timesubmitted)values (
'$username','$quizcode',$attemptvalue,'$date',$result,$numofque,'$time')";
$resq2=mysqli_query($con,$q2); 

$_SESSION['refreshstatus']=2;
}


 ?>

</div>




</body>
</html>
