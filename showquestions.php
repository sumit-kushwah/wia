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



$quizname=$_POST['quizcode'];
$_SESSION['qcode']=$quizname;

$qq= "select * from quizs where qcode='$quizname' ";

$query = mysqli_query($con, $qq);

$rr = mysqli_fetch_array($query);
$timelimit = $rr['qtimelimit'];

$_SESSION['refreshstatus']=1;
 ?>


 <!DOCTYPE html>
<html>
<head>
	<title>
		participate in quiz
	</title>
	<style type="text/css">

	</style>
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


	<style type="text/css">
		.upstick{
			position: fixed;
  			left: 4px;
 			 top: 20px;
  			z-index: 1000;
		}
	</style>
<script>
var timelimit = <?php echo $timelimit; ?>;
var countdown = timelimit * 60 * 1000;
var timerId = setInterval(function(){
  countdown -= 1000;
  var min = Math.floor(countdown / (60 * 1000));
  //var sec = Math.floor(countdown - (min * 60 * 1000));  // wrong
  var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);  //correct

  if (countdown <= 0) {
     alert("quiz finished submit your answers");
     clearInterval(timerId);
     //doSomething();
  } else {
     document.getElementById('timer').innerHTML=min+":"+sec;
  }

}, 1000); //1000ms. = 1sec

</script>
</head>
<body >
	

		<div class="container border rounded-pill shadow p-3 mb-5 bg-success rounded " style="margin-top:30px " >
			
			<h1 class="text-center text-dark">welcome  <?php echo $_SESSION['username']; ?></h1>

		</div>
<div class="container border rounded-lg bg-light">
		
	<!-- 	
		<div class=" text-center shadow upstick"  >
			<h3 style="padding: 20px" > Time Left: <span id='timer'></span></h3>

			
		</div> -->
	
	<?php 

		
		$qans  = $quizname."ans";
		$q=" select * from $quizname";

	$query = mysqli_query($con,$q);
		$num= mysqli_num_rows($query);

			
	 ?>

	 <div class="shadow text-center" >
	 	
			<h3 style="padding: 20px" > Time Left: <span id='timer'></span></h3>

			
		
	 </div>

<form action="checkanswers.php" method="post">

	<?php 

	


	
$i=1;
	while ($rows = mysqli_fetch_array($query)) {
		?>

			<div class="card shadow-sm p-3 mb-5 bg-white rounded ">
				<h3 class="card-header"><?php echo "Q.".$rows['qid']." ".$rows['qtext']; ?></h3>

				<?php 

					$ss=(int)($i/10);
					$qy = " select * from $qans where qid= $i";

					$quer = mysqli_query($con,$qy);

	

							while ($row = mysqli_fetch_array($quer)) {
							?>

								<div class="card-body">
									<input type="radio" name="quizcheck[<?php echo $rows['qid'] ?>]" value="<?php echo $row['ansid'] ?>">

									<?php 

										echo $row['cans'];

									  ?>
								</div>

								<?php 
       							}
								?>
			</div>
			
	<?php 
	$i++;

       }
	?>	
	<br>
	
	<div class="text-center text-primary  " style="margin: 10px">
		<input type="submit" name="submit" value="submit your answers" class="btn btn-primary btn-lg btn-block shadow p-3 mb-5 bg">
	</div>

	

	
</form>
	

	</div>
</body>
</html>