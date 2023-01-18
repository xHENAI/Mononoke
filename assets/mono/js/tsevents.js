jQuery(document).on('click', '.bixbox.animefull .bigcover a', function(){
    var data = ts_extract_epls();
    if (data.length < 1) return false;
    var last = data.pop();
    window.location.assign(last.link);
});
jQuery(document).one('mouseenter', '.bixbox.animefull .bigcover .ime', function(){
    var data = ts_extract_epls();
    if (data.length < 1) return false;
    var last = data.pop();
    this.setAttribute('title', last.title);
	jQuery(".bixbox.animefull .bigcover a").attr('title', last.title);
});
