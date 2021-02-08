<?php
require('php/connect.php');
session_start();
?>

<?php include('inc/head.php'); ?>

<link rel="stylesheet" type="text/css" href="styles/style__admin.css">
<link rel="stylesheet" href="styles/style.css">
</head>
<body class="body_center">
	<header></header>
	<main>
		<div class="container">
			<form action="php/requests.php" method="POST" class="admin-form admin-form_width">
				<h2>Панель администратора</h2>
				<p><input type="text" class="field-input" placeholder="Логин" required name="login"></p>
				<p><input type="password" class="field-input" placeholder="Пароль" required name="password"></p>
				<?php if(isset($_SESSION['message'])) :?>
				<p class="message message-alert">
					<?php 
					echo $_SESSION['message']; 
					unset($_SESSION['message']);
					?>
				</p>
				<?php endif; ?>
				<button type="submit" name="submit-admin" class="btn btn-green btn-100">Зайти</button>
			</form>
		</div>
	</main>
</body>
</html>
