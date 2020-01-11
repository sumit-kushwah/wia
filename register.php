

<!DOCTYPE html>
<html>
<head>
	<title>sign up</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container border mt-4 card shadow ">
	<h1 class="text-center mt-3">Sign up for quiz</h1>

	<form  action="regvalidation.php" method= "post">
		<div class="form-group">
			<label for="name">Enter your name</label>
			<input type="text" name="name"  class="form-control" id="name" required="">
		</div>

		<div class="form-group">
			<label for="rollno">Enter your rollnumber</label>
			<input type="text" name="rollno" class="form-control" id="rollno" required="">
		</div>
		<div class="form-group">
			<label for="quizcode">
					Enter your quiz-code
			</label>
			<input type="text" name="quizcode" class="form-control" id="quizcode" required="">
		</div>
		<div class="form-group">
			<label for="email">Enter your email</label>
			<input type="email" name="email" class="form-control" id="email" required="">
		</div>

<div class="text-center mb-4">
	<input type="submit" name="submit" class=" btn btn-primary" value="Signup">
</div>
		

	</form>
</div>
</body>
</html>