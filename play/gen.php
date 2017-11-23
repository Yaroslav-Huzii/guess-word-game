<!DOCTYPE html>
<html>
<head>
	<title>Guessing Game - Results</title>
	<style type="text/css">
	.gen {
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		-webkit-transform: translate(-50%, -50%);
	}		
	</style>
</head>
<body>
<div class="gen">

<?php

$rand = rand(1, 5);

$guess = @$_POST['guess'];
$submit = @$_POST['submit'];

if(isset($submit)){

	if ($guess == NULL) {
		header("location: index.php");
		exit();
	}
if ($guess != $rand) {
	echo "Your guess is incorrect!<br/>The correct answer is " . $rand . "!<br/><a href='index.php'>Try again?</a>";
} else {
	echo "You guessed correctly!<br/><a href='index.php'>Play again?</a>";
}
} else {
	header("location: index.php");
	exit();
}

?>

</div>
</body>
</html>