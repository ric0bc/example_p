<?php
	include 'header.php';
?>

<?php

	$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	if(strpos($url, 'error=empty') !== false){
		echo "Some Field(s) are empty!";
	} elseif 
		(strpos($url, 'error=username') !== false){
		echo "Username already exists!";
	}

?>


<form id="signup" action="includes/signup.inc.php" method="POST">
	<h2>Sign up!</h2>
	<input class="input-primary" type="text" name="first" placeholder="Firstname">
	<input class="input-primary" type="text" name="last" placeholder="Lastname">
	<input class="input-primary" type="text" name="uid" placeholder="Username">
	<input class="input-primary" type="password" name="pwd" placeholder="Password">
	<div class="signup-btn"><button class="btn-primary" type="submit">Senden</button></div>
</form>

</body>
</html>