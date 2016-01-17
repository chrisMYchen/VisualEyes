<?php
	session_start();
	/*if($_SERVER['REQUEST_METHOD']!='POST'){
		if(isset($_SERVER['HTTP_REFERER']))
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		else
			header('Location: indextest.php');
	}*/
	
	var_dump($_GET);
	
	$conn = new mysqli("localhost", "ThunderPunch", "Power75", "ThunderPunch");
	 
	$sql='SELECT userID FROM users WHERE userID=?';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('s',$_SESSION['userID']);
	
	if($stmt === false) {
	  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
	}
	 
	$stmt->execute();
	$stmt->bind_result($userID);
	if($stmt->fetch()){
		$_SESSION['userID']=$userID;
		
		echo 1;
	}
	$stmt->close();
?>