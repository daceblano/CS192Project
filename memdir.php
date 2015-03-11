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
a{
	color: white;
	text-decoration: none;
}
section {
    width:63%;
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
#akosilek{
	width: 100%;
	background-color: rgba(255,255,255,0.5);
	color: black;
}

</style>
</head>

<body>

	<nav>
		<table width = 100% >
			<tr>
				<td align=center width = 33%>EVENTS PAHRTUHL</td>
				<td align=center width = 33%><a href="memdir.php">Member Directory</a></td>
				<td align=center width = 33%><a href="createaccount.html">Profile</a></td>
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
	
		<?php
			$con=mysqli_connect("localhost", "root","admin");
			mysqli_query($con,"USE cs192");
			$result = mysqli_query($con, "SELECT * FROM Members");
			echo "<table id='akosilek'>
			<tr>
			<th>LastName</th>
			<th>FirstName</th>
			<th>MiddleName</th>
			</tr>";

			while($row = mysqli_fetch_array($result)) {
			  echo "<tr>";
			  echo "<td>".$row['LastName']."</td>";
			  echo "<td>".$row['FirstName']."</td>";
			  echo "<td>".$row['MiddleName']."</td>";
			  echo "</tr>";
			}

			//close connection
			mysqli_close($con);
		?>
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
