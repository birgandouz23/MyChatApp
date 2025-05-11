<?php
	session_start();
	if(isset($_SESSION['uni_code'])){
		if(isset($_POST['logout'])){
			header("location: DemoLogout.php");
		}
		
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat-App</title>
	<link rel="stylesheet" type="text/css" href="Style.css"/>
</head>
<body>
	
		<section class="chat-area">
			<!--SHOW USER PROFILE HERE-->
		</section>
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
			<input type="submit" name="logout" value="Logout"/>
		</form>
		<script>
		
			function fetchUser(){
				let chatArea = document.querySelector('.chat-area');
				let req = new XMLHttpRequest();	
				req.open("POST","DemoStatu.php",true);
				//req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				req.send();
				req.onload = function(){
				let resp = this.responseText;
				chatArea.innerHTML = resp;
				}
				
			}
			
			setInterval(()=>fetchUser() , 1000);
			fetchUser();
			
		</script>
</body>
</html>
<?php
	}else{
		header("location: DemoLogin.php");
	}
?>