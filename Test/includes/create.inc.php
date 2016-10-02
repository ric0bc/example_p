<?php
session_start();
include '../dbhandler.php';

$subject = $_POST['subject'];
$content = $_POST['content'];
$sessionId = $_SESSION['id'];
$date = date("Y-m-d H:i:s");

$tmp_name = $_FILES['img']['tmp_name'];
$uploads_dir = '../uploads/';
$uploadFile = $uploads_dir . basename($_FILES['img']['name']);
$img_name = basename($_FILES['img']['name']);

if(move_uploaded_file($tmp_name, $uploadFile)){
        echo "Image uploaded";
        echo "$img_name";
} else {
        echo "File was not uploaded";
}

$sql = "INSERT INTO posts (subject, content, date, uid, img) VALUES ('$subject', '$content', '$date', '$sessionId', '$img_name')";

if ($conn->query($sql) === TRUE){
	header('Location: ../profile.php');
} else {
	echo "Error: " . $conn->error;
}