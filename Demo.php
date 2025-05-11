<?php 
	session_start();
	/*
	$names = ['Abdelkabir','Jawad','Salma','Mounir','Zakaria','khadija'];
	$myInfo = "Hello my name is Abdelkabir from Morocco, and i live in a city named Agadir.";
	$exp = explode(' ' , $myInfo);
	for($i=0 ; $i<count($exp) ; $i++){
		if($exp[$i] == "Morocco,"){
			echo "This's Morocco baby! </br>";
			continue;
		}else if($exp[$i] == "city"){
			echo "Wa 3alaaaal! </br>";
			continue;
		}
		echo $exp[$i] . "</br>";
		
	}
	echo "</br></br>";
	echo end($exp);
	*/
	
	/*
	$ext = ['jpeg','jpg','png','txt'];
	$fileName = "myname1200.txt";
	$ex = explode('.',$fileName);
	if(in_array(end($ex) , $ext)){
		echo "This extension <span style='color: red;'>".end($ex)."</span> matched";
	}else{
		echo "This extension <span style='color: red'>".end($ex)."</span> dosn't match!";
	}
	echo "</br>".rand(time() , 99999999);
	
	
	$msg = "ThisMyName.txt";
	echo substr(strchr($msg , '.' , false) , false);
	*/
	
	
	
	
	
	
	
	
	
	
	$conn = new PDO("mysql:host=localhost;dbname=MessagingApp;charset=utf8",'root','root');
	
	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		
		$isType = $_POST['isType'];	
		$inCode = $_POST['inCode'];
		$query3 = $conn->prepare("UPDATE chater SET is_type='".$isType."',receiver=".$inCode." WHERE uni_code=".$_SESSION['uni_code']."");
		$query3->execute();

    }
	
	
	/*$conn = new PDO("mysql:host=localhost;dbname=battach;charset=utf8",'root','');
	
	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		
		$isType = $_POST['isType'];	
		$inCode = $_POST['inCode'];
		$query3 = $conn->prepare("UPDATE messages SET typing='".$isType."' WHERE out_code=".$_SESSION['uni_code']." AND in_code=".$inCode."");
		$query3->execute();

    }*/
	
	
	
	
	
	
	
	
	
	
	
	
	/*if($_POST['isType'] == "yes"){
		echo "<p>Typing...</p>";
	}*/

		/*$query2 = $conn->prepare("SELECT * FROM chater WHERE uni_code=".$_SESSION['uni_code']."");
		$query2->execute();
		$result = $query2->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row){
			if($row['is_type'] == "yes"){
			
				echo "<p><em>".$_SESSION['uni_code']." Typing...</em></p>";
				
			}
		}*/
	
?>