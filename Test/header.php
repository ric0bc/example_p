<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Blog 4 all</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<header>
	<nav>
		<ul>
			<li><a href="index.php">HOME</a></li>
			<li><a href="posts.php">POSTS</a></li>
			
			<?php
				if (isset($_SESSION['id'])){
					echo "<li><a href='profile.php'>PROFILE</a></li><form action='includes/logout.inc.php'>
						<button id='log-btn' type='submit'>Log out</button>
					</form>";
				} else {
					echo "<form action='includes/login.inc.php' method='POST'>
					<input class='input-secondary' type='text' name='uid' placeholder='Username'>
					<input class='input-secondary' type='password' name='pwd' placeholder='Password'>
					<button id='log-btn' type='submit'>Login</button>
					</form>
					<li><a href='signup.php'>SIGN UP</a></li>";
				}
				
			?>
		</ul>
	</nav>
</header>