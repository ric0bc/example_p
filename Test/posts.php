<?php
	include 'header.php';
	include 'dbhandler.php';
?>
	<div class="container">
	<h1>Blog posts</h1>
		<div class="slider">
			<div>
				<a href="#" class="right-arrow"></a>
				<a href="#" class="left-arrow"><</a>
				<ul>
					<li><img src="img/spiderweb.jpg"></li>
					<li><img src="img/hearthand.jpg"></li>
					<li><img src="img/woman-camera.jpg"></li>
				</ul>
			</div>
		</div>
		<div class="card-wrapper">
			<?php
			
				$sql = "SELECT * FROM posts INNER JOIN user WHERE posts.uid=user.user_id ORDER BY date DESC";
				$result = $conn->query($sql);
				if ($result->num_rows > 0){
					while ($row = $result->fetch_assoc()){
						$string = substr($row['content'], 0, 100).'...';
						$date = date_create($row['date']);
						echo "<div class='card'>
								<div class='card-img'>
									<img src='uploads/" . ($row['img']) . "'/>
								</div>
								<div class='card-content'>
									<p class='card-meta'>" . $row['uid'] . " " . date_format($date, 'jS F Y') . "</p>
									<div class='card-title'>
										<h3>" . $row['subject'] . "</h3>
									</div>
									<p class='card-text'>" . $string . "</p>
								</div>
								<div class='card-btn'>
									<button class='btn-primary'><a href='detail.php?detailID=" . $row['id'] . "'>read</a></button>
								</div>
							</div>";
					}
				} else {
					echo "No Posts";
				}
				
			?>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>