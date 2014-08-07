/**
 *
 *	=================================================
 *
 *				  The main js file
 *				    23 July 2014
 *
 *	=================================================
 *
 */

$(document).ready(function(){
	/**
	 * If an element has .fadeIn class,
	 * it will fade in with a delay of
	 * 100 ms and show with a delay of
	 * 1000 ms.
	 */
	$(".fadeIn").hide(0).delay(100).fadeIn(1000);



	/**
	 * Every input with class .importantInput
	 * will change it's own border color
	 * if it's not completed. After all, if
	 * it's completed, his "style" attribute
	 * will be removed and the border will
	 * be restored to the default settings.
	 */
	$(".importantInput").change(function(){
		/**
		 * We get the input's value
		 */
		var value = $(this).val();
		/**
		 * We test if the value is empty. So,
		 * if this happens, we change it's
		 * border color in "Promegranate" color.
		 * (#c0392b)
		 */
		if( value == "" ){
			$(this).css({"border-color":"#c0392b"});
		}
		/**
		 * If the value isn't empty, we
		 * restore the input to it's
		 * default settings
		 */
		else{
			$(this).removeAttr("style");
		}
	});






	$(".parentLi a").click(function(){

		var parent = $(this).parent();
		var display = $("ul", parent).css("display");

		if(display == "none"){
			$(parent).css({"background":"#171717"});
			$("ul",parent).slideDown("fast");
		}
		else{
			$(parent).removeAttr("style");
			$("ul",parent).slideUp("fast");
		}
	});




















/**
 * End of custom.js
 */
});