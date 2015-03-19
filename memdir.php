<!DOCTYPE html>
<html>

<head>
<title> The CURSOR Site </title>
<link rel="stylesheet" type="text/css" href="inStyle.css">
</head>

<body>

	<nav>
		<table width = 100% >
			<tr>
				<td align=center width = 33% id = "td1"><a href="eportal.html">Events Portal</a></td>
				<td align=center width = 33% id = "td2"><a href="memdir.php">Member Directory</a></td>
				<td align=center width = 33% id = "td3"><a href="createaccount.html">Profile</a></td>
				<td align=center width = 0% id = "td4"><a href="admin.html"></a></td>
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
