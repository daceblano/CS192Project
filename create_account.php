<?php
include_once 'includes/create_account.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create an Account</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Create an Account</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post">
            Student Number: <input type='text' name='snum' id='snum' /><br>
            Password: <input type="text" name="password" id="password"/><br>
            <input type="submit" 
                   value="Create" 
                   onclick="return createaccountformhash(this.form,this.form.snum,this.form.password);" /> 
        </form>
        <p>Return to the <a href="index.php">login page</a>.</p>
    </body>
</html>