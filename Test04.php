<?php 

	$conn = new PDO("mysql:host=localhost;dbname=battach;charset=utf8",'root','');

	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		
		$out_code = "Farid Tanjaoui";
		$in_code = "Online";
		$msg = htmlspecialchars($_POST['msg'], ENT_QUOTES);
	    if(isset($msg) && $msg != ""){
		$query = $conn->prepare("INSERT INTO messages(out_code,in_code,msg) VALUES('".$out_code."','".$in_code."','".$msg."')");
		$query->execute();
		}
				
	}



?>