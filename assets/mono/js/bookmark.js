var BOOKMARK = {};
BOOKMARK.max = max_bookmark;
BOOKMARK.checkLocalStorage = function() {
	return typeof (Storage) === "function";
};
BOOKMARK.storeLocalStorage = function(name, data) {
	if (false == BOOKMARK.checkLocalStorage())
		return false;
	return localStorage.setItem(name, JSON.stringify(data));
};
BOOKMARK.getLocalStorage = function(name) {
	if (typeof name === undefined)
		return false;
	if (false == BOOKMARK.checkLocalStorage())
		return false;
	if (name in localStorage === false)
		return false;
	return JSON.parse(localStorage[name]);
};
BOOKMARK.getStored = function(){
	var bookmarks = BOOKMARK.getLocalStorage("bookmark");
	if (false == bookmarks) return [];
	if (typeof(bookmarks) !== typeof([])) return [];
	else return bookmarks;
	
};
BOOKMARK.find = function(id){
	if (false == BOOKMARK.checkLocalStorage()){
		return false;
	}
	var stored = BOOKMARK.getStored(); 
	var index = stored.indexOf(id);
	return index;
};
BOOKMARK.remove = function(id){
	if (false == BOOKMARK.checkLocalStorage()){
		return false;
	}
	var stored = BOOKMARK.getStored(); 
	var index = stored.indexOf(id);
	if (index === -1) return true; 
	stored.splice(index,1);
	BOOKMARK.storeLocalStorage("bookmark", stored);
	jQuery.post(ajaxurl, {"action": "bookmark_remove","id": id});
	return true;
	
	
};
BOOKMARK.push = function(id){
	if (false == BOOKMARK.checkLocalStorage()){
		alert('Maaf, browser anda tidak mendukung fitur ini.\nGunakan browser google chrome / mozilla');
		return false;
	}
	if (isNaN(id)) return false;
	var stored = BOOKMARK.getStored();
	if (stored.length >= BOOKMARK.max) {
		stored = stored.slice(-BOOKMARK.max);
		BOOKMARK.storeLocalStorage("bookmark", stored);
		alert("Maaf, anda mencapai batas bookmark, \nsilahkan hapus anime lain dari bookmark");
		return false;
	}
	if (stored.indexOf(id) !== -1){
		return true;
	}
	stored.unshift(id);
	BOOKMARK.storeLocalStorage("bookmark", stored);
	jQuery.post(ajaxurl, {"action": "bookmark_push", "id": id});
	return true;
};
BOOKMARK.check = function(){
	var BMEl = jQuery("div.bookmark[data-id]");
	if (BMEl.length < 1) return false;
	var id = BMEl.get(0).getAttribute('data-id');
	if (isNaN(id)) return false;  
	var bindex = BOOKMARK.find(id);
	if ( !isNaN(bindex) && bindex !== -1){
		BMEl.html('<i class="fas fa-bookmark" aria-hidden="true"></i> Bookmarked');
		BMEl.addClass('marked');
		return true;
	}else{
		BMEl.html('<i class="far fa-bookmark" aria-hidden="true"></i> Bookmark');
		BMEl.removeClass('marked');
		return false;
	}
};
BOOKMARK.listener = function(){
	var BMEl = jQuery("div.bookmark[data-id]");
	if (BMEl.length < 1) return false;
	BMEl.on('click', function(){
		var id = this.getAttribute('data-id');
		if (isNaN(id)) return false;  
		if (BOOKMARK.find(id) === -1){
			BOOKMARK.push(id);
		}else{
			BOOKMARK.remove(id);
		}
		BOOKMARK.check();
		return true;
	});
};