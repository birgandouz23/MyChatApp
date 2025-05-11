<!DOCTYPE html>
<html>
<head>
	<title>Chat-App</title>
	<link rel="stylesheet" type="text/css" href="Style.css"/>
</head>
<body>
	
		<section class="chat-area">
			<header>
				<img src="myImage.jpg" alt=""/>
				<div class="details">
				<?php
					$conn = new PDO("mysql:host=localhost;dbname=battach;charset=utf8",'root','');
					$query2 = $conn->prepare("SELECT * FROM messages");
					$query2->execute();
					$row = $query2->fetch(PDO::FETCH_ASSOC);
				?>
					<span><?php echo $row['username'];?></span>
					<p><?php echo $row['status'];?></p>
				</div>
				<div id="typing"></div>
				
			</header>
			<div class="chat-box" id="chatBox">
				<!--<div class="chat outgoing">
					<div class="message">
						<p>W3Schools is a freemium educational website for learning coding online. 
						Initially released in 1998 affiliated with the W3 Consortium. W3Schools offers
						courses covering many aspects of web development. W3Schools also publishes free
						HTML templates. </p>
					</div>
				</div>
				<div class="chat incoming">
				    <img src="pngwing.com.png" alt="">
					<div class="message">
						<p>W3Schools is a freemium educational website for learning coding online. 
						Initially released in 1998 affiliated with the W3 Consortium. W3Schools offers
						courses covering many aspects of web development. W3Schools also publishes free
						HTML templates. </p>
					</div>
				</div>-->
			</div>
			<div class="msg-area">
				<input id="msg" type="text" name="msg" placeholder="Type your message" onfocus="isFocus()" onblur="isBlur()"/>
				<input type="submit" name="send" value="Send" onclick="sendData(); ftc()"/>
		    </div>
				
				
		</section>
		<!--
		<br/><br>
		<div id="wait"></div>
		-->
		<script>
			
		
			function sendData(){
			
				let msg = document.getElementById('msg').value;
				let req = new XMLHttpRequest();	
				req.open("POST","Test04.php",true);
				req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				req.send("msg="+msg);
				document.getElementById('msg').value = "";
			}
			
			
			function ftc(){
				let chatBox = document.getElementById('chatBox');
				let req = new XMLHttpRequest();	
				req.open("POST","Test05.php",true);
				req.send();
				req.onload = function(){
					let resp = this.responseText;
					chatBox.innerHTML = resp;
			
				}
			}
			
			ftc();
			
			setInterval(()=>{ftc()} , 500);
			
			
			function isFocus(){
				let isType = "yes";
				let req = new XMLHttpRequest();	
				req.open("POST","Demo.php",true);
				req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				req.send("isType="+isType);
				
			}
			
			
			function isBlur(){
				let isType = "no";
				let req = new XMLHttpRequest();	
				req.open("POST","Demo.php",true);
				req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				req.send("isType="+isType);
			
			}
			
			
			setInterval(()=>{
				let typ = document.getElementById('typing');
				let req = new XMLHttpRequest();	
				req.open("GET","Demo.php",true);
				req.send();
				req.onload = function(){
				let resp = this.responseText;
				typ.innerHTML = resp;
				}
				
			} , 100);
			
			
			/*async function prms(){
				let resp = await fetch('Test02.php');
				let txt = await resp.text();
				document.getElementById('wait').innerHTML = txt;
			}
			prms();*/
				
		</script>


</body>
</html>