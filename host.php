<?php 

session_start();
// echo $_SESSION['quizstatus'];

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>host your quiz</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body onload="dbsize();">
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
	<div class="container border mt-4 p-4 shadow card bg-light">
		<div class="ml-4 mt-3 mr-5 col-5 align-top">
	<h2 >HOST YOUR QUIZ</h2>
	<hr>
	<br>
	<form action = "make_questions.php" method= "post" >

  <div class="form-group ">
    <label for="qid">Enter your Quiz name</label>
    <input type="text" class="form-control" id="qid" name="qname" required="">
  </div>
  <div class="form-group">
    <label for="quizcode">Enter quiz code </label>
    <input type="text" class="form-control" pattern=".{4,8}" title="length must be between 4 to 9 character" id="quizcode" name="tqname" required="please enter some quiz code" >
  
    <?php 

      if(!isset($_SESSION['quizstatus']))
      {
        ?>
        <small class=" form-text text-muted">Quiz code must be unique.</small><?php 
      }
      else if($_SESSION['quizstatus']==1)
      {
        ?>

        <small class=" form-text text-warning ">This quiz code already exist.</small>
        <?php 
        unset($_SESSION['quizstatus']);
      }

     ?>

  </div>

  <div class="form-group ">
    <label for="numofquestions">Enter no of questions in the quiz</label>
    <input type="number" class="form-control" id="numofquestions" name="numofque" required="">
  </div>

  <div class="form-group ">
    <label for="numofoptions">Enter no of options in one question</label>
    <input type="number" class="form-control" id="numofoptions" name="numofopt" required="">
  </div>

  <div class="form-group ">
    <label for="timelimit">Enter time limit of quiz (in minutes)</label>
    <input type="number" class="form-control" id="timelimit" name="timelimit">
  </div>

 <div >
 	 <button type="submit" class="btn btn-primary text-center">Next</button>
 </div>

 </form>


<?php 




 ?>

</div>
	</div>

  <script type="text/javascript">
    
    function dbsize(){
      <?php 
      if($_SESSION['dbsize']==1)
      {
        ?>
        alert("database size is fulll , do message to admin for help!!");
        <?php
      }

       ?>
    }
  </script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>