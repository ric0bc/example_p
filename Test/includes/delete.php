<?php
session_start();
include '../dbhandler.php';

$id = $_GET['deleteID'];
$sql_img = "SELECT img FROM posts WHERE id=$id";
$result = $conn->query($sql_img);
$row = $result->fetch_assoc();
$sql = "DELETE FROM posts WHERE id=$id";
$img = $row['img'];

if(unlink('../uploads/' . $img)){
	echo "successful unlinked";
} else {
	echo "cannot unlink";
}

if ($conn->query($sql) === TRUE){
	header('Location: ../profile.php');
} else {
	echo "Error: " . $conn->error;
}