<?php
	include 'header.php';
	include 'dbhandler.php';
	
	$post_id = $_GET['detailID'];

	$sql = "SELECT * FROM posts INNER JOIN user ON posts.uid=user.user_id  WHERE id=$post_id ORDER BY date DESC";
	$result = $conn->query($sql);

	if ($row = $result->fetch_assoc()){
		$date = date_create($row['date']);

		echo "<div id='detail-wrapper'>
				<div class='posts-title'>
					<h3>" . $row['subject'] . "</h3>
				</div>
				<img src='uploads/" . $row['img'] . "'>
				<p class='card-meta'>" . $row['uid'] . " " . date_format($date, 'jS F Y') . "</p>
				<div class='detail-content'>
					<p>" . $row['content'] . "</p>
				</div>
			</div>";
	} else {
		echo "Post not found";
	}

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>