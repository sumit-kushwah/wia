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


$opt =$_POST['options'];
$ques =$_POST['questions'];
$cans = $_POST['correctans'];


$qname=$_SESSION['qname'];
$tqname=$_SESSION['tqname'];
$tnumofque=$_SESSION['numofque'];
$tnumofopt=$_SESSION['numofopt'];

$timelimit=$_SESSION['timelimit'];
$username=$_SESSION['username'];
if ($timelimit<=0) {
	# code...
	$timelimit=0;
}

// echo "$tqname";

// save tables into dbsql_database

$q2="select * from quizs;";

// echo date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");

$q1 = "insert into quizs (qcode ,qname ,numofq,numofopt,quser,qtimelimit,qdateadded) values ('$tqname','$qname','$tnumofque','$tnumofopt','$username','$timelimit','$date'); ";
$res = mysqli_query($con,$q1);

// if(!$res)
// {
// 	echo mysqli_error($con);
// }
// echo "$res2";

// echo "saved into database";
$q2 = " create table $tqname ( qid int  primary key , qtext text not null , correctans int not null ); ";

$tqans = $tqname."ans";

// echo "$tqans";

$q3 = "create table $tqans (ansid int primary key, cans varchar(255) , qid int not null ) ;";


$res2 = mysqli_query($con, $q2);

$res3 = mysqli_query($con , $q3);





for($i = 1 ; $i <= sizeof($ques); $i++) {

	$q= "insert into $tqname (qid , qtext , correctans) values ('$i','$ques[$i]','$cans[$i]')  ;";
	$res = mysqli_query($con, $q);
	
}


$qid=1;
$numofopt= sizeof($opt)/sizeof($ques);
for ($i=1; $i <= sizeof($opt); $i++) { 
	# code...
	$s=$i-1;
	$q= " insert into $tqans (ansid ,cans , qid) values ($i,'$opt[$s]' , $qid); ";
		$res = mysqli_query($con, $q);

		if($i%$numofopt==0)
		{
			$qid++;
		}
}


// session_destroy();

// header('location:index.php');

 ?>



 <?php 

 	// session_start();	

  ?>




  <!DOCTYPE html>
  <html>
  <head>
  	<title>Quiz complete</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

  </head>
  <body>
  

  <div class="container text-center border  mt-4 card shadow bg-light rounded-pill">
    
    <nav class="navbar ">
  <a class="navbar-brand " href="index.php">
    <img src="Vexels-Office-Bulb.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    WIA QUIZ APPLICATION
  </a>

  <?php 
        if(isset($_SESSION['username'])){ ?>
       <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php echo $_SESSION['username']; ?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <a href="userprofile.php"><button class="dropdown-item" type="button">Profile</button></a>
    <a href="logout.php"><button class="dropdown-item" type="button">Logout</button></a>
  </div>
</div>
<?php
   } ?>
</nav>
  </div>

  <div class="container border mt-4  rounded-lg bg-light shadow">
  	<div class="ml-4 mt-3 mr-5  align-top m-2 " >
	<h2 id="shake">Your quiz <?php echo ($tqname); ?> created successfuly.</h2>
  <hr>

  
 </div>
  </div>

  		

	<?php 

	
		$q5=" select * from $tqname";

	$query = mysqli_query($con,$q5);
		$num= mysqli_num_rows($query);


	
$i=1;
	while ($rows = mysqli_fetch_array($query)) {
		?>

			<div class="card shadow-sm p-3 mb-5 bg-white rounded container ">
				<h3 class="card-header"><?php echo "Q.".$rows['qid']." ".$rows['qtext']; ?></h3>

				<?php 

					
					$qy = " select * from $tqans where qid= $i";

					$quer = mysqli_query($con,$qy);

							$c=1;

							while ($row = mysqli_fetch_array($quer)) {
							?>

								<div class="card-body">
									
									<div class="form-inline">
										<h6>Opt <?php  echo ($c);?> : <?php echo $row['cans']; ?></h6>
									</div>
									
								</div>

								<?php 
								$c++;
       							}
								?>
			
			
	<?php 


	$i++;

	?>
	<div class="form-inline card-body">
										<h6>CorrectOption : <?php echo $rows['correctans']; ?></h6>
									</div>
									</div>
	<?php

       }
	?>	
	<br>
	
	<div class="text-center text-primary  " style="margin: 30px">
		<a href="index.php"><button class="container btn btn-primary btn-lg shadow p-3 mb-5 bg btn-block"> Go to home page</button></a>
	</div>


	







  </body>
  </html>


  <?php 
   ?>