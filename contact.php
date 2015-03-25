<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>The CURSOR Site</title>
        <link rel="stylesheet" href="styles/main.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
		<header>
			<div id="nav">
				<div id="logo">
					<a href="index.php">
						<img src="img/logo.png" alt="CURSOR site logo"/>
					</a>
				</div>
				<div id="navtab">
					<a href="about.php" >
						<img src="img/about.png" alt="CURSOR site logo"/>
					</a>
				</div>
				<div id="navtab">
					<a href="events.php">
						<img src="img/events.png" alt="CURSOR site logo"/>
					</a>
				</div>
				<div id="navtab">
					<a href="contact.php">
						<img src="img/contact.png" alt="CURSOR site logo"/>
					</a>
				</div>
				<?php
					if (login_check($mysqli) == true) {
						echo '<div id = "logout" >Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) .'';
						echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p> </div>';
					} else {
							// echo '<p>Currently logged ' . $logged . '.</p>';
							// echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
								echo '
								<div id="login">
									Member Log-in:
									<form action="includes/process_login.php" method="post" name="login_form">
										<table>
											<col width="25">
											<col width="25">
											<col width="5">
											<tr>
												<td>Username:</td>
												<td colspan="2">Password:</td>
											</tr>
											<tr>
												<td><input type = text size=15
															name="email" 
															autofocus="true"
															onkeydown="pressedEnter(event, this.form, this.form.password)"/></td>
												<td><input type="password" 
															name="password" 
															id="password"
															onkeydown="pressedEnter(event, this.form, this.form.password)"/></td>
												<td><input type="button" 
															value="Login" 
															onclick="formhash(this.form, this.form.password)";/></td>
											</tr>
										</table>
									</form>
								</div>
								';
						}
				?>
		</header>
		CONTACT PAGE!!!
    </body>
</html>