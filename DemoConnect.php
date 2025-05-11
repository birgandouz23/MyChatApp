<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){	
		if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass'])){
			$email = $_POST['email'];
			$conn = new PDO("mysql:host=localhost;dbname=MessagingApp;charset=utf8",'root','root');
			$query = $conn->prepare("SELECT * FROM chater WHERE email=?");
			$query->execute([$email]);
			if($query->rowCount() > 0){
				$row = $query->fetch(PDO::FETCH_ASSOC);
				$_SESSION['uni_code'] = $row['uni_code'];
				$query2 = $conn->prepare("UPDATE chater SET statu='Active now' WHERE uni_code=".$row['uni_code']."");
				$query2->execute();
				//header("location: Profile.php");
			}else {
				echo "This user dosn't exist!!!";
			}
		}else {
			echo "All fields are required!!!";
		}
	}
?>