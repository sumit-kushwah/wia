<?php 
		
    include 'config.php';
		session_start();

    $con= mysqli_connect("$db_host","$db_user","$db_pass");

    mysqli_select_db($con,"$db_name");



    $q= "select * from quizs where qstatus=1 order by qdateadded desc";



    $res = mysqli_query($con,$q);

    $numofquizs= mysqli_num_rows($res);

    // echo $_SESSION['regstatus'];


 ?>
<!DOCTYPE html>
<html>
<head >
	<title>wia home page</title>
  <link rel="stylesheet" type="text/css" href="popup.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body onload="registration();">
  <div class="container text-center border  mt-4 card shadow bg-light rounded-pill">
    
    <nav class="navbar ">
  <a class="navbar-brand " href="index.php">
    <img src="Vexels-Office-Bulb.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    WIA QUIZ APPLICATION
  </a>


  <?php
    if(!isset($_SESSION['username'])){
      ?>
    <form action="loginvalidation.php" method= "post" class= "form-body">
      <input type="text" class= "rounded-lg bg-light" placeholder="Username" name="username" required>
      <input type="password" class= "rounded-lg bg-light" placeholder="Password" name="psw" required>
      <button type="submit" class=" ml-2 btn btn-primary">Login</button> 
    </form>
    <span> <a href="register.php"><button class="btn btn-primary">Register</button></a></span>
    <?php
    }
    else{
      ?>

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
    }
  ?>
   

</nav>
</div>
	<div class="container border mt-4 card shadow bg-light rounded">
	
<nav class="navbar navbar-expand-lg  navbar-light bg-none ">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <?php 
        if(!isset($_SESSION['username'])){
      ?>
  
      <a class="nav-link text-primary ml-4" href="#" onclick="showalert();">HostQuiz<span class="sr-only">(current)</span></a>   

    <?php
    }
    else{
      ?>

      <a class="nav-link text-primary ml-4" href="host.php" >HostQuiz<span class="sr-only">(current)</span></a>


      <?php
    }
  ?>


      </li>
        <a class="nav-link" href="#" disabled="" >Admin</a>
      </li>
    </ul> 
  </div>
  </nav>
  <hr>
<div class="ml-4 mt-3 mr-5 col-5 align-top m-2 " >
	<h2 id="shake">Quizzes status</h2>
  <hr>
  <p> Activated quizzes : <?php echo "$numofquizs"; ?></p>
 </div>


 <?php 

?>
<table class="row border ml-4 mr-4 rounded bg-info text-dark form-inline">

  <th class="">
    <h3 class="ml-4 mt-2">QUIZ_CODE</h3>
    </th>
    <th class="">
       <h3 class="ml-4 mt-2">AUTHOR</h3>
    </th>
    <th class="">
       <h3 class="ml-4 mt-2">DATE_ADDED</h3>
    </th>
    <th class=" mt-1">
    <th class="ml-5 mt-2">LINK</h3>
    </div>

  </table>
<hr>

<?php
  while( $rows = mysqli_fetch_array($res) )
  {
    ?>
   
    <div class="row border ml-4 mb-2 rounded">
    <div class="col-sm">
    <h3 class="ml-4 mt-2 text-success"><?php echo $rows['qcode']; ?></h3>
    </div>
    <div class="col-sm">
       <p class="ml-4 mt-2 text-dark"><?php echo $rows['quser']; ?></p>
    </div>
    <div class="col-sm">
       <p class="ml-4 mt-2"><?php echo $rows['qdateadded']; ?></p>
    </div>
    <div class="col-sm mt-1">
     <?php 

      if(!isset($_SESSION['username'])){
      ?>
        <span> <a href="#"><button id="pdis" title="please login first for participate" class="btn btn-primary" disabled="">Participate</button></a></span>
    <?php
    }
    else{
      ?>

         <form action="showquestions.php" method= "post">
           <button type="submit" class="btn btn-primary"
           value="<?php echo $rows['qcode'] ?>" name="quizcode">Participate</button>
           
         </form>
       

      <?php
    }
  ?>

      
    </div>
  </div>
    <?php
  }

  ?>

 
</div>


<br>
<br>
<br>
<br>
	<nav class=" bottom text-center mb-4">
  <head>No rights reserved every byte is </head><a href="https://en.wikipedia.org/wiki/Open-source_license">open source</a>
</nav>

<script type="text/javascript">
  
  function showalert(){

    alert ("Kindly login  first then host quiz!!");

  }
</script>


<script type="text/javascript">
 
 function registration() {
   // body...
    <?php 

    if($_SESSION['regstatus']==2)
    {
      ?>
      alert("sign up successful now you can login!!");<?php
      unset($_SESSION['regstatus']);
    }
   ?>
   }
</script>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	</div>
</body>
</html>