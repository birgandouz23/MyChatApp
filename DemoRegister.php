<?php
    session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){	
	if(isset($_POST['submit'])){
		$field_err = "";
		$email_err = "";
		$image_err = "";
		if(isset($_POST['f_name']) && !empty($_POST['f_name']) && isset($_POST['l_name']) && !empty($_POST['l_name']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_FILES['image']) && !empty($_FILES['image']) && !empty($_POST['pass'])){
			$f_name = $_POST['f_name'];
			$l_name = $_POST['l_name'];
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			$conn = new PDO("mysql:host=localhost;dbname=MessagingApp;charset=utf8", 'root' , 'root');
			$query = $conn->prepare("SELECT * FROM chater WHERE email=?");
			$query->execute([$email]);
			if($query->rowCount() == 0){
				
				$image_name = $_FILES['image']['name'];
				$image_path = $_FILES['image']['tmp_name'];
				$allowed_ext = array('jpg','png','jpeg');
				$ext = explode('.',$image_name);
				if(in_array(end($ext) , $allowed_ext)){
					
					move_uploaded_file($image_path,"Images/".$image_name);
					$uni_code = rand(99999,999999);
					$conn = new PDO("mysql:host=localhost;dbname=MessagingApp;charset=utf8", 'root' , 'root');
					$query2 = $conn->prepare("INSERT INTO chater(uni_code,f_name,l_name,email,image,statu,is_type,password) VALUES(".$uni_code.",'".$f_name."','".$l_name."','".$email."','".$image_name."','Active now','no','".$pass."')");
					$query2->execute();
					$query3 = $conn->prepare("SELECT * FROM chater WHERE email=?");
					$query3->execute([$email]);
					$row = $query3->fetch(PDO::FETCH_ASSOC);
					$_SESSION['uni_code'] = $row['uni_code'];
					header("location: DemoProfile.php");
					
				}else{
					$image_err = "<span>Only JPG, PNG, JPEG types are allowed!!!</span>";
				}
				
			}else{
				$email_err = "<span>This email is taken already!!!</span>";
			}
			
		}else{
			$field_err = "<span>All fields are required!!!</span>";
		}
	}
	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat-App</title>
	<link rel="stylesheet" type="text/css" href="#"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
	<style>
		* {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
			font-family: "poppins" , sans-serif;
		}
		body {
			width: 100%;
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		form {
			width: 20%;
			height: 40%;
			background-color: #dcdcdc;
			padding: 20px;
			display: flex;
			gap: 20px;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			border-radius: 10px;
		}
		input , p , label{
			width: 60%;
			height: 40px;
		}
		p {
			background-color: inherit;
			color: black;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 13px;
		}
		input[type='email'], input[type='text'] {
			outline: none;
			border: none;
			padding: 0 10px;
		}
		input[type=submit] {
			cursor: pointer;
			border: none;
			background-color: #5bd75b;
			color: white;
		}
		label {
			background-color: white;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
		}
		label i {
			font-size: 26px;
			color: black;
		}
	</style>
</head>
<body>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
		<!--<p id="showErr"></p>-->
		<?php
			if(isset($_POST['submit'])){
				echo $field_err;
			}
		?>
		<input type="text" name="f_name" placeholder="First name"/>
		<input type="text" name="l_name" placeholder="Last name"/>
		<input type="email" name="email" placeholder="email"/>
		<input type="password" name="pass" placeholder="password"/>
		<?php
			if(isset($_POST['submit'])){
				echo $email_err;
			}
		?>
		<label for="image"><i class="fa fa-camera" aria-hidden="true"></i></label>
		<?php
			if(isset($_POST['submit'])){
				echo $image_err;
			}
		?>
		<input id="image" type="file" name="image" hidden/>
		<input type="submit" name="submit" value="Register" onclick=""/>
		<p>Already have an acount? <a href="DemoLogin.php">Login Now</a></p>
	</form>

	<script>
		/*function fetchData(){
			let email = document.getElementById('email').value;
			let password = document.getElementById('password').value;
			let showErr = document.getElementById('showErr');
			let req = new XMLHttpRequest();
			req.open("POST","DemoConnect.php",true);
			req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			req.send("email="+email+"&password="+password);
			req.onload = ()=>{
				let resp = req.responseText;
				if(resp){
					showErr.style.backgroundColor = "#ff7f50";
					showErr.innerHTML = resp;
				}else{
					location.href = "DemoProfile.php";
				}
			}
		}*/
	</script>
</body>
</html>