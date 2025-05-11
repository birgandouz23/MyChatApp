<?php
	session_start();
	if(isset($_SESSION['uni_code'])){
	$conn = new PDO("mysql:host=localhost;dbname=MessagingApp;charset=utf8",'root','root');
	$query = $conn->prepare("UPDATE messages SET situat='seen' WHERE out_code=".$_GET['uni_code']." AND  in_code=".$_SESSION['uni_code']."");
	$query->execute();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat-App</title>
	<link rel="stylesheet" type="text/css" href="Style.css"/>
</head>
<body>
	
		<section class="chat-area">
			<header>
			
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
				<input type="text" id="in_code" value="<?php echo $_GET['uni_code']?>" hidden/>
				<!--<input type="text" id="out_code" value="" hidden/>-->
				<input id="msg" type="text" name="msg" placeholder="Type your message" onfocus="isFocus()" onblur="isBlur()"/>
				<input type="submit" name="send" value="Send" onclick="sendData(); ftc()"/>
		    </div>
				
				
		</section>
		<!--
		<br/><br>
		<div id="wait"></div>
		-->
		<script>
			let box = document.getElementById('chatBox');
			box.onmouseenter = ()=>{
				box.classList.add('active');
			}
			box.onmouseleave = ()=>{
				box.classList.remove('active');
			}
			
			
			function sendData(){
				
				let inCode = document.getElementById('in_code').value;
				//let inCode = document.getElementById('in_uni_code').value;
				let msg = document.getElementById('msg').value;
				let req = new XMLHttpRequest();	
				req.open("POST","DemoInsert.php",true);
				req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				req.send("msg="+msg+"&in_code="+inCode);
				document.getElementById('msg').value = "";
			}
			
			function ftc(){
				
				let inCode = document.getElementById('in_code').value;
				let req = new XMLHttpRequest();	
				req.open("POST","Test05.php",true);
				req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				req.send("in_code="+inCode);
				req.onload = function(){
					let resp = this.responseText;
					chatBox.innerHTML = resp;
					if(!chatBox.classList.contains('active')){
					chatBox.scrollTop = chatBox.scrollHeight;
					}
				}
			}
			
			ftc();
			
			setInterval(()=>{ftc()} , 500);
			
			
			function isFocus(){
				let inCode = document.getElementById('in_code').value;
				let isType = "yes";
				let req = new XMLHttpRequest();	
				req.open("POST","Demo.php",true);
				req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				req.send("isType="+isType+"&inCode="+inCode);
				
			}
			
			
			function isBlur(){
				let inCode = "0";
				let isType = "no";
				let req = new XMLHttpRequest();	
				req.open("POST","Demo.php",true);
				req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				req.send("isType="+isType+"&inCode="+inCode);
			
			}
			
			/*setInterval(()=>{
				let typ = document.getElementById('typing');
				let req = new XMLHttpRequest();	
				req.open("GET","Demo.php",true);
				req.send();
				req.onload = function(){
				let resp = this.responseText;
				typ.innerHTML = resp;
				}
				
			} , 100);*/
			
			
			/*async function prms(){
				let resp = await fetch('Test02.php');
				let txt = await resp.text();
				document.getElementById('wait').innerHTML = txt;
			}
			prms();*/
			
			function sendUniCode(){
				
				let showInfo = document.querySelector('.chat-area header');
				let inCode = document.getElementById('in_code').value;
				//let outCode = document.getElementById('out_code').value;
				let req = new XMLHttpRequest();	
				req.open("POST","DemoFetch.php",true);
				req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				req.send("in_code="+inCode);
				req.onload = function(){
					let resp = this.responseText;
					showInfo.innerHTML = resp;
					console.log(resp);
			
				}
			}
			sendUniCode();
			setInterval(()=>sendUniCode() , 100)
				
		</script>


</body>
</html>

<?php	
	}else{
		header("location: DemoLogin.php");
	}
?>