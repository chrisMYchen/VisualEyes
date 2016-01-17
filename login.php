<?php
	session_start();
	if($_SERVER['REQUEST_METHOD']!='POST'){
		if(isset($_SERVER['HTTP_REFERER']))
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		else
			header('Location: indextest.php');
	}
	
	$user=$_POST['user'];
	$password=$_POST['pass'];
	$password="150y03HitfPr0p33vP2n" . $password;
	for($i =0; $i<1000;$i++){
		$password = sha1($password);
	}
	
	$conn = new mysqli("localhost", "ThunderPunch", "Power75", "ThunderPunch");
	 
	$sql='SELECT userID FROM users WHERE username=? && password=?';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('ss',$user, $password);
	
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