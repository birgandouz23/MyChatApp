<?php 
	session_start();
	$conn = new PDO("mysql:host=localhost;dbname=MessagingApp;charset=utf8",'root','root');

	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		
		$out_code = $_SESSION['uni_code'];
		$in_code = $_POST['in_code'];
		$msg = htmlspecialchars($_POST['msg'], ENT_QUOTES);
	    if(isset($msg) && $msg != ""){
		$query = $conn->prepare("INSERT INTO messages(out_code,in_code,msg,situat) VALUES(".$out_code.",".$in_code.",'".$msg."','unseen')");
		$query->execute();
		}
				
	}
	
	



?>