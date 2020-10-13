
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

$q1= " SELECT sum(  ROUND(((data_length + index_length) / 1024 / 1024), 2)) AS size FROM information_schema.TABLES WHERE table_schema = '$db_name' ORDER BY (data_length + index_length) DESC; ";

$res1=mysqli_query($con,$q1);

$ss= mysqli_fetch_array($res1);

// echo $ss['size'];

if ($ss['size']>4.5) {
	# code...
	$_SESSION['dbsize']=1;
	header('location:host.php');

}


$qname =$_POST['qname'];
$tqname =$_POST['tqname'];
$tnumofque = $_POST['numofque'];
$tnumofopt =$_POST['numofopt'];
$timelimit =$_POST['timelimit'];

$_SESSION['qname']=$qname;
$_SESSION['tqname']=$tqname;
$_SESSION['numofque']=$tnumofque;
$_SESSION['numofopt']=$tnumofopt;
$_SESSION['timelimit']=$timelimit;




$q = "select * from quizs where qcode = '$tqname'";
$res = mysqli_query($con,$q);

$nor = mysqli_num_rows($res);

if($nor>=1){
	$_SESSION['quizstatus']=1;
	header('location:host.php');
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Make questions</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


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


	<style type="text/css">
		.float-left{
    float: left;
}
	</style>
</head>
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



<div class="container mt-3 border rounded">
<div class="ml-4 mt-4">
	<h2 >Your quiz code : <?php echo $tqname; ?></h2>
	<hr>
</div>	
<div class="ml-4">
	<p>Please enter details of all <?php echo "$tnumofque"; ?> questions.</p>
</div>

<form action="quesaveintodb.php" method= "post">

	<?php  

			for ($i=1; $i <= $tnumofque ; $i++) { 
				# code...
				?> 

				<div class="card shadow-sm p-3 mb-5 bg-light rounded ">

					
					
					<div class="form-group  row rounded">
						<h3><?php echo "Q"."$i."; ?></h3>
						<input type="text"  class="col-11 form-control" name="questions[<?php echo $i; ?>]"  required="">
					</div>

				
				


				<?php 

						for ($s=1; $s <= $tnumofopt; $s++) { 
							# code...
							?>
							<div class="card-body form-inline ">
							<h5>opt <?php echo ($s); ?>:</h5>
							<input type="text" class=" col-4 form-control" name="options[]" required="">

						</div>
							<?php
						}

				 ?>
				 <div class=" form-inline card-body">
				 	<h5 for="correctans">Copt:</h5>
							<br>

							<input type="number" min="1" max="<?php echo $tnumofopt; ?>" class="form-control col-4" id="correctans" name="correctans[<?php echo $i; ?>]" placeholder="enter correct option number" required="">
				 </div>


</div>
				<?php 

			}
	 ?>

<input type="submit" class=" mb-4 ml-4 btn btn-primary btn-lg btn-block" value="complete your quiz"></input>

	
	
</form>

</div>
</body>
</html>

