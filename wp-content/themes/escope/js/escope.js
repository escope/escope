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

function fbs_click(u, t) {
	window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
	return false;
}

function tw_click(u, t) {
	window.open('http://twitter.com/share?url='+encodeURIComponent(u)+'&text='+encodeURIComponent(t),'twitter','toolbar=0,status=0,width=626,height=436');
	return false;
}