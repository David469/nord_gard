<?php
require('php/connect.php');
require('php/queries.php');
?>


<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>NordGard</title>
	<link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
	<?php include('inc/header.php'); ?>
	<main id="main">
		<div class="back-gray head">
			<div class="container">
				<img src="images/tree_1.png" alt="" class="decoration">
				<div class="about">
					<div class="text">
						<h2 class="title">О коттеджном поселке <br> <span>“Норд Гард”</span></h2>
						<p class="description">Коттеджный поселок для жизни и отдыха в экологически чистом районе Ленинградской области на берегу реки Невы.</p>
					</div>
					<button class="btn btn-green">Смотреть панораму</button>
				</div>
			</div>
		</div>
		<div class="container advantages-map">
			<div class="advantages">
				<?php foreach($advantages as $advantage) { ?>
				<div class="advantages-item">
					<div>
						<img src="<?php echo $advantage['image'] ?>" alt="">
						<div class="line"></div>
					</div>
					<h4><?php echo $advantage['title'] ?></h4>
					<p><?php echo $advantage['text'] ?></p>
				</div>
				<?php } ?>
			</div>
			<!-- <div class="map">
				<img src="images/map.png" alt="">
				<a href="#" class="map-link">Посмотреть на странице Яндекс.Карты</a>
			</div> -->
		</div>
		<div class="container">
			<div class="offers">
				<div class="text">
					<h2 class="title">Наши <span>предложения</span></h2>
					<button class="btn btn-black">Открыть генплан</button>
				</div>
				<div class="cards">
					<script>
						pluses = [];
					</script>
					<?php foreach($offers as $offer) { ?>
						<div class="card-item">
							<img src="<?php echo $offer['image'] ?>" alt="" class="card-img">	
							<h3 class="card-title">Участок №<?php echo $offer['id'] ?></h3>
							<div class="card-text">
								<div class="card-values">Площадь: <span><?php echo $offer['area'] ?></span></div>
								<hr class="line">
								<div class="card-values">Цена: <span><?php echo $offer['price'] ?></span></div>
							</div>
							<?php
								$query = 'SELECT * FROM `offers_pluses` WHERE `offer_id` = '.$offer['id'];
								$result = mysqli_query($conn, $query);
								$pluses = mysqli_fetch_all($result, MYSQLI_ASSOC);
								mysqli_free_result($result);
								$pluses = json_encode($pluses);
							?>
							<script>
								pluses.push(JSON.parse('<?php echo $pluses; ?>'));
								console.log(pluses);
							</script>
							<button class="btn btn-gray" onclick="modalBtn(
							'<?php echo $offer['id'] ?>', 
							'<?php echo $offer['area'] ?>', 
							'<?php echo $offer['price'] ?>', 
							'<?php echo $offer['price_per_hundred']; ?>', 
							'<?php echo $offer['image'] ?>', 
							'<?php echo $offer['description'] ?>')"
							id="modalBtn">Подробнее</button>
						</div>
					<?php } ?>
				</div>
				<div class="refresh">
					<button class="btn btn-gray btn-icon btn-refresh">
						<img src="icons/refresh.png" alt="">
						Показать еще  6 участков
					</button>
				</div>
			</div>
		</div>
		<div class="container container-app">
			<div class="application">
				<div class="form">
					<h2 class="title">Мы вам <span>Все Расскажем</span></h2>
					<p class="description">Оставьте заявку на звонок. Мы перезвоним и ответим на все ваши вопросы.</p>
					<!-- <form action=""> -->
						<p><input class="field-input" type="text" placeholder="Номер телефона" id="phone_number"></p>
						<button type="input" id="modalMessageBtn" class="btn btn-green send">Отправить заявку</button>
					<!-- </form> -->
				</div>
				<div class="video">
					
				</div>
				<img src="images/tree_2.png" alt="">
			</div>
		</div>
		<div class="galery">
			<div class="container">
				<h2 class="title">Фотогалерея</h2>
			</div>
			<div class="photos">
				<?php foreach($gallery_images as $image) { ?>
				<div>
					<img src="<?php echo $image['image'] ?>" alt="">
					<div class="over">
						<!-- <img src="icons/more.png" alt="" onclick="modalGallery()"> -->
						<img src="icons/+.png" alt="" class="plus" onclick="modalGallery('<?php echo $image['image'] ?>')">
						<img src="icons/circle.png" alt="" class="circle">
					</div>
				</div>
				<?php }?>
			</div>
		</div>
		<div class="back-gray buy-contact">
			<img src="images/tree_3.png" alt="">
			<div class="container buy">
				<h2 class="title">Способы <span>покупки</span></h2>
				<div class="buy-cards">
					<div class="buy-card">
						<div class="number"><span>01</span></div>
						<div class="wrapper">
							<h3 class="buy-card-title">Оплата 100%</h3>
							<p class="buy-card-text">
								Сделка прохиодит в три простых этапа:
								<ul>
									<li>подписание договора;</li>
									<li>внесение платежа;</li>
									<li>регистрация перехода права собственности на покупателя.</li>
								</ul>
							</p>
						</div>
					</div>
					<div class="buy-card">
						<div class="number"><span>02</span></div>
						<div class="wrapper">
							<h3 class="buy-card-title">РАССРОЧКА БЕЗ %</h3>
							<p class="buy-card-text">При внесении 50% от стоимости понравившегося вам земельного участка, мы предоставляем беспроцентную рассрочку до 6 месяцев. Возможны индивидуальные условия рассрочки.</p>
						</div>
					</div>
					<div class="buy-card">
						<div class="number"><span>03</span></div>
						<div class="wrapper">
							<h3 class="buy-card-title">ИПОТЕКА</h3>
							<p class="buy-card-text">Сделка проходит в три простых этапа: подписание договора, внесение платежа, регистрация перехода права собственности на Покупателя.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="container contact">
				<h2 class="title">Контактная <span>Информация</span></h2>
				<div>
					<div>
						<h3>+7 (999) 999-99-99</h3>
						<p>info@nordgard.ru</p>
						<p>Лен. обл., Кировский район, г.п. Павлово</p>
					</div>
					<div>
						<p>Получите консультацию и ответы на все вопросы от сотрудника отдела продаж.</p>
						<button class="btn  btn-green">Получить консультацию</button>
					</div>
				</div>
			</div>
		</div>
		<div class="container news">
			<h2 class="title">Новости</h2>
			<div>
				<?php foreach($all_news as $news): ?>
				<div class="news-item">
					<img src="<?php echo $news['image'] ?>" alt="" class="news-img">
					<div class="news-content">
						<h3 class="news-title"><?php echo $news['title'] ?></h3>
						<p class="news-text"><?php echo $news['text'] ?></p>
						<a href="#" class="news-link">Читать все <img src="icons/arrow.png" alt=""></a>
					</div>
				</div>
				<? endforeach; ?>
			</div>
		</div>
	</main>

	<?php include('inc/footer.php') ?>
	<script src="main.js">
	</script>
</body>
</html>