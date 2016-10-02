<?php
	include 'header.php';
?>

<form id="create-form" action="includes/create.inc.php" method="POST" enctype="multipart/form-data">
	<fieldset>
		<legend>Create Post</legend>
		<label for="subject">Title</label>
		<input type="text" name="subject"><br>
		<label for="img">Image</label>
		<input type="file" name="img"><br>
		<label for="content">Textarea</label>
		<textarea name="content" rows="25" cols="50"></textarea>
		<button type="submit" class="btn-primary">Save</button>
	</fieldset>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>