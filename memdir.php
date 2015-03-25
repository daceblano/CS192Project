<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Protected Page</title>
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
						//not sure if secure
						$result = mysqli_query($mysqli, "SELECT * FROM members");
						echo "<table id='akosilek'>
							<tr>
							<th>ID</th>
							<th>User Name</th>
							<th>Email</th>
							</tr>";

						while($row = mysqli_fetch_array($result)) {
							echo "<tr>";
							echo "<td>".$row['id']."</td>";
							echo "<td>".$row['username']."</td>";
							echo "<td>".$row['email']."</td>";
							echo "</tr>";
						}
					?>
				</section>

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
				</script>

            <!--<p>Return to <a href="index.php">login page</a></p>-->
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>