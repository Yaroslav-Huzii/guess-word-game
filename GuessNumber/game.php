<?php

$user_num =$_GET['number'];

$random = rand(0,9);
	if($user_num>9 || $user_num<0){
		echo "Please , choose a number between 0-9";
	}
	else
	if($user_num == $random){
		echo "you win";
	}else{
		echo "your number is: ".$user_num."<br>";
		if ($user_num>$random)  echo "your number is > random num(".$random.")";
		else  echo "your num is < random(".$random.")";
	}
echo "<br>";

?>
<a href="/">
   <button>New game</button>
</a>



