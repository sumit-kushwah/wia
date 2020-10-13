<?php 
	include 'config.php';
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


 $q1 = "select * from teacher where quiz_status=0 ";

 $res = mysqli_query($con,$q1);

$show = mysqli_fetch_array($res);

$nor = mysqli_num_rows($res);
// echo $nor;
for ($i=0; $i <$nor ; $i++) { 
	# code...
	echo $show['tcodename']."<br>";
}

 ?>