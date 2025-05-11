<?php
	session_start();
		$conn = new PDO("mysql:host=localhost;dbname=MessagingApp;charset=utf8",'root','root');
		$query = $conn->prepare("SELECT * FROM chater WHERE uni_code NOT IN(".$_SESSION['uni_code'].")");
		$query->execute();
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			
			echo '<a href="DemoChat.php?uni_code='.$row['uni_code'].'">
					<div class="image">
						<img src="Images/'.$row['image'].'" alt=""/>';
						$query2 = $conn->prepare("SELECT * FROM messages WHERE in_code=".$row['uni_code']."");
						$query2->execute();
						if($query2->rowCount() > 0){
							$query3 = $conn->prepare("SELECT * FROM messages WHERE out_code=".$row['uni_code']." AND in_code=".$_SESSION['uni_code']." AND situat='unseen'");
							$query3->execute();
							//$row2 = $query2->fetch(PDO::FETCH_ASSOC);
							if($query3->rowCount() > 0){
							
								echo "<span>".$query3->rowCount()."</span>";
						
							}
							
						}						
						
					echo '</div>
					<div class="details">
					<span>'.$row['f_name'].' '.$row['l_name'].'</span>';
					
			/*$query3 = $conn->prepare("SELECT * FROM messages WHERE in_code=".$row['uni_code']."");
			$query3->execute();
			if($query3->rowCount() > 0){
				//$row2 = $query2->fetch(PDO::FETCH_ASSOC);
				$query2 = $conn->prepare("SELECT * FROM messages WHERE out_code=".$row['uni_code']." AND in_code=".$_SESSION['uni_code']."");
				$query2->execute();
				$row2 = $query2->fetch(PDO::FETCH_ASSOC);
				if($row2['typing'] == "yes"){
				
					echo '<p><em>Typing...</em></p>';
				
				}else{
				
					echo '<p>'.$row['statu'].'</p>';
				
				}
				
			}else{
				
				echo '<p>'.$row['statu'].'</p>';
				
			}	
					
			echo '</div>
				</a>';*/
				
				
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
		$query2 = $conn->prepare("SELECT * FROM messages WHERE out_code=".$row['uni_code']." AND in_code=".$_SESSION['uni_code']."");
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
		
		echo '</div>
				</a>';
			
			
		}
		
 
?>