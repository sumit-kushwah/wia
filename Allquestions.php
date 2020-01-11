<!DOCTYPE html>
<html>
<head>
	<title>All questions</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">
	<div class="text-center border card shadow-light " >
		<h2>Your quiz summary</h2>		
	</div>
	<div>
		<h4>Total number of questions: <?php echo $_POST['numofque']; ?></h4>
	</div>
	<div class="text-center">
		<h3>Questions summmary</h3>
	</div>

	<?php 

			for ($i=0; $i < $num; $i++) { 
				# code...
				?>
				
				<?php
			}

	 ?>

</div>

</body>
</html>