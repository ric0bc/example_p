<?php

session_start();

include '../dbhandler.php';

$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

if (empty($first)) {
	header("Location: ../signup.php?error=empty");
	exit();
}
if (empty($last)) {
	header("Location: ../signup.php?error=empty");
	exit();
}
if (empty($uid)) {
	header("Location: ../signup.php?error=empty");
	exit();
}
if (empty($pwd)) {
	header("Location: ../signup.php?error=empty");
	exit();
}
else {

	$sql = "SELECT uid FROM user WHERE uid='$uid'";
	$result = $conn->query($sql);
	$uidCheck = mysqli_num_rows($result);

	if($uidCheck > 0){
		header("Location: ../signup.php?error=username");
		exit();
	} else {
		$encPwd = password_hash($pwd, PASSWORD_DEFAULT);
		$sql = "INSERT INTO user (first, last, uid, pwd) VALUES ('$first', '$last', '$uid', '$encPwd')";
		if ($conn->query($sql) === TRUE){
			echo "Your Profile has been created!";
		} else {
			echo "Error: " . $conn->error;
		}

		header('Location: ../index.php');
	}
}