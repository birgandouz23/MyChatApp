<?php
	session_start();
	$conn = new PDO("mysql:host=localhost;dbname=MessagingApp;charset=utf8",'root','root');
	$in_code = $_POST['in_code'];
	$query = $conn->prepare("SELECT * FROM chater WHERE uni_code=?");
	$query->execute([$in_code]);
	$row = $query->fetch(PDO::FETCH_ASSOC);
		echo '<img src="Images/'.$row['image'].'" alt=""/>
			 <div class="details">
				<span>'.$row['f_name'].' '.$row['l_name'].'</span>';
				
	/*$query2 = $conn->prepare("SELECT * FROM messages WHERE out_code=? AND in_code=?");
	$query2->execute([$in_code , $_SESSION['uni_code']]);
	$row2 = $query2->fetch(PDO::FETCH_ASSOC);*/
	if($row['receiver'] == $_SESSION['uni_code']){
			if($row['is_type'] == "yes"){
					
			echo '<p><em>Typing...</em></p>';
				
		}else{
				
			echo '<p>'.$row['statu'].'</p>';
				
		}
	}else{
				
		echo '<p>'.$row['statu'].'</p>';
				
		}
	/*
	$query2 = $conn->prepare("SELECT * FROM messages WHERE out_code=".$in_code." AND in_code=".$_SESSION['uni_code']."");
	$query2->execute();
	if($query2->rowCount() > 0){
		$row2 = $query2->fetch(PDO::FETCH_ASSOC);
		if($row2['typing'] == "yes"){
					
			echo '<p><em>Typing...</em></p>';
				
		}else{
				
			echo '<p>'.$row['statu'].'</p>';
				
		}
	}else{
				
		echo '<p>'.$row['statu'].'</p>';
				
		}
		*/
		echo '</div>';
	
	
		
		/*if($row['is_type'] == "yes"){
			
			echo "<div id='typing'><p><em>Typing...</em></p></div>";
			
			}*/
	//$query = $conn->prepare("SELECT * FROM chater,messages WHERE chater.uni_code=? AND messages.out_code=? AND messages.in_code=?");
			
?>


