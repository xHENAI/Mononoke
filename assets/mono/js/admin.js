
jQuery(".themesia-panel ul.nav-tabs li").on('click', function(){
	jQuery(".themesia-panel ul.nav-tabs li").removeClass("active");
	jQuery(".tab-pane").removeClass("active");
	var id = jQuery(this).find("a");
	id = id.attr("href");
	jQuery(id).addClass('active');
	jQuery(this).addClass('active');
	return false;
});

if (window.localStorage && window.location.search.indexOf('?page=dashboard') === 0 && jQuery(".themesia-panel ul.nav-tabs li").length > 1 && jQuery(".themesia-panel #submit").length > 0 && jQuery(".themesia-panel ul.nav-tabs li.active a").length > 0){
	var tsdblsname = "tsdb_lasttab";
	var tsdbls_lasttab = window.localStorage.getItem(tsdblsname);
	window.localStorage.removeItem(tsdblsname);
	if (tsdbls_lasttab){
		jQuery(`.themesia-panel ul.nav-tabs li a[href='${tsdbls_lasttab}']`).parent().trigger('click');
	}
	jQuery(".themesia-panel #submit").on('click', function(){
		var chref = jQuery(".themesia-panel ul.nav-tabs li.active a").attr('href');
		window.localStorage.setItem(tsdblsname, chref);
	});
}

