<?php 

session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>sign up</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body onload="showalert()">

<div class="container text-center border  mt-4 card shadow bg-light rounded-pill">
    
    <nav class="navbar ">
  <a class="navbar-brand " href="index.php">
    <img src="Vexels-Office-Bulb.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    WIA QUIZ APPLICATION
  </a>
</nav>

  </div>

<div class="container border mt-4 card shadow bg-light ">
	<h1 class="text-center mt-3">USER REGISTRATION</h1>

	<form  action="regvalidation.php" method= "post">
		<div class="form-group">
			<label for="name">Enter your username</label>
			<input type="text" name="username"  class="form-control" id="name" pattern=".{5,}"  title="username must contains atleast 5 character" required="" placeholder="ex:123fgh">
		</div>

		<div class="form-group">
			<label for="password">Enter your password</label>
			<input type="password" name="psw" pattern=".{5,}" title="password must contains atleast 5 character" class="form-control" id="password" required="">
		</div>
		<div>
		<input type="checkbox" class="ml-1" onclick="showpass()"><span class="ml-1">show password</span>
		</div>
		<br>
		<div class="form-group">
			<label for="email">Enter your email(optional)</label>
			<input type="email" name="email" class="form-control" id="email" >
		</div>

<div class="text-center mb-4">
	<input type="submit" name="submit" class=" btn btn-primary" value="Signup">
</div>
	
	<script type="text/javascript">
		
		function showpass() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


	</script>	

	<script type="text/javascript">
		function showalert(){

	<?php 

		if($_SESSION['regstatus']==1)
		{
			?>
			alert("This username is not available!!");<?php
		}
	 ?>

}
	</script>

	</form>
</div>
</body>
</html>