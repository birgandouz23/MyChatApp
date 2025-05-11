<?php
	session_start();
	
	if(isset($_SESSION['uni_code'])){
		
		header("location: DemoProfile.php");
		
	}else{
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
		div {
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
		#showErr {
			background-color: inherit;
			color: white;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		input[type=email], input[type=password] {
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
			background-color: #5bd75b;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
		}
		label i {
			font-size: 26px;
			color: white;
		}
		.redirect {
			background-color: inherit;
			color: black;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 11px;
		}
	</style>
</head>
<body>

	<div>
		<p id="showErr"></p>
		<input id="email" type="email" name="email" placeholder="email"/>
		<input id="password" type="password" name="pass" placeholder="password"/>
		<input type="submit" name="submit" value="Login" onclick="fetchData()"/>
		<p class="redirect">Don't your have an acount? <a href="DemoRegister.php">Register Now</a></p>
	</div>

	<script>
		function fetchData(){
			let email = document.getElementById('email').value;
			let password = document.getElementById('password').value;
			let showErr = document.getElementById('showErr');
			let req = new XMLHttpRequest();
			req.open("POST","DemoConnect.php",true);
			req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			req.send("email="+email+"&pass="+password);
			req.onload = ()=>{
				let resp = req.responseText;
				if(resp){
					showErr.style.backgroundColor = "#ff7f50";
					showErr.innerHTML = resp;
				}else{
					location.href = "DemoProfile.php";
				}
			}
		}
	</script>
</body>
</html>

<?php		
	}
?>