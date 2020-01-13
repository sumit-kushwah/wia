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



$opt =$_POST['options'];
$ques =$_POST['questions'];
$cans = $_POST['correctans'];

$quizname= $_SESSION['quizcode'];

$qans = $quizname."ans";



for($i = 0 ; $i < sizeof($ques); $i++) {

	$optcal = 2*$i + $cans[$i];

	$q= "insert into $quizname (qtext , correctans) values ('$ques[$i]' , '$optcal')  ";

	$res = mysqli_query($con, $q);
	
}

echo sizeof($opt);
echo sizeof($ques);

for ($i=0; $i < sizeof($opt); $i++) { 
	# code...
	$temp = (int)(($i)/sizeof($ques) ) +1;
	
	echo $temp;
	$q= "insert into $qans (cans , qid) values ('$opt[$i]' , $temp)  ";
		$res = mysqli_query($con, $q);
}




 ?>