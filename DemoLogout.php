<?php
	session_start();
	$conn = new PDO("mysql:host=localhost;dbname=MessagingApp;charset=utf8",'root','root');
	$query = $conn->prepare("UPDATE chater SET statu='Offline',is_type='no',receiver=0 WHERE uni_code=".$_SESSION['uni_code']."");
	$query->execute();
	/*$query2 = $conn->prepare("UPDATE chater SET is_type='no' WHERE uni_code=".$_SESSION['uni_code']."");
	$query2->execute();*/
	session_unset();
	session_destroy();		
	header("location: DemoLogin.php");
?>