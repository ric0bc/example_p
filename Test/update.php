<?php
	include 'header.php';
	include 'dbhandler.php';

	$post_id = $_GET['updateID'];

	$sql = "SELECT * FROM posts WHERE id=$post_id";
	$result = $conn->query($sql);
	
	while($row = $result->fetch_assoc()){
		echo "<form id='update-form' action='includes/update.inc.php?updateID=" . $row['id'] . "' method='POST' enctype='multipart/form-data'>
				<fieldset>
					<legend>Edit Post</legend>
					<label for='subject'>Title</label>
					<input type='text' name='subject' value='" . $row['subject'] . "'><br>
					<label for='img'>Image</label>
					<input type='file' name='img'><br>
					<label for='content'>Textarea</label>
					<textarea name='content' rows='25' cols='50'>" . $row['content'] . "</textarea>
					<button type='submit' class='btn-primary'>Save</button>
				</fieldset>
			</form>";
	}	
?>
	



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>