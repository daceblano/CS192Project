<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> The CURSOR Site</title>
        <link rel="stylesheet" href="styles/inStyle.css" />
		<nav>
			<table width = 100% >
				<tr>
					<td align=center width = 20% id = "td1"><a href="eportal.php">Events Portal</a></td>
					<td align=center width = 20% id = "td2"><a href="memdir.php">Member Directory</a></td>
					<td align=center width = 20% id = "td3"><a href="edit_profile.php">Profile</a></td>
					<td align=center width = 20% id = "td4"><a href="admin.php">Admin Page</a></td>
					<td align=center width="20%" id="td5">
						<?php if (login_check($mysqli) == true) : ?>
						<!-- <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>  -->
						Welcome User!
						<a href="index.php">Return to index</a>
					</td>
				</tr>
			</table>
		</nav>
    </head>
    <body>

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
		
		<!-- content here -->
		<section>
			<form action="instantiate.php">
				<input type="submit" value="Instantiate Event">
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
			
			function dario(){ //test function to see if hiding admin page is viable
				td4 = document.getElementById("td4");
				td4.innerHTML = "Admin"
			}
			//alert("compiled");
		</script>

        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>