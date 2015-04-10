<?php
include_once 'includes/instantiate.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Instantiation Form</title>
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <!-- Instantiation form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Instantiate Event</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                method="post" 
                name="registration_form">
            Title: <input type="text" name="title" id="title"/><br>
            Date: <input type="date" name="date" id="date" /><br>
			Description: <input type="text" name="description" id="description" /><br>
			<!-- not sure if needed to be changed to hash the values -->
            <input name="george" type="submit" value="Submit"/> 
        </form>
        <p>Return to the <a href="index.php">login page</a>.</p>
    </body>
</html>