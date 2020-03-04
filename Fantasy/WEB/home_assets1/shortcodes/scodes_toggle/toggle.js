/* dCodes Framework */
// <![CDATA[
jQuery(function($) {
	$('a.js_hs_a').click(function () {
		$(this).parents('.js_hide_gadget').children('.js_hide_box').slideToggle('slow');
		if ($(this).parents('.js_hide_gadget').hasClass('js_minimized')) {
			$(this).parents('.js_hide_gadget').removeClass('js_minimized');
		} else {
			$(this).parents('.js_hide_gadget').addClass('js_minimized');
		}
		return false;
	});
});
// ]]>