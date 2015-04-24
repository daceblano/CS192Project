<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'functions.php';
sec_session_start();

$error_msg = '';
$result = NULL;
	
if($stmt = $mysqli->prepare("SELECT nickname, first_name, last_name, middle_name, birthday, degree_program, mail_main, mail_alt, num_globe, num_smart, num_sun, landline, address FROM members WHERE student_number = ? LIMIT 1")) {
	$stmt->bind_param('s', $_SESSION['student_number']);
	$stmt->execute();
	$res = $stmt->get_result();
	$result = $res->fetch_assoc();
}
	
if(isset($_POST['edit_profile'])) {
	$nickname = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_STRING);
	$first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
	$last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
	$middle_name = filter_input(INPUT_POST, 'middle_name', FILTER_SANITIZE_STRING);
	$birthday = filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_STRING);
	$degree_program = filter_input(INPUT_POST, 'degree_program', FILTER_SANITIZE_STRING);
	$mail_main = filter_input(INPUT_POST, 'mail_main', FILTER_SANITIZE_EMAIL);
	$mail_main = filter_var($mail_main, FILTER_VALIDATE_EMAIL);
	$mail_alt = filter_input(INPUT_POST, 'mail_alt', FILTER_SANITIZE_EMAIL);
	$mail_alt = filter_var($mail_alt, FILTER_VALIDATE_EMAIL);
	$num_globe = filter_input(INPUT_POST, 'num_globe', FILTER_SANITIZE_NUMBER_INT);
	$num_smart = filter_input(INPUT_POST, 'num_smart', FILTER_SANITIZE_NUMBER_INT);
	$num_sun = filter_input(INPUT_POST, 'num_sun', FILTER_SANITIZE_NUMBER_INT);
	$landline = filter_input(INPUT_POST, 'landline', FILTER_SANITIZE_NUMBER_INT);
	$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
	
	if ($stmt = $mysqli->prepare("UPDATE members SET nickname = ?, first_name = ?, last_name = ?, middle_name = ?, birthday = ?, degree_program = ?, mail_main = ?, mail_alt = ?, num_globe = ?, num_smart = ?, num_sun = ?, landline = ?, address = ? WHERE student_number = ?")) {
		$stmt->bind_param('ssssssssddddss', $nickname, $first_name, $last_name, $middle_name, $birthday, $degree_program, $mail_main, $mail_alt, $num_globe, $num_smart, $num_sun, $landline, $address, $_SESSION['student_number']);
		if (! $stmt->execute()) {
			header('Location: ../error.php?err=Registration failure: UPDATE');
		}
		$_SESSION['nick'] = $nickname;
		header('Location: ./edit_profile_success.php');
	}
}
elseif(isset($_POST['cancel'])) {
	header('Location: ./profile_content.php');
}

?>