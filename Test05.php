<?php
	session_start();
	$uni_code = $_POST['in_code'];
	$conn = new PDO("mysql:host=localhost;dbname=MessagingApp;charset=utf8",'root','root');
	$query2 = $conn->prepare("SELECT * FROM messages LEFT JOIN chater ON messages.out_code=chater.uni_code WHERE out_code=".$_SESSION['uni_code']." AND in_code=".$uni_code." OR out_code=".$uni_code." AND in_code=".$_SESSION['uni_code']." ORDER BY messages.id ASC");
	$query2->execute();
	
	while($row = $query2->fetch(PDO::FETCH_ASSOC)){
		if($row['out_code'] != $uni_code){
			
				echo "<div class='chat outgoing'>
						<div class='message'>
							<p>".$row['msg']."</p>
						</div>
					</div>";
		
		}else{
		
				echo "<div class='chat incoming'>
						<img src='Images/".$row['image']."' alt=''>
						<div class='message'>
							<p>".$row['msg']."</p>
						</div>
					</div>";	
		
		}
	
	}
	
	
?>