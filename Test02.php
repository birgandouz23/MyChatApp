<?php 

	$conn = new PDO("mysql:host=localhost;dbname=battach;charset=utf8",'root','');

	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
	    if(isset($firstname) && $firstname != "" && isset($lastname) && $lastname != "" && isset($email) && $email != ""){
		$query = $conn->prepare("INSERT INTO users(first_name,last_name,email) VALUES('".$firstname."','".$lastname."','".$email."')");
		$query->execute();
		}
				
	}

	$query2 = $conn->prepare("SELECT first_name,last_name,email FROM users");
	$query2->execute();
	
	while($row = $query2->fetch(PDO::FETCH_ASSOC)){
		echo "<div>" . $row['first_name'] . "</div>";
	}
   
	/*$query2 = $conn->prepare("SELECT first_name,last_name,email FROM users");
	$query2->execute();
	while($row = $query2->fetchAll(PDO::FETCH_ASSOC)){
	echo json_encode($row);
	
	}*/
?><?php
			
				