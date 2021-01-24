buttonCallPopup = document.getElementById('modalCallBtn');
buttonIconCallPopup = document.getElementById('phone');
buttonMessagePopup = document.getElementById('modalMessageBtn')

function callPopup() {
	header.insertAdjacentHTML('afterbegin', 
		`<div id="modal" class="modal">
			<div class="modal-content container">
				<div>
					<span class="close" id="close"><img src="icons/close.png" alt=""></span>
					<h2 class="title">Заказать <span>Звонок</span></h2>
					<form method="POST" action="php/requests.php">
						<p>
							<input type="text" name="name" placeholder="Ваше имя" class="field-input" required>
						</p>
						<p>
							<input type="text" name="number" placeholder="Номер телефона" class="field-input" required>
						</p>
						<button type="submit" name="submit_call" class="btn btn-green">Отправить заявку</button>
					</form>
					<div class="check">
						<img src="icons/check.png" alt="">
						<p>Нажимая кнопку «Отправить», я даю согласие на обработку моих персональных данных</p>
					</div>
				</div>
			</div>
		</div>`);
	modal = document.getElementById('modal');
	modal.style.display = "flex";
	close = document.getElementById('close');
	close.onclick = function() {
		modal.style.display = "none";
		modal.remove();
	}
}

buttonIconCallPopup.onclick = function() {
	callPopup();
}

buttonCallPopup.onclick = function() {
	callPopup();
}

function messagePopup() {
	input = document.getElementById('phone_number').value;
	main.insertAdjacentHTML('afterbegin', 
		`<div id="modal" class="modal">
			<div class="modal-content container">
				<div>
					<span class="close" id="close"><img src="icons/close.png" alt=""></span>
					<h2 class="title">Задать <span>вопрос</span></h2>
					<form method="POST" action="php/requests.php">
						<p>
							<input type="text" name="name" placeholder="Ваше имя" class="field-input" required>
						</p>
						<p>
							<input type="text" name="number" placeholder="Номер телефона" class="field-input" required value="${input}">
						</p>
						<p>
							<input type="text" name="message" placeholder="Сообщение" class="field-input" required>
						</p>
						<button type="submit" name="submit_message" class="btn btn-green">Отправить заявку</button>
					</form>
					<div class="check">
						<img src="icons/check.png" alt="">
						<p>Нажимая кнопку «Отправить», я даю согласие на обработку моих персональных данных</p>
					</div>
				</div>
			</div>
		</div>`);
	modal = document.getElementById('modal');
	modal.style.display = "flex";
	close = document.getElementById('close');
	close.onclick = function() {
		modal.style.display = "none";
		modal.remove();
	}
}

buttonMessagePopup.onclick = function() {
	messagePopup();
}

function modalBtn(id, area, price, price_per_hundred, image, description) {
	main.insertAdjacentHTML('afterbegin', 
		`<div id="modalOffers" class="modal">
			<div class="modal-content container">
				<img src="${image}" alt="">
				<div>
					<span class="close" id="closeModalOffer"><img src="icons/close.png" alt=""></span>
					<h2>Участок №${id}</h2>
					<div class="values">
						<p>Площадь: <span>${area}</span></p>
						<p>Цена: <span>${price}</span></p>
						<p>Стоимость сотки: <span>${price_per_hundred}</span></p>
					</div>
					<hr>
					<p>${description}</p>
					<div id="pluses" class="pluses">
					</div>
					<button class="btn btn-yellow" onclick="" id="modalMessageBtnSecond">Задать вопрос</button>
				</div>
			</div>
		</div>`);
	fake_pluses = pluses[id-1];
	fake_pluses.forEach((pluse)=>{
		document.getElementById('pluses').innerHTML +=`
		<div><img src="icons/check.png" alt="">${pluse.name}</div>
		`
	})
	modal = document.getElementById('modalOffers');
	modal.style.display = "flex";
	close = document.getElementById('closeModalOffer');
	close.onclick = function() {
		modal.style.display = "none";
		modal.remove();
	}
}

function modalGallery(img){
	main.insertAdjacentHTML('afterbegin', 
		`<div id="modalPhotos" class="modal">
			<div class="modal-content container">
				<img src="${img}" alt="" class="modal-photo">
				<span class="close" id="closeModalOffer"><img src="icons/close.png" alt=""></span>
			</div>
		</div>`);
	modal = document.getElementById('modalPhotos');
	modal.style.display = "flex";
	close = document.getElementById('closeModalOffer');
	close.onclick = function() {
		modal.style.display = "none";
		modal.remove();
	}
}

function showNavigation(){
	header = document.getElementById('header');
	nav = document.getElementById('nav');
	burger = document.getElementById('burger');
	header.classList.toggle("active");
	nav.classList.toggle("active");
	burger.classList.toggle("active");
}
