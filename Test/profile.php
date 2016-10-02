<?php
	include 'header.php';
	include 'dbhandler.php';
?>

<?php
	if (isset($_SESSION['id'])){
		
		$userid = $_SESSION['id'];
		$sql = "SELECT * FROM posts INNER JOIN user ON posts.uid=user.user_id ORDER BY date DESC";
		$result = $conn->query($sql);

		print_r($result->num_rows);
		
		echo "<a href='create.php'><button class='btn-primary'>Create Post</button></a>";
		
		if ($result->num_rows > 0){
			while($rows = $result->fetch_assoc()){
				$string = substr($rows['content'], 0, 355).'...';
				echo "<div class='posts-object'>
						<div class='posts-img'>
							<img src='uploads/" . ($rows['img']) . "'/>
						</div>
						<div class='posts-content'>
							<div class='posts-title'>
								<h3>" . $rows['subject'] . "</h3>
							</div>
							<p>" . $string . "</p>
							<div class='posts-btn'>
								<button class='btn-primary'><a href='update.php?updateID=" . $rows['id'] . "'>Edit</a></button>
								<button class='btn-primary'><a href='includes/delete.php?deleteID=" . $rows['id'] . "'>Delete</a></button>
							</div>
						</div>
					</div>";
			}
		} else {
			echo "No Posts";
		}
	} else {
		echo "You have to log in";
	}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>