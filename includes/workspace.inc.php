<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
include_once 'functions.php';
sec_session_start();

$error_msg = '';
$result = NULL;

if($stmt = $mysqli->prepare("SELECT * FROM events WHERE eventID = ? LIMIT 1")) {
	$stmt->bind_param('i', $_POST['eventID']);
	$stmt->execute();
	$res = $stmt->get_result();
	$result = $res->fetch_assoc();
}

if(isset($_POST['done'])) {
	$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
	$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
	$date_created = filter_input(INPUT_POST, 'date_created', FILTER_SANITIZE_STRING);
	$date_held = filter_input(INPUT_POST, 'date_held', FILTER_SANITIZE_STRING);
	$displayPic = filter_input(INPUT_POST, 'displayPic', FILTER_SANITIZE_STRING);
	$listString = filter_input(INPUT_POST, 'listString', FILTER_SANITIZE_STRING);
	$links = filter_input(INPUT_POST, 'links', FILTER_SANITIZE_STRING);

	
	if ($stmt = $mysqli->prepare("UPDATE events SET title = ?, description = ?, date_created = ?, date_held = ?, displayPic = ?, listString = ?, links = ? WHERE eventID = ?")) {
		$stmt->bind_param('sssssssi', $title, $description, $date_created, $date_held, $displayPic, $listString, $links, $_POST['eventID']);
		
		if (! $stmt->execute()) {
			header('Location: ../error.php?err=Event Edit failure: UPDATE');
		}
		else{
			header('Location: ./workspace_success.php');
		}
	}
}
elseif(isset($_POST['cancel'])) {
	header('Location: ./eportal.php');
}
?>