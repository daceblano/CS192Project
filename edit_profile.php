<?php
include_once 'includes/edit_profile.inc.php';
include_once 'includes/db_connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Profile</title>
        <script type="text/JavaScript" src="js/forms.js"></script>
        <!-- <link rel="stylesheet" href="styles/main.css" /> -->
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Edit your profile</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" >
			Nickname:  <input type="text" name="nickname" id="nickname" value="<?php echo $result['nickname'];?>"/><br>
			First Name:  <input type="text" name="first_name" id="first_name" value="<?php echo $result['first_name'];?>"/><br>
			Last Name:  <input type="text" name="last_name" id="last_name" value="<?php echo $result['last_name'];?>"/><br>
			Middle Name:  <input type="text" name="middle_name" id="middle_name" value="<?php echo $result['middle_name'];?>"/><br>
			Birthday:  <input type="date" name="birthday" id="birthday" value="<?php echo $result['birthday'];?>"/><br>
			Degree Program:  <input type="text" name="degree_program" id="degree_program" value="<?php echo $result['degree_program'];?>"/><br>
			Main Email Address:  <input type="text" name="mail_main" id="mail_main" value="<?php echo $result['mail_main'];?>"/><br>
			Alternate Email Address:  <input type="text" name="mail_alt" id="mail_alt" value="<?php echo $result['mail_alt'];?>"/><br>
			Globe Number:  <input type="text" name="num_globe" id="num_globe" value="<?php echo $result['num_globe'];?>"/><br>
			Smart Number:  <input type="text" name="num_smart" id="num_smart" value="<?php echo $result['num_smart'];?>"/><br>
			Sun Number:  <input type="text" name="num_sun" id="num_sun" value="<?php echo $result['num_sun'];?>"/><br>
			Landline:  <input type="text" name="landline" id="landline" value="<?php echo $result['landline'];?>"/><br>
			Address:  <input type="text" name="address" id="address" value="<?php echo $result['address'];?>"/><br>
            <input type="submit" name="edit_profile" value="Submit"/> 
        </form>
            
        <p>Return to the <a href="index.php">login page</a>.</p>
    </body>
</html>