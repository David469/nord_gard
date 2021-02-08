<?php
require('../php/connect.php');
require('../php/queries.php');
session_start();
?>

<?php include('../inc/head.php'); ?>

<link rel="stylesheet" type="text/css" href="../styles/style__admin.css">
</head>

<body>
	<?php if (isset($_SESSION['admin'])) : ?>
		<?php include('inc/header.php') ?>
		<main>
			<div class="container">
				<div class="about" id="about">
					<div class="top caption">
						<h1 class="caption__title">О посёлке</h1>
					</div>
					<div class="about__table table">
						<div class="thead">
							<div class="tr">
								<span class="th">ID</span>
								<span class="th">Заголовок</span>
								<span class="th">Описание</span>
								<span class="th">Картинка</span>
								<span class="th"></span>
							</div>
						</div>
						<div class="tbody">
							<?php foreach ($advantages as $key => $advantage) : ?>
								<div class="tr">
									<span class="td"><?php echo $advantage['id'] ?></span>
									<span class="td"><?php echo $advantage['title'] ?></span>
									<span class="td table__text"><?php echo $advantage['text'] ?></span>
									<span class="td table__image">
										<img src="../<?php echo $advantage['image'] ?>" alt="" class="table__image">
									</span>
									<span class="td">
										<form action="../php/requests.php" method="POST" class="table__buttons">
											<button type="button" onclick="changeData(this, '<?php echo ($key) ?>')">Изменить</button>
											<input type="text" name="id" value="<?php echo ($advantage['id']) ?>" hidden>
											<button type="submit" name="advantage-delete">Удалить</button>
										</form>
									</span>
								</div>
								<form class="tr js-hidden" action="../php/requests.php" method="POST" enctype="multipart/form-data">
									<input type="text" name="id" value="<?php echo ($advantage['id']) ?>" hidden>
									<span class="td"><?php echo $advantage['id'] ?></span>
									<span class="td">
										<input type="text" name="title" value="<?php echo $advantage['title'] ?>">
									</span>
									<span class="td">
										<textarea name="text" cols="30" rows="10"><?php echo $advantage['text'] ?></textarea>
									</span>
									<span class="td table__image">
										<img src="../<?php echo $advantage['image'] ?>" alt="" class="table__image">
										<input type="file" name="image">
									</span>
									<span class="td">
										<div class="table__buttons">
											<button type="submit" name="advantage-change">
												Изменить
											</button>
											<button type="button" onclick="changeData(this, '<?php echo ($key) ?>')">Отмена</button>
										</div>
									</span>
								</form>
							<?php endforeach ?>
							<form class="tr" action="../php/requests.php" method="POST" enctype="multipart/form-data">
								<span class="td"><?php echo $advantage['id'] + 1 ?></span>
								<span class="td">
									<input type="text" name="title" required>
								</span>
								<span class="td">
									<textarea name="text" cols="30" rows="10" required></textarea>
								</span>
								<span class="td table__image">
									<input type="file" name="image" required>
								</span>
								<span class="td">
									<div class="table__buttons">
										<button type="submit" name="advantage-add">Добавить</button>
									</div>
								</span>
							</form>
						</div>
					</div>
				</div>
				<div class="offers" id="offers">
					<div class="top caption">
						<h1 class="caption__title">Предложения</h1>
					</div>
					<div class="about__table table table__inserted">
						<div class="thead">
							<div class="tr">
								<span class="th">ID</span>
								<span class="th">Площадь</span>
								<span class="th">Цена</span>
								<span class="th">Цена за сотку</span>
								<span class="th">Описание</span>
								<span class="th">Картинка</span>
								<span class="th"></span>
							</div>
						</div>
						<div class="tbody">
							<?php foreach ($offers as $key => $offer) : ?>
								<div class="tr">
									<span class="td"><?php echo $offer['id'] ?></span>
									<span class="td"><?php echo $offer['area'] ?></span>
									<span class="td"><?php echo $offer['price'] ?></span>
									<span class="td"><?php echo $offer['price_per_hundred'] ?></span>
									<span class="td table__text"><?php echo $offer['description'] ?></span>
									<span class="td table__image">
										<img src="../<?php echo $offer['image'] ?>" alt="" class="table__image">
									</span>
									<span class="td">
										<form action="../php/requests.php" method="POST" class="table__buttons">
											<button type="button" onclick="showPluses(this, '<?php echo ($key) ?>')">↓</button>
											<button type="button" onclick="changeDataInsertedTable(this, '<?php echo ($key) ?>')">Изменить</button>
											<input type="text" name="id" value="<?php echo ($offer['id']) ?>" hidden>
											<button type="submit" name="offer-delete">Удалить</button>
										</form>
									</span>
								</div>
								<form class="tr js-hidden" action="../php/requests.php" method="POST" enctype="multipart/form-data">
									<input type="text" name="id" value="<?php echo ($offer['id']) ?>" hidden>
									<span class="td"><?php echo $offer['id'] ?></span>
									<span class="td">
										<input type="text" name="area" value="<?php echo $offer['area'] ?>">
									</span>
									<span class="td">
										<input type="text" name="price" value="<?php echo $offer['price'] ?>">
									</span>
									<span class="td">
										<input type="text" name="price_per_hundred" value="<?php echo $offer['price_per_hundred'] ?>">
									</span>
									<span class="td">
										<textarea name="description" cols="30" rows="10"><?php echo $offer['description'] ?></textarea>
									</span>
									<span class="td table__image">
										<img src="../<?php echo $offer['image'] ?>" alt="" class="table__image">
										<input type="file" name="image">
									</span>
									<span class="td">
										<div class="table__buttons">
											<button type="submit" name="offer-change">
												Изменить
											</button>
											<button type="button" onclick="changeDataInsertedTable(this, '<?php echo ($key) ?>')">Отмена</button>
										</div>
									</span>
								</form>
								<div class="pluses__table js-hidden">
									<div class="thead">
										<div class="tr">
											<span class="th">ID</span>
											<span class="th">Описание</span>
											<span class="th"></span>
										</div>
									</div>
									<div class="tbody">
										<?php
										$query = 'SELECT * FROM `offers_pluses` WHERE `offer_id` = ' . $offer['id'];
										$result = mysqli_query($conn, $query);
										$pluses = mysqli_fetch_all($result, MYSQLI_ASSOC);
										mysqli_free_result($result);
										?>
										<?php foreach ($pluses as $key => $plus) : ?>
											<div class="tr">
												<span class="td"><?php echo $plus['id'] ?></span>
												<span class="td"><?php echo $plus['name'] ?></span>
												<span class="td">
													<form action="../php/requests.php" method="POST" class="table__buttons">
														<button type="button" onclick="changeData(this, '<?php echo ($key) ?>')">Изменить</button>
														<input type="text" name="id" value="<?php echo ($plus['id']) ?>" hidden>
														<button type="submit" name="offer_plus-delete">Удалить</button>
													</form>
												</span>
											</div>
											<form class="tr js-hidden" action="../php/requests.php" method="POST" enctype="multipart/form-data">
												<input type="text" name="id" value="<?php echo $plus['id'] ?>" hidden>
												<span class="td"><?php echo $plus['id'] ?></span>
												<span class="td">
													<input type="text" name="name" value="<?php echo $plus['name'] ?>">
												</span>
												<span class="td">
													<div class="table__buttons">
														<button type="submit" name="offer_plus-change">
															Изменить
														</button>
														<button type="button" onclick="changeData(this, '<?php echo ($key) ?>')">Отмена</button>
													</div>
												</span>
											</form>
										<?php endforeach ?>
										<form class="tr" action="../php/requests.php" method="POST" enctype="multipart/form-data">
											<span class="td"><?php echo $plus['id'] + 1 ?></span>
											<span class="td">
												<input type="text" name="name" required>
											</span>
											<span class="td">
												<div class="table__buttons">
												<input type="text" name="id" value="<?php echo ($offer['id']) ?>" hidden>
													<button type="submit" name="offer_plus-add">Добавить</button>
												</div>
											</span>
										</form>
									</div>
								</div>
							<?php endforeach ?>
							<form class="tr" action="../php/requests.php" method="POST" enctype="multipart/form-data">
								<span class="td"><?php echo $offer['id'] + 1 ?></span>
								<span class="td">
									<input type="text" name="area" placeholder="Площадь" required>
								</span>
								<span class="td">
									<input type="text" name="price" placeholder="Цена" required>
								</span>
								<span class="td">
									<input type="text" name="price_per_hundred" placeholder="Цена за сотку" required>
								</span>
								<span class="td">
									<textarea name="description" placeholder="Описание" cols="30" rows="10"></textarea>
								</span>
								<span class="td table__image">
									<input type="file" name="image">
								</span>
								<span class="td">
									<div class="table__buttons">
										<button type="submit" name="offer-add">Добавить</button>
									</div>
								</span>
							</form>
						</div>
					</div>
				</div>
				<div class="galery" id="galery">
					<div class="top caption">
						<h1 class="caption__title">Галерея</h1>
					</div>
					<div class="galery__table table">
						<div class="thead">
							<div class="tr">
								<span class="th">ID</span>
								<span class="th">Картинка</span>
								<span class="th"></span>
							</div>
						</div>
						<div class="tbody">
							<?php foreach ($gallery_images as $key => $image) : ?>
								<div class="tr">
									<span class="td"><?php echo $image['id'] ?></span>
									<span class="td table__image">
										<img src="../<?php echo $image['image'] ?>" alt="" class="table__image">
									</span>
									<span class="td">
										<form action="../php/requests.php" method="POST" class="table__buttons">
											<button type="button" onclick="changeData(this, '<?php echo ($key) ?>')">Изменить</button>
											<input type="text" name="id" value="<?php echo ($image['id']) ?>" hidden>
											<button type="submit" name="image-delete">Удалить</button>
										</form>
									</span>
								</div>
								<form class="tr js-hidden" action="../php/requests.php" method="POST" enctype="multipart/form-data">
									<input type="text" name="id" value="<?php echo ($image['id']) ?>" hidden>
									<span class="td"><?php echo $image['id'] ?></span>
									<span class="td table__image">
										<img src="../<?php echo $image['image'] ?>" alt="" class="table__image">
										<input type="file" name="image">
									</span>
									<span class="td">
										<div class="table__buttons">
											<button type="submit" name="image-change">
												Изменить
											</button>
											<button type="button" onclick="changeData(this, '<?php echo ($key) ?>')">Отмена</button>
										</div>
									</span>
								</form>
							<?php endforeach ?>
							<form class="tr" action="../php/requests.php" method="POST" enctype="multipart/form-data">
								<span class="td"><?php echo $image['id'] + 1 ?></span>
								<span class="td table__image">
									<input type="file" name="image" required>
								</span>
								<span class="td">
									<div class="table__buttons">
										<button type="submit" name="galery_image-add">Добавить</button>
									</div>
								</span>
							</form>
						</div>
					</div>
				</div>
				<div class="news" id="news">
					<div class="top caption">
						<h1 class="caption__title">Новости</h1>
					</div>
					<div class="news__table table">
						<div class="thead">
							<div class="tr">
								<span class="th">ID</span>
								<span class="th">Заголовок</span>
								<span class="th">Текст</span>
								<span class="th">Картинка</span>
								<span class="th"></span>
							</div>
						</div>
						<div class="tbody">
							<?php foreach ($all_news as $key => $news) : ?>
								<div class="tr">
									<span class="td"><?php echo $news['id'] ?></span>
									<span class="td"><?php echo $news['title'] ?></span>
									<span class="td"><?php echo $news['text'] ?></span>
									<span class="td table__image">
										<img src="../<?php echo $news['image'] ?>" alt="" class="table__image">
									</span>
									<span class="td">
										<form action="../php/requests.php" method="POST" class="table__buttons">
											<button type="button" onclick="changeData(this, '<?php echo ($key) ?>')">Изменить</button>
											<input type="text" name="id" value="<?php echo ($news['id']) ?>" hidden>
											<button type="submit" name="news-delete">Удалить</button>
										</form>
									</span>
								</div>
								<form class="tr js-hidden" action="../php/requests.php" method="POST" enctype="multipart/form-data">
									<input type="text" name="id" value="<?php echo ($news['id']) ?>" hidden>
									<span class="td"><?php echo $news['id'] ?></span>
									<span class="td">
										<textarea name="title" cols="30" rows="10"><?php echo $news['title'] ?></textarea>
									</span>
									<span class="td">
										<textarea name="text" cols="30" rows="10"><?php echo $news['text'] ?></textarea>
									</span>
									<span class="td table__image">
										<img src="../<?php echo $news['image'] ?>" alt="" class="table__image">
										<input type="file" name="image">
									</span>
									<span class="td">
										<div class="table__buttons">
											<button type="submit" name="news-change">
												Изменить
											</button>
											<button type="button" onclick="changeData(this, '<?php echo ($key) ?>')">Отмена</button>
										</div>
									</span>
								</form>
							<?php endforeach ?>
							<form class="tr" action="../php/requests.php" method="POST" enctype="multipart/form-data">
								<span class="td"><?php echo $news['id'] + 1 ?></span>
								<span class="td">
									<textarea name="title" cols="30" rows="10" placeholder="Заголовок" required></textarea>
								</span>
								<span class="td">
									<textarea name="text" cols="30" rows="10" placeholder="Текст" required></textarea>
								</span>
								<span class="td table__image">
									<input type="file" name="image">
								</span>
								<span class="td">
									<div class="table__buttons">
										<button type="submit" name="news-add">Добавить</button>
									</div>
								</span>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
	<?php endif; ?>
	<script src="../js/admin.js">
	</script>
</body>

</html>