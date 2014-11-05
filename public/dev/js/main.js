var changeClass = function (r, className1, className2) {

	var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");

	if( regex.test(r.className) ) {
		r.className = r.className.replace(regex,' '+className2+' ');
	}
	else{
		r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
	}
	return r.className;
};

//  Creating our button in JS for smaller screens
var menuElements = document.getElementById('menu');
menuElements.insertAdjacentHTML('afterBegin',
	'<li><a href="#" alt="menu" id="menutoggle" class="navtoggle" aria-hidden="true"><span class="icon"><i aria-hidden="true" class="icon-menu"></i></span></a></li>');

var changeVisibility = function () {
	var menuItems = menuElements.getElementsByTagName('li');
	var num = menuItems.length;
	var menuIcons = menuItems.getElementsByTagName('a');
	for (var i = 0; i < num; i++) {
		//menuIcons[i] = menuItems.getElementsByTagName('a');
		if ( menuIcons[i].style.display  === 'none' ) {
			menuIcons[i].style.display = 'inline-block';
		}
		else {
			menuIcons[i].style.display  = 'none';
		}
	}
};

//  Toggle the class on click to show / hide the menu
document.getElementById('menutoggle').onclick = function() {
	changeClass(this, 'navtoggle active', 'navtoggle');
	changeVisibility();
};

// http://tympanus.net/codrops/2013/05/08/responsive-retina-ready-menu/comment-page-2/#comment-438918
// document.onclick = function(e) {
// 	var mobileButton = document.getElementById('menutoggle'),
// 	buttonStyle =  mobileButton.currentStyle ? mobileButton.currentStyle.display : getComputedStyle(mobileButton, null).display;

// 	if(buttonStyle === 'block' && e.target !== mobileButton && new RegExp(' ' + 'active' + ' ').test(' ' + mobileButton.className + ' ')) {
// 		changeClass(mobileButton, 'navtoggle active', 'navtoggle');
// 	}
// };
