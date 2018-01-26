<?php
session_start();
include '../include/db_connection.php';

if(!isset($_POST['user_email']) || !isset($_POST['user_pwd'])) {
        echo json_encode(array('success' => '0', 'msg' => 'Parameters are invalid'));
    	include '../include/db_disconnection.php';
		exit();
    }
$user_email = $_POST['user_email'];
$user_pwd = $_POST['user_pwd'];

if ($user_email == "" || $user_pwd == "" || !filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
	echo json_encode(array('success' => '0', 'msg' => 'You have to fill out all data!'));
    include '../include/db_disconnection.php';
	exit();
}


$sql = "SELECT * FROM tbl_user where user_email = '$user_email'";

$result = $conn->query($sql);
if ($result->num_rows == 0) {
	echo json_encode(array('success' => '0', 'msg' => 'There is not user with this email.'));	
	include '../include/db_disconnection.php';
	exit();
} else {
	while($row = $result->fetch_assoc()) {
    	
    	if(password_verify ( $user_pwd , $row['password'] )){
			echo json_encode(array('success' => '1', 'msg' => 'Login successed!!!'));
			$_SESSION["user_id"] = $row['user_id'];
			$_SESSION["isLoggedIn"] = true;
			include '../include/db_disconnection.php';
			exit(); 		
    	} else {
			echo json_encode(array('success' => '0', 'msg' => 'Password or User email is not matched!'));
			include '../include/db_disconnection.php';
			exit();
    	}
    }
}

echo json_encode(array('success' => '0', 'msg' => 'Database transaction Error!'));

include '../include/db_disconnection.php';
exit();