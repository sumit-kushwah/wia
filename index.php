<?php 
		
		session_start();
		session_destroy();
	
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
</head>
<body>
	<div class="container border mt-4 card shadow">
	
<nav class="navbar navbar-expand-lg  navbar-light bg-none">
  <a class="navbar-brand" href="#">
    <img src="Vexels-Office-Bulb.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    WIA
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="host_quiz_ask.php">Host quiz <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active " id="parti">
        <a class="nav-link" href="#" onclick="makebold();">Participate</a>
      </li>
       <li class="nav-item active ">
        <a class="nav-link" href="Aboutus.php">About us</a>
      </li>
       <li class="nav-item active ">
        <a class="nav-link" href="faq.php">FAQ</a>
      </li>
       <li class="nav-item active ">
        <a class="nav-link" href="#">Feedback</a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link" href="delete_your_quiz.php">Delete quiz</a>
      </li>

     
    </ul>
    
  </div>

  </nav>
<div class="ml-4 mt-3 mr-5 col-5 align-top m-2 " >
	<h2 id="shake">Login for participation</h2>
	<form action="loginvalidation.php" method = "post">
  <div class="form-group ">
    <label for="rollnumber">Roll number</label>
    <input type="text" class="form-control" id="rollnumber" name="rollno">
  </div>
  <div class="form-group">
    <label for="quizcode">Quiz code</label>
    <input type="text" class="form-control" id="quizcode" name="quizcode">
  </div>
 <div >
 	 <button type="submit" class="btn btn-primary text-center">Login</button>
 	 or 
 	 <a href="register.php" class="">sign up</a>
 </div>

  <div >
 	 
 </div>
 
</form>
</div>
<br>
<br>
<br>
<br>
	<nav class=" bottom text-center mb-4">
  <head>No rights reserved every byte is </head><a href="https://en.wikipedia.org/wiki/Open-source_license">open source</a>
</nav>




<script >
	var ran=document.getElementById('shake');
	function makebold() {
		// body...
		ran.innerHTML=ran.innerHTML.bold();
	}
</script>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	</div>
</body>
</html>