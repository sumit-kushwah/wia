<?php 
include 'config.php';
session_start();

if (!isset($_SESSION['rollno'])) {
	# code...
	header('location:login.php');
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>resultpage</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	<style type="text/css">
		.contm{
			padding:15%; 

			padding-left: 27%;

		}
	</style>
</head>
<body>
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

	$result=0;

	$i=1;
	
	while ($rows = mysqli_fetch_array($query)) {

		

		$pp =  ($rows['correctans'] == ($selected[$i]));
		if($pp)
		{
			$result++;
		}
$i++;
		
	}


	
		
?>
		
<?php	


	
}

?>

	
	<h2><?php echo "$result"."/"."$num" ?></h2>





  </div>
  </div>
  <br>
  <div style="padding-left: 25%">
  	
  	<form action="logout.php" >
  		<input type="submit" name="submit" value="Logout" class="btn btn-success">
  	</form>

  </div>


<?php

$name= $_SESSION['rollno'];

$q = "update students set score = $result where strollno = '$name' ";

mysqli_query($con,$q);


 ?>

</div>

</body>
</html>
