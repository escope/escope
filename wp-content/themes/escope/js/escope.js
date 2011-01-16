$(document).ready(function(){
	
	//Search Fld Click Functionality
	$('#s').click(function(){
		if($(this).attr("title") == $(this).attr("value")){
			$(this).attr('value', '')
		}
	});
	
	$('#s').focusout(function(){
		if($(this).attr("value") == ""){
			$(this).attr('value', $(this).attr("title"));
		}
	});
	
});

function fbs_click() {
	var u = location.href;
	var t = document.title;
	window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'Facebook Share','toolbar=0,status=0,width=626,height=436');
	return false;
}

function tw_click(t) {
	var u = location.href;
	window.open('http://twitter.com/share?url='+encodeURIComponent(u)+'&text='+encodeURIComponent(t),'Twitter','toolbar=0,status=0,width=626,height=436');
	return false;
}

function sv_click() {
	var u = location.href;
	var t = document.title;
	window.open('http://svejo.net/story/submit_by_url?url='+encodeURIComponent(u)+'&title='+encodeURIComponent(t),'Svejo', 'toolbar=no,status=0,scrollbars=1,width=auto,height=auto');
	return false;
}

function digg_click() {
	var u = location.href;
	var t = document.title;
	window.open('http://digg.com/submit?url='+encodeURIComponent(u)+'&title='+encodeURIComponent(t),'Digg','toolbar=0,status=0,width=auto,height=auto');
	return false;
}

function st_click() {
	var u = location.href;
	var t = document.title;
	window.open('http://www.stumbleupon.com/submit?url='+encodeURIComponent(u)+'&title='+encodeURIComponent(t),'Stumble','toolbar=0,status=0,width=auto,height=auto');
	return false;
}

function de_click() {
	var u = location.href;
	var t = document.title;
	window.open('http://www.delicious.com/save?v=5&noui&jump=close&url='+encodeURIComponent(u)+'&title='+encodeURIComponent(t),'delicious', 'toolbar=no,status=0,width=626,height=436');
	return false;
}

function li_click() {
	var u = location.href;
	var t = document.title;
	window.open('http://www.linkedin.com/shareArticle?mini=true&url='+encodeURIComponent(u)+'&title='+encodeURIComponent(t)+'&source='+encodeURIComponent('http://escope.eu'),'LinkedIn', 'toolbar=no,status=0,width=626,height=436');
	return false;
}