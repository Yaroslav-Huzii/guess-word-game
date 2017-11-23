<!DOCTYPE html>
<html>
<head>
	<title>Guessing Game</title>
	<style type="text/css">
		.header{
			position: absolute;
			left: 50%;
			top: 44%;
			transform: translate(-50%, -44%);
			-webkit-transform: translate(-50%, -44%);
		}
		.guess{
			position: absolute;
			left: 50%;
			top: 56%;
			transform: translate(-50%, -56%);
			-webkit-transform: translate(-50%, -56%);
		}
	</style>
</head>
<body>

<div class="header">
	<h1>Guessing Game</h1><br/>
</div>
<div class="guess">
	<form action="gen.php" method="POST">
		<input type="number" name="guess" min="1" max="5" style="width: 100px;" placeholder="Guess (1-5)"/><br><br>
		<input type="submit" name="submit" style="position: absolute; left: 25%;" value="Guess" />
	</form>
</div>

</body>
</html>