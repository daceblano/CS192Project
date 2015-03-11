<!DOCTYPE html>
<html>

<head>
<style>
header {
    background-color:black;
    color:white;
    text-align:center;
    padding:5px;	 
}
nav {
    line-height:30px; 
    background-color: rgb(120,120,120);
    height:30px;
    width:70%;
    float:left;
	/*text-align:justify;*/
    padding:5px;
	color: white;
}
section {
    width:350px;
    float:left;
    padding: 50px;	
	color: white;	
	font-family: calibri;
	/*background-color: blue;*/
}
footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
    	 
}
aside {
	width:29.25%;
	height: 100%;
	/*background-color: black;*/
	float: right;
}

#msgs {
	font-family: "tahoma";
	/*font-weight: bold;*/
	font-size: 12px;
	margin: 0px 10px;
}

#msgback {
	width: 100%;
	height: 80%;
	background-color: rgba(255,255,255,0.5);
	
	/*margin: 3px;
	opacity: 0.4;
    filter: alpha(opacity=40);*/ /* For IE8 and earlier */
}

textarea{
	width: 98.5%;
	height: 93.45%;
	resize: none;
}

#chatput {
	width: 100%;
	height: 20.05%;
	background-color: green;
	/*padding: 1px;*/
}

html, body {
	margin: 0;
	padding: 0;
	height: 100%;
}

body {
    background-image: url("Totally not plagiarized.jpg");
    background-color: rgb(0,70,0);
	background-repeat: no-repeat;
	background-size: 100% 100%;
}

#wews{
	width: 100px;
	height: 100px;
	background-color: white;
	float: left;
}

</style>
</head>

<body>

	<nav>
		<table width = 100% >
			<tr>
				<td align=center width = 33%>London swagda</td>
				<td align=center width = 33%>Paris</td>
				<td align=center width = 33%>Tokyo</td>
			</tr>
		</table>
	</nav>

	<aside id = "aseid">
		<div id = "msgback">
			<div id = "msgs">
				<br>
			</div>
		</div>
		<div id = "chatput">
			<textarea id = "msgsent"></textarea>
		</div>
	</aside>

	<section>
	
		<form action="login.php" method="post">
			First Name (for now): <br/> 
			<input type = text name = "fname" /><br/><br/>
			Password: <br/>
			<input type = text name = "pword"/><br/><br/>
			
			<input type = submit />
			<!--
				//insert checking if the inputs is okay here
			-->
		</form>
	</section>

	<script type=text/javascript>
		msent = document.getElementById("msgsent");
		mrecd = document.getElementById("msgs");
		
		//alert(msent);
		
		//alert("compiled1");
		if(msent){
			//alert("msent true");
			msent.addEventListener("keydown", function(e){
				//alert("it worked!");
				if(e.keyCode == 13){
					mrecd.innerHTML += '\t' + msent.value + '<br>';
					setTimeout(function(){ 
						msent.value = '';
					}, 1);  
				}
			}, false);
		}
		//alert("compiled");
	</script>
	<!--
	<footer>
	Copyright © W3Schools.com
	</footer>
	-->

</body>
</html>
