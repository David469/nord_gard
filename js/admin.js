function changeData(object, index) {
	parentHTML = object.parentNode.parentNode.parentNode.parentNode.children; 
	index = index*2;
	view = parentHTML[index];
	form = parentHTML[index+1];
	// view = object.parentNode.parentNode.parentNode;
	// form = object.parentNode.parentNode.parentNode.nextElementSibling;
	view.classList.toggle("js-hidden");
	form.classList.toggle("js-hidden");
};

function changeDataInsertedTable(object, index) {
	parentHTML = object.parentNode.parentNode.parentNode.parentNode.children; 
	index = index*3;
	view = parentHTML[index];
	form = parentHTML[index+1];
	// view = object.parentNode.parentNode.parentNode;
	// form = object.parentNode.parentNode.parentNode.nextElementSibling;
	view.classList.toggle("js-hidden");
	form.classList.toggle("js-hidden");
};

function showPluses(object, index) {
	object.nextElementSibling.classList.toggle("js-hidden");
	object.nextElementSibling.nextElementSibling.nextElementSibling.classList.toggle("js-hidden");
	parentHTML = object.parentNode.parentNode.parentNode.parentNode.children; 
	index = index*3;
	view = parentHTML[index+2];
	view.classList.toggle("js-hidden");
};