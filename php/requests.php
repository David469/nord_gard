<?php
require('connect.php');
session_start();
$index = 'http://nordgard';
$admin_change = 'http://nordgard/admin/page_change.php';

if (isset($_POST['submit_call'])) {
	$name = $_POST['name'];
	$number = $_POST['number'];
	$query = "INSERT INTO `numbers` (`name`, `number`) VALUES ('$name', '$number')";
	mysqli_query($conn, $query);
	header("Location: $index");
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
	header("Location: $index");
	exit;
}

if (isset($_POST['submit-admin'])) {
	$login = $_POST['login'];
	$password = $_POST['password'];
	$query = "SELECT * FROM `admins` WHERE `login` = '$login'";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) == 0) {
		$_SESSION['message'] = 'Такого логина не существует';
		header('Location: ../admin.php');
		exit();
	}
	$admin = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
	mysqli_free_result($result);
	if(password_verify($password, $admin['password'])) {
		$_SESSION['admin'] = true;
		header("Location: $admin_change");
		exit();
	} else {
		$_SESSION['message'] = 'Пароль неверный';
		header('Location: ../admin.php');
		exit();
	}
}


/*
	*ADMIN
*/

if (isset($_POST['advantage-add'])){
	$title = $_POST['title'];
	$text = $_POST['text'];
	$path = 'icons/'.time().$_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], '../'.$path);
	$query = "INSERT INTO `advantages` (`id`, `title`, `text`, `image`) VALUES (NULL, '$title', '$text', '$path')";
	mysqli_query($conn, $query);
	header("Location: $admin_change");
	exit;
}

if (isset($_POST['advantage-delete'])){
	$id = $_POST['id'];
	$query = "SELECT * FROM `advantages` WHERE `id` = '$id'";
	$result = mysqli_query($conn, $query);
	$item = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
	unlink('../'.$item['image']);
	$query = "DELETE FROM `advantages` WHERE `advantages`.`id` = '$id'";
	mysqli_query($conn, $query);
	header("Location: $admin_change");
	exit;
}

if (isset($_POST['advantage-change'])){
	$id = $_POST['id'];
	$title = $_POST['title'];
	$text = $_POST['text'];
	$path = 'icons/'.time().$_FILES['image']['name'];
	if (move_uploaded_file($_FILES['image']['tmp_name'], '../'.$path)) {
		$query = "UPDATE `advantages` SET `title` = '$title', `text` = '$text', `image` = '$path' WHERE `advantages`.`id` = '$id'";
	} else{
		$query = "UPDATE `advantages` SET `title` = '$title', `text` = '$text' WHERE `advantages`.`id` = '$id'";
	}
	mysqli_query($conn, $query);
	header("Location: $admin_change");
	exit;
}

if (isset($_POST['offer-add'])){
	$area = $_POST['area'];
	$price = $_POST['price'];
	$price_per_hundred = $_POST['price_per_hundred'];
	$description = $_POST['description'];
	$path = 'images/'.time().$_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], '../'.$path);
	$query = "INSERT INTO `offers` (`id`, `area`, `price`, `price_per_hundred`, `description`, `image`) VALUES (NULL, '$area', '$price', '$price_per_hundred', '$description', '$path')";
	mysqli_query($conn, $query);
	header("Location: $admin_change");
	exit;
}

if (isset($_POST['offer-change'])){
	$id = $_POST['id'];
	$area = $_POST['area'];
	$price = $_POST['price'];
	$price_per_hundred = $_POST['price_per_hundred'];
	$description = $_POST['description'];
	$path = 'images/'.time().$_FILES['image']['name'];
	if (move_uploaded_file($_FILES['image']['tmp_name'], '../'.$path)) {
		$query = "SELECT * FROM `offers` WHERE `id` = '$id'";
		$result = mysqli_query($conn, $query);
		$item = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
		unlink('../'.$item['image']);
		$query = "UPDATE `offers` SET `area` = '$area', `price` = '$price', `price_per_hundred` = '$price_per_hundred', `description` = '$description', `image` = '$path' WHERE `offers`.`id` = '$id'";
	} else{
		$query = "UPDATE `offers` SET `area` = '$area', `price` = '$price', `price_per_hundred` = '$price_per_hundred', `description` = '$description' WHERE `offers`.`id` = '$id'";
	}
	mysqli_query($conn, $query);
	header("Location: $admin_change");
	exit;
}

if (isset($_POST['offer-delete'])) {
	$id = $_POST['id'];
	$query = "DELETE FROM `offers_pluses` WHERE `offers_pluses`.`offer_id` = '$id'";
	$result = mysqli_query($conn, $query);
	$query = "SELECT * FROM `offers` WHERE `id` = '$id'";
	$result = mysqli_query($conn, $query);
	$item = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
	unlink('../'.$item['image']);
	$query = "DELETE FROM `offers` WHERE `offers`.`id` = '$id'";
	mysqli_query($conn, $query);
	header("Location: $admin_change");
	exit;
}

if(isset($_POST['offer_plus-add'])){
	$offer_id = $_POST['id'];
	$name = $_POST['name'];
	$query = "INSERT INTO `offers_pluses` (`id`, `offer_id`, `name`) VALUES (NULL, '$offer_id', '$name')";
	mysqli_query($conn, $query);
	header("Location: $admin_change");
	exit;
}

if(isset($_POST['offer_plus-delete'])) {
	$id = $_POST['id'];
	$query = "DELETE FROM `offers_pluses` WHERE `id` = '$id'";
	mysqli_query($conn, $query);
	header("Location: $admin_change");
	exit;
}

if(isset($_POST['offer_plus-change'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$query = "UPDATE `offers_pluses` SET `name` = '$name' WHERE `id` = '$id'";
	mysqli_query($conn, $query);
	header("Location: $admin_change");
	exit;
}

if(isset($_POST['galery_image-add'])){
	$path = 'images/'.time().$_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], '../'.$path);
	$query = "INSERT INTO `gallery` (`id`, `image`) VALUES (NULL, '$path')";
	mysqli_query($conn, $query);
	header("Location: $admin_change");
	exit;
}

if(isset($_POST['image-delete'])) {
	$id = $_POST['id'];
	$query = "DELETE FROM `gallery` WHERE `id` = '$id'";
	mysqli_query($conn, $query);
	header("Location: $admin_change");
	exit;
}

if(isset($_POST['image-change'])){
	$id = $_POST['id'];
	$path = 'images/'.time().$_FILES['image']['name'];
	if (move_uploaded_file($_FILES['image']['tmp_name'], '../'.$path)) {
		$query = "SELECT * FROM `gallery` WHERE `id` = '$id'";
		$result = mysqli_query($conn, $query);
		$item = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
		unlink('../'.$item['image']);
		$query = "UPDATE `gallery` SET `image` = '$path' WHERE `id` = '$id'";
		mysqli_query($conn, $query);
	}
	header("Location: $admin_change");
	exit;
}

if(isset($_POST['news-add'])){
	$title = $_POST['title'];
	$text = $_POST['text'];
	$path = 'images/'.time().$_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], '../'.$path);
	$query = "INSERT INTO `news` (`id`, `title`, `text`, `image`) VALUES (NULL, '$title', '$text', '$path')";
	mysqli_query($conn, $query);
	header("Location: $admin_change");
	exit;
}

if(isset($_POST['news-delete'])){
	$id = $_POST['id'];
	$query = "DELETE FROM `news` WHERE `id` = '$id'";
	mysqli_query($conn, $query);
	header("Location: $admin_change");
	exit;	
}

if(isset($_POST['news-change'])){
	$id = $_POST['id'];
	$title = $_POST['title'];
	$text = $_POST['text'];
	$path = 'images/'.time().$_FILES['image']['name'];
	if (move_uploaded_file($_FILES['image']['tmp_name'], '../'.$path)) {
		$query = "SELECT * FROM `news` WHERE `id` = '$id'";
		$result = mysqli_query($conn, $query);
		$item = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
		unlink('../'.$item['image']);
		$query = "UPDATE `news` SET `title` = '$title', `text` = '$text', `image` = '$path' WHERE `id` = '$id'";
		mysqli_query($conn, $query);
	} else{
		$query = "UPDATE `news` SET `title` = '$title', `text` = '$text' WHERE `id` = '$id'";
		mysqli_query($conn, $query);
	}
	header("Location: $admin_change");
	exit;
}