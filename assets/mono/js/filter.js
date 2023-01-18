$(document).on('click','.quickfilter .dropdown-toggle',function(){
	if(!$(this).parent().hasClass('open')) {
		$(document).find('.quickfilter .filter.dropdown').removeClass('open');
	}
	$(this).parent().toggleClass('open');
});
$(document).on("click", function(event){
	if(!$(event.target).closest(".dropdown-toggle").length){
		$(document).find('.quickfilter .filter.dropdown').removeClass('open');
	}
});
jQuery(document).ready(function($) {
	$('.filters .filter ul').click(function(event) {
		event.stopPropagation();
	});
	$('.filters .filter ul').each(function(index, elem) {
		var elem_checked = $(this).find('input:checked');
		var button_span = elem_checked.closest('.filter').find("button span");
		if (elem_checked.length == 1) {
			button_span.html(elem_checked.parent().find("label").html());
		} else if (elem_checked.length > 1) {
			button_span.html(elem_checked.length + ' selected');
		} else if (elem_checked.length == 0) {
			button_span.html('All');
		}
	});
	$('.dropdown-menu input').on('click', function(e) {
		var ul_elem = $(this).parent().parent();
		var elem_checked = ul_elem.find("input:checked");
		var button_span = ul_elem.parent().find("button span");
		if (elem_checked.length == 1) {
			button_span.html(elem_checked.parent().find("label").html());
		} else if (elem_checked.length > 1) {
			button_span.html(elem_checked.length + ' selected');
		} else if (elem_checked.length == 0) {
			button_span.html('All');
		}
	});
});