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



$opt =$_POST['options'];
$ques =$_POST['questions'];
$cans = $_POST['correctans'];

$quizname= $_SESSION['quizcode'];

$qans = $quizname."ans";

$numopt =sizeof($opt);
$numques =sizeof($ques);

echo "<br>";
echo "$numopt $numques <br>";

for($i = 0 ; $i < sizeof($ques); $i++) {

	$optcal = $numopt*$i + $cans[$i];

	echo "$ques[$i] $optcal"."<br>";
	$q= "insert into $quizname (qtext , correctans) values ('$ques[$i]' , '$optcal')  ";

	$res = mysqli_query($con, $q);
	
}



for ($i=0; $i < sizeof($opt); $i++) { 
	# code...
	$temp = (int)(($i)/$numopt) +1;
	
	echo $temp;
	$q= " insert into $qans (cans , qid) values ('$opt[$i]' , $temp)  ";
		$res = mysqli_query($con, $q);
}


// session_destroy();

// header('location:index.php');

 ?>