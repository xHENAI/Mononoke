function ts_extract_epls() {
	var li = $(".eplister ul li");
	if (li.length < 1) return [];
	var data = [];
	li.each(function (k, v) {
		v = jQuery(v);
		var tmp = {};
		tmp.episode = v.find('.epl-num').text();
		tmp.title = v.find('.epl-title').text();
		tmp.link = v.find("a").get(0).href;
		data.push(tmp);
	});
	return data;
}
function ts_set_first_ep() {
	var e = jQuery('.epcur.epcurfirst');
	if (e.length < 1) return;
	var v = ts_extract_epls();
	if (v.length < 1) return;
	if (v.length < 2) {
		jQuery('.lastend').hide();
		return;
	}
	v = v.pop();
	e.parent().attr('href', v.link);
	e.html('Episode ' + v.episode);
}
function loadMi(el) {
	if (el.value.length < 1) return false;
	el.value && (document.getElementById('pembed').innerHTML = atob(el.value));
	document.querySelector(".mirror>option").setAttribute('disabled', 'disabled');
	return true;
}
function getSiteLogo() {
	var el = jQuery(".logos img[itemprop]");
	if (el.length < 1) return false;
	return el.attr('src');
}
function updateFooterLogo() {
	var newSrc = getSiteLogo();
	var theElement = jQuery(".footer-logo img");
	if (theElement.length < 1) return false;
	if (newSrc == theElement.attr('src')) return true;
	if (!newSrc) return false;
	theElement.attr('src', newSrc);
}
function tsUpdateView(post_id) {
	jQuery(document).ready(function () {
		jQuery.ajax({
			url: ajaxurl,
			type: 'post',
			data: {
				action: 'dynamic_view_ajax',
				"post_id": post_id
			},
			success: function (response) {
				if (typeof (response) === typeof ({})) {
					if ("views" in response) {
						jQuery("#ts-ep-view").html(response.views);
					}
				}
			}
		});
	});
}

var ts_ajax_cache_buster = {
	param: {},
};
ts_ajax_cache_buster.run = function(param){
	this.param = param;
	ts_ajax_cache_buster.get();
}
ts_ajax_cache_buster.get = function(){
	jQuery.getJSON(this.param.url + "?time=" +this.param.time)
	.done(function(data){
		if (typeof(data) !== typeof({})) return;
		if ("content" in data === false) return;
		jQuery("span.ts-ajax-cache[data-id='" + data.self + "']").html(data.content);
	})
	.fail(function(){

	});
}