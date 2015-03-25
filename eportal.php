<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> The CURSOR Site </title>
        <link rel="stylesheet" href="styles/inStyle.css" />
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
            <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
					<nav>
						<table width = 100% >
							<tr>
								<td align=center width = 33% id = "td1"><a href="eportal.php">Events Portal</a></td>
								<td align=center width = 33% id = "td2"><a href="memdir.php">Member Directory</a></td>
								<td align=center width = 33% id = "td3"><a href="register.php">Profile</a></td>
								<!--<td align=center width = 0% id = "td4"><a href="admin.php"></a></td>-->
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
					
					<iframe width = 70.4% height = 93.1%></iframe>

					<script type=text/javascript>
						msent = document.getElementById("msgsent");
						mrecd = document.getElementById("msgs");
						
						if(msent){
							msent.addEventListener("keydown", function(e){
								if(e.keyCode == 13){
									mrecd.innerHTML += '\t' + msent.value + '<br>';
									setTimeout(function(){ 
										msent.value = '';
									}, 1);  
								}
							}, false);
						}
						
						function dario(){
							td4 = document.getElementById("td4");
							td4.innerHTML = "Admin"
						}
					</script>
            </p>
            <p>Return to <a href="index.php">login page</a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>