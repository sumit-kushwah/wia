
<?php 
	include('config.php');
	session_start();

	
$con= mysqli_connect('us-cdbr-iron-east-05.cleardb.net','bf807555e0b567','23a6fcff');

mysqli_select_db($con,'heroku_77d113432e16e60');

	if($con)
 {
 	echo "connection succesful";
 }
 else
 {
 	echo "connection failed";
 }



$tname= $_POST['tname'];
$tqname =$_POST['tqname'];
$tnumofque = $_POST['numofque'];
$tnumofopt =$_POST['numofopt'];
$timelimit =$_POST['timelimit'];

$_SESSION['quizcode']=$tqname;

$q1 = "select * from teacher where tcodename = '$tqname'";




$res = mysqli_query($con,$q1);

$nor = mysqli_num_rows($res);

if($nor <1){


$q2 = " insert into teacher (tname, tcodename ,tquenum , toptnum , ttimelimit ) values ('$tname','$tqname','$tnumofque','$tnumofopt','$timelimit')";
$res2 = mysqli_query($con,$q2);

echo "saved into database";
$q2 = " create table $tqname ( qid int auto_increment primary key , qtext text , correctans varchar(255) ); ";

$tqans = $tqname."ans";

echo "$tqans";

$q3 = "create table $tqans (ansid int auto_increment primary key , cans varchar(255) , qid int ) ;";

$res3 = mysqli_query($con, $q2);

$res4 = mysqli_query($con , $q3);

echo ."<br>".$res3." ".$res4;

?>

<!DOCTYPE html>
<html>
<head>
	<title>make your questions for quizcode </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
</head>
<body>
<div class="container mt-3">
<div class="text-center border">
	<h2 >MAKE QUESTIONS FOR QUIZ CODE <?php echo $tqname; ?></h2>
</div>
<br>
<br>	
<div class="">
	<h3>NOTE: Please write all three questions with options</h3>
</div>
<?php 
	
	$num = $_POST['numofque'];
	$numopt=$_POST['numofopt'];
		

 ?>

<form action="quesaveintodb.php" method= "post">

	<?php  

			for ($i=0; $i < $num ; $i++) { 
				# code...
				?> 

				<div class="card-header form-group">
					<label><?php echo "Q.".($i+1); ?>.</label>
					

				<input type="textarea" class="form-control" name="questions[]"  required="">
				</div>


				<?php 

						for ($s=0; $s < $numopt; $s++) { 
							# code...
							?>

							<div class="card-body form-group">
							<?php echo ($s+1); ?>
							<input type="text" class="form-control" name="options[]" required="">

						</div>
							<?php
						}

				 ?>
				 <div class="ml-4 form-group">
				 	<label for="correctans">Correct Answer :</label>
							<br>

							<input type="text" class="form-control" id="correctans" name="correctans[]" required="" placeholder="enter option number">
				 </div>



				<?php 
			}
	 ?>

<input type="submit" class=" mb-4 ml-4 btn btn-primary btn-lg btn-block" value="save your questions in database"></input>

	
	
</form>

</div>
</body>
</html>


<?php

}
else {
	# code...
	echo "this quiz code already exits";
}
 ?>


