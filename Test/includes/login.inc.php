<?php
session_start();
include '../dbhandler.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM user WHERE uid='$uid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$hashPwd = $row['pwd'];
$hash = password_verify($pwd, $hashPwd);

if ($hash == 0) {
	header("Location: ../index.php?error=username");
	exit();
} else {

	$sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$hashPwd'";
	$result = $conn->query($sql);

	if (!$row = $result->fetch_assoc()){
		echo "Your Username or Password is incorrect!";
	} else {
		$_SESSION['id'] = $row['user_id'];
	}

	header('Location: ../profile.php');
}

