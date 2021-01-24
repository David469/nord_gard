<?php
$query = 'SELECT * FROM `offers`';
$result = mysqli_query($conn, $query);
$offers = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

$query = 'SELECT * FROM `advantages`';
$result = mysqli_query($conn, $query);
$advantages = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

$query = 'SELECT * FROM `gallery`';
$result = mysqli_query($conn, $query);
$gallery_images = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

$query = 'SELECT * FROM `news`';
$result = mysqli_query($conn, $query);
$all_news = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);