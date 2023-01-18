function tsMedia(x) {
  if (x.matches) {
    jQuery("#singlepisode").appendTo(jQuery("#mobilepisode"));
  } else {
  	jQuery("#singlepisode").prependTo(jQuery("#mainepisode"));
  }
  tsMediaPickList();
	
}
function tsMediaSetEpNow(){
	jQuery(document).find("#singlepisode .headlist .det em.epnow").replaceWith(tsMediaEpNow||"?");
	tsMediaSetEpNow = function(){};
}
function tsMediaPickList(){
	jQuery(document).find(".episodelist ul li").each(function(k,v){
		var elid = v.getAttribute('data-id');
		if (elid == tsMediaSelectedId){
			v.className = "selected";
			v.setAttribute('selected',"selected");
		}
	});
	tsMediaShowItem();
	tsMediaSetPlayIcon();
	tsMediaSetEpNow();
}
function tsMediaShowItem(){
	var epHighLightTarget = jQuery(document).find(".episodelist ul li.selected").get(0);
	epHighLightTarget.parentNode.scrollTop = epHighLightTarget.offsetTop - $(epHighLightTarget).height();
}
function tsMediaSetPlayIcon(){
	var tpl = '<div class="nowplay"><i class="far fa-play-circle"></i></div>';
	jQuery(document).find('.episodelist ul li .thumbnel .nowplay').remove();
	jQuery(document).find(".episodelist ul li.selected .thumbnel").append(tpl);
}
var tsmmedia = matchMedia("(max-width: 880px)");
tsmmedia.addListener(tsMedia);