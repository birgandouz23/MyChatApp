<html>
<head></head>
<body>
      
		    <div class="posts"></div>
			<input id='firstName'type='text' placeholder='Type your first name'/> </br></br>
			<input id='lastName' type='text'  placeholder='Type your last name'/> </br></br>
		    <input id='email' type='email' placeholder='Type your email'/> </br></br>
			<button id='publish' onclick="sendData()">Publish</button>
		
		<script>
		
			function sendData(){
			
			let firstname = document.getElementById('firstName').value;
			let lastname = document.getElementById('lastName').value;
			let email = document.getElementById('email').value;
			let posts = document.querySelector(".posts");
			let req = new XMLHttpRequest();	
			req.open("POST","Test02.php",true);
			req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			req.send("firstname="+firstname+"&lastname="+lastname+"&email="+email);
			req.onload = function(){
				let resp = this.responseText;
				posts.innerHTML = resp;
			
			}
				document.getElementById('firstName').value = "";
				document.getElementById('lastName').value = "";
				document.getElementById('email').value = "";
			}
			sendData();
		</script>
</body>
</html>
