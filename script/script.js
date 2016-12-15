window.addEventListener("load", function(){
	var load_screen = document.getElementById("load_screen");
	document.body.removeChild(load_screen);
});

console.log('%c HEJ Webbutvecklare, GILLAR DU VAD DU SER? skicka ett mail på info@ekihlberg.se ', 'background: #333; color: #efefef ; font-size: 20px; font-weight:bold');

jQuery('.navTrigger').click(function(){
  jQuery(this).toggleClass('active');

});
var status;

jQuery('#arrow').click(function(){
 sessionStorage.setItem("status","upp");
console.log(sessionStorage.status);
status = sessionStorage.status;
console.log(status);
	});

jQuery('#arrow').click(function(){

	if(jQuery("#arrow").hasClass("fa-angle-up")){
		jQuery("#arrow").attr('class', 'fa fa-angle-down');
	}else{
	jQuery("#arrow").attr('class', 'fa fa-angle-up');
	}



	jQuery('.toppart').toggleClass('hide1');
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
