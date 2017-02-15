window.addEventListener("load", function(){
	var load_screen = document.getElementById("load_screen");
	document.body.removeChild(load_screen);

});

console.log('%c HEJ Webbutvecklare, GILLAR DU VAD DU SER? skicka ett mail på info@ekihlberg.se ', 'background: #333; color: #efefef ; font-size: 20px; font-weight:bold');

jQuery('.navTrigger').click(function(){
  jQuery(this).toggleClass('active');

});
var status;

if (sessionStorage.status =='hide1') {
	jQuery('.toppart').addClass(sessionStorage.status);
}

jQuery('#arrow').click(function(){
  // console.log(sessionStorage.status);
	if (sessionStorage.status == undefined){
		sessionStorage.setItem("status","hide1");
	 	console.log(sessionStorage.status);
	 	jQuery('.toppart').addClass(sessionStorage.status);
	}
	else if (sessionStorage.status =='hide1') {
		sessionStorage.clear();
		jQuery('.toppart').removeClass('hide1');
	}




if(jQuery("#arrow").hasClass("fa-angle-up")){
 jQuery("#arrow").attr('class', 'fa fa-angle-down');
 }else{
 jQuery("#arrow").attr('class', 'fa fa-angle-up');
 }

	});

jQuery('#arrow').click(function(){




	//
	//
	//
	// jQuery('.toppart').toggleClass('hide1');


	window.scrollTo(0,0);

});

jQuery('.navTrigger').click(function(){




  jQuery('.main-menu').toggleClass('hide');

});
if (jQuery("#arrow").hasClass("hide1")) {
};



jQuery(function() {
  jQuery('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        jQuery('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
