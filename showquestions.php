<?php 

session_start();

$con = mysqli_connect('localhost','root');

	if($con)
 {
 	echo "connection succesful";
 }
 else
 {
 	echo "connection failed";
 }

mysqli_select_db($con,'wia');

$quizname= $_SESSION['qcode'];

$qq= "select * from teacher where tcodename='$quizname' ";

$query = mysqli_query($con, $qq);

$rr= mysqli_fetch_array($query);
$timelimit = $rr['ttimelimit'];

 ?>


 <!DOCTYPE html>
<html>
<head>
	<title>
		home page
	</title>
	<style type="text/css">

	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
     alert("30 min!");
     clearInterval(timerId);
     //doSomething();
  } else {
     document.getElementById('timer').innerHTML=min+":"+sec;
  }

}, 1000); //1000ms. = 1sec

</script>
</head>
<body >
	<div class="container border rounded lg">

		<div class=" border rounded-pill shadow p-3 mb-5 bg-white rounded " style="margin-top:30px " >
			
			<h1 class="text-center text-primary">welcome  <?php echo $_SESSION['rollno']; ?></h1>

		</div>

		
		
		<div class=" text-center shadow upstick"  >
			<h3 style="padding: 20px" > Time Left: <span id='timer'></span></h3>

			
		</div>
	
	<?php 

		
		$qans  = $quizname."ans";
		$q=" select * from $quizname";

	$query = mysqli_query($con,$q);
		$num= mysqli_num_rows($query);

			
	 ?>

	 <div class="shadow" >
	 	<h3 style="padding: 20px">NOTE : you have <?php echo $timelimit; ?> minutes to solve all <?php echo "$num" ?> problems.</h3>
	 </div>

<form action="checkanswers.php" method="post">

	<?php 

	


	
$i=1;
	while ($rows = mysqli_fetch_array($query)) {
		?>

			<div class="card shadow-sm p-3 mb-5 bg-white rounded ">
				<h3 class="card-header"><?php echo "Q.".$rows['qid']." ".$rows['qtext']; ?></h3>

				<?php 

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
	
	<div class="text-center text-primary  " style="margin: 30px">
		<input type="submit" name="submit" value="submit your answers" class="btn btn-primary btn-lg shadow p-3 mb-5 bg">
	</div>

	

	
</form>
	

	</div>
</body>
</html>