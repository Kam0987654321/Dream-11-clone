/* dCodes Framework */

(function ($) {
	jQuery(document).ready(function () {
		doAccordion();
	});
	function doAccordion() {
		var accordions = jQuery('.dc_accordion2');
		if (accordions.length < 1) {
			return;
		}
		accordions.each(function () {
			var self = jQuery(this);
			var handlers = self.children('dt');
			handlers.click(function () {
				var self = jQuery(this);
				self.children('dt.current').removeClass('current').next().slideUp();
				self.toggleClass('current');
				self.next('dd').slideToggle();
			});
		});
	}
}(jQuery));
// <![CDATA[
$(function () {
	$('.dc_toggle').addClass('dc_hide');
	$('.dc_toggle.dc_show').removeClass('dc_hide');
	$('.dc_toggle.dc_show').children('.dc_toggle_box').css({
		'display': 'block'
	});
	$('a.dc_toggle_link').click(function () {
		$(this).parents('.dc_toggle').children('.dc_toggle_box').slideToggle('fast');
		if ($(this).parents('.dc_toggle').hasClass('dc_hide')) {
			$(this).parents('.dc_toggle').removeClass('dc_hide');
			$(this).parents('.dc_toggle').addClass('dc_show');
		} else {
			$(this).parents('.dc_toggle').addClass('dc_hide');
			$(this).parents('.dc_toggle').removeClass('dc_show');
		}
		return false;
	});
	$('.dc_acc_box').addClass('dc_hide');
	$('.dc_acc_box.dc_show').removeClass('dc_hide');
	$('.dc_acc_box.dc_show').children('.dc_toggle_box').css({
		'display': 'block'
	});
	$('a.dc_acc_link').click(function () {
		if ($(this).parents('.dc_acc_box').hasClass('dc_show')) {
			return false;
		}
		$(this).parents('.dc_acc').children('.dc_show').children('.dc_toggle_box').slideToggle('fast');
		$(this).parents('.dc_acc').children('.dc_show').addClass('dc_hide');
		$(this).parents('.dc_acc').children('.dc_show').removeClass('dc_show');
		$(this).parents('.dc_acc_box').children('.dc_toggle_box').slideToggle('fast');
		$(this).parents('.dc_acc_box').addClass('dc_show');
		$(this).parents('.dc_acc_box').removeClass('dc_hide');
		return false;
	});
});
$(document).ready(function () {
	$('.toggleCollapse').on("click", function () {
		var selector = "." + $(this).attr("rel");
		if ($(this).text() == "expand all") {
			$(selector).each(function () {
				if ($(this).hasClass("dc_hide")) $(this).find("a.dc_toggle_link").click();
			});
			$(this).text("shrink all")
		} else {
			$(selector).each(function () {
				if ($(this).hasClass("dc_show")) $(this).find("a.dc_toggle_link").click();
			});
			$(this).text("expand all")
		}
	});
});
// ]]>