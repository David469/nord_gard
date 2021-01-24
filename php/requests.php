<?php
require('connect.php');

if (isset($_POST['submit_call'])) {
	$name = $_POST['name'];
	$number = $_POST['number'];
	$query = "INSERT INTO `numbers` (`name`, `number`) VALUES ('$name', '$number')";
	mysqli_query($conn, $query);
	header('Location: http://nordgard');
	exit;
}

if(isset($_POST['submit_message'])){
	$name = $_POST['name'];
	$number = $_POST['number'];
	$message = $_POST['message'];
	$query = "INSERT INTO `numbers` (`name`, `number`) VALUES ('$name', '$number')";
	mysqli_query($conn, $query);
	$id = mysqli_insert_id($conn);
	$query = "INSERT INTO `messages` (`id_number`, `message`) VALUES ('$id', '$message')";
	mysqli_query($conn, $query);
	header('Location: http://nordgard');
	exit;
}