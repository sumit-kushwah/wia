

<!DOCTYPE html>
<html>
<head>
	<title>host your quiz</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container border mt-4 p-4 shadow card">
		<div class="ml-4 mt-3 mr-5 col-5 align-top">
	<h2 >HOST YOUR QUIZ</h2>
	<hr>
	<br>
	<form action = "make_questions.php" method= "post" >

  <div class="form-group ">
    <label for="hoster">Enter your name</label>
    <input type="text" class="form-control" id="hoster" name="tname" required="">
  </div>
  <div class="form-group">
    <label for="quizcode">Enter quiz code </label>
    <input type="text" class="form-control" id="quizcode" name="tqname" required="please enter some quiz code" >
  <small class=" form-text text-muted">Quiz code must be unique.</small>
  </div>

  <div class="form-group ">
    <label for="numofquestions">Enter no of questions in the quiz.</label>
    <input type="text" class="form-control" id="numofquestions" name="numofque" required="">
  </div>

  <div class="form-group ">
    <label for="numofoptions">Enter no of options in one question.</label>
    <input type="text" class="form-control" id="numofoptions" name="numofopt" required="">
  </div>

  <div class="form-group ">
    <label for="timelimit">Enter time limit of quiz (in minutes).</label>
    <input type="text" class="form-control" id="timelimit" name="timelimit">
  </div>

 <div >
 	 <button type="submit" class="btn btn-primary text-center">Next</button>
 </div>

 </form>


<?php 




 ?>

</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>