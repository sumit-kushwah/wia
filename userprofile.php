<?php 
		
    include 'config.php';
		session_start();

    $con= mysqli_connect("$db_host","$db_user","$db_pass");

    mysqli_select_db($con,"$db_name");
     $username=$_SESSION['username'];
    $q= "select * from quizs where  quser= '$username' order by qdateadded desc";
    
    $q3="select * from userandquiz where username= '$username' order by dateparticipated desc";

    $res = mysqli_query($con,$q);
    
     $res3= mysqli_query($con,$q3);

    
    $numofquizs=mysqli_num_rows($res);
    $numofpart= mysqli_num_rows($res3);

    // echo $_SESSION['regstatus'];


 ?>
<!DOCTYPE html>
<html>
<head >
	<title>wia userprofile</title>
  <link rel="stylesheet" type="text/css" href="popup.css">
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

</head>
<body onload="">
  <div class="container text-center border  mt-4 card shadow bg-light rounded-pill">
    
    <nav class="navbar ">
       <a class="navbar-brand " href="index.php">
    <img src="Vexels-Office-Bulb.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    WIA QUIZ APPLICATION
  </a>
      <h4 class="text-secondary">Username: <?php echo $_SESSION['username']; ?></h4>
      <a href="logout.php"><button class="btn-primary btn" type="button">Logout</button></a>

</nav>
</div>


	<div class="container border mt-4 card shadow bg-light rounded">
	

<div class="ml-4 mt-3 mr-5 text-center align-top m-2 " >
	<h3 class="text-secondary">LIST OF HOSTED QUIZZES</h3>
  <hr>
  <p> Total hosted quiz : <?php echo "$numofquizs"; ?></p>
 </div>


 <?php 

?>
<div class="row border ml-4 mr-4 rounded bg-info text-dark">

  <div class="col-sm text-dark">
    <h5 class=" mt-2">QUIZ_CODE</h5>
    </div>
    <div class="col-sm">
       <h5 class=" mt-2">QUIZ_STATUS</h5>
    </div>
    <div class="col-sm">
       <h5 class=" mt-2">DATE_ADDED</h5>
    </div>
    <div class="col-sm mt-1">
    <h5 class=" mt-2">TOGGLE_STAT</h5>
    </div>
    <div class="col-sm mt-1">
    <h5 class=" mt-2">QUIZ_REPORT</h5>
    </div>
    <div class="col-sm mt-1">
    <h5 class="mt-2">DELETE_LINK</h5>
    </div>

  </div>

<?php
  while( $rows = mysqli_fetch_array($res) )
  {
    ?>
   
    <div class="row border ml-4 mb-2 rounded">
    <div class="col-sm">
    <h3 class="ml-4 mt-2 text-success"><?php echo $rows['qcode']; ?></h3>
    </div>
    <div class="col-sm">
    <p class="ml-4 mt-2"><?php if ($rows['qstatus']==0) {
      echo "Deactivated";
    }
    else{
      echo "Activated";
    } ?></p>
    </div>
     <div class="col-sm">
     <p class="ml-4 mt-2"><?php echo $rows['qdateadded']; ?></p>
    </div>
    <div class="col-sm mt-1">
     <form action="toggle.php" method= "post">
           <button type="submit" class="btn btn-primary"
           value="<?php echo $rows['qcode'] ?>" name="quizcode">Toggle</button>
           
         </form>
    </div>
    <div class="col-sm mt-1">
        <form action="report.php" method= "post">
           <button type="submit" class="btn btn-primary"
           value="<?php echo $rows['qcode'] ?>" name="quizcode">Report</button>
           
         </form>
    </div>
    <div class="col-sm mt-1">
        <form action="delete.php" method= "post">
           <button type="submit" class="btn btn-primary"
           value="<?php echo $rows['qcode'] ?>" name="quizcode">Delete</button>
           
         </form>
    </div>
  
    

     

      
    </div>
  
    <?php
  }

  ?>

 
</div>




<div class="container border mt-4 card shadow bg-light rounded">
  

<div class="ml-4 mt-3 mr-5 text-center align-top m-2 " >
  <h3 class="text-secondary">LIST OF PARTICIPATED QUIZESS</h3>
  <hr>
  <p> Total participated quizzes : <?php echo "$numofpart"; ?></p>
 </div>


 <?php 

?>
<div class="row border ml-4 mr-4 rounded bg-info text-dark">

  <div class="col-sm text-dark">
    <h5 class=" mt-2">QUIZ_CODE</h5>
    </div>
    <div class="col-sm">
       <h5 class=" mt-2">ATTEMPT_NO</h5>
    </div>
    <div class="col-sm">
       <h5 class=" mt-2">DATE_PARTICIPATED</h5>
    </div>
    <div class="col-sm mt-1">
    <h5 class=" mt-2">SCORE</h5>
    </div>
  </div>

<?php
  while( $rows = mysqli_fetch_array($res3) )
  {
    

    ?>
   
    <div class="row border ml-4 mb-2 rounded">
    <div class="col-sm">
    <h3 class="ml-4 mt-2 text-success"><?php echo $rows['qcode']; ?></h3>
    </div>
  <div class="col-sm">
     <p class="ml-4 mt-2"><?php echo $rows['attempt']; ?></p>
    </div>

     <div class="col-sm">
     <p class="ml-4 mt-2"><?php echo $rows['dateparticipated']; ?></p>
    </div>
    
    <div class="col-sm">
     <p class="ml-4 mt-2">(<?php echo $rows['score']; ?>/<?php echo $rows['numoque']; ?>)</p>
    </div>

    </div>
  
    <?php
  }

  ?>

 
</div>
<br>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	</div>
</body>
</html>