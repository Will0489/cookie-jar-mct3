var changeClass = function (r, className1, className2) {

	var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");

	if( regex.test(r.className) ) {
		r.className = r.className.replace(regex,''+className2+'');
	}
	else{
		r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
	}
	return r.className;
};

//  Creating our button in JS for smaller screens
// var menuElements = document.getElementById('menu');
// menuElements.insertAdjacentHTML('afterBegin',
//	'<li><a href="#" alt="menu" id="menutoggle" class="navtoggle" aria-hidden="true"><span class="icon"><i aria-hidden="true" class="icon-menu"></i></span></a></li>');

var menuElements = document.getElementById('menu');
	menuElements.insertAdjacentHTML('afterBegin','<button type="button" id="menutoggle" class="navtoggle" aria-hidden="true"><i aria-hidden="true" class="icon-menu"></i></button>');

//  Toggle the class on click to show / hide the menu
document.getElementById('menutoggle').onclick = function() {

	var menuIcons = menuElements.getElementsByTagName('a');
	var num = menuIcons.length;

	for (var i = 0; i < num; i++) {
		if (menuIcons[i].className == 'navtoggle' || menuIcons[i].className == ' navtoggle active ') {
			changeClass(this, 'navtoggle active', 'navtoggle');
		}else{
			if (menuIcons[i].className == 'show') {
				menuIcons[i].setAttribute("class", "hide");
			}else{
				menuIcons[i].setAttribute("class", "show");
			}
		}
	}
};








