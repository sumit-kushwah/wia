<?php 

session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>sign up</title>
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