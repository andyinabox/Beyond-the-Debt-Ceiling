/* Author: 

*/

var dc = {};
dc.modules = {};


/*
 * 
 * Sort of works.  
 * 
 * This should check if the cookie is set, if so pull the location data from it and store it in JS.
 * 
 * If cookie is NOT set, grab the location data from the server, store it in JS, and set the cookie.
 * 
 */
dc.setup = {
	loc: null,
	init: function() {
		if(!$.cookie('btdc')) {
			ip.loc(function(response) {
				var loc = JSON.stringify(response);
				$.cookie('btdc', loc);
				dc.setup.loc = response;
				alert($.cookie('btdc'));	
			});
		} else {
			dc.setup.loc = $.parseJSON($.cookie('btdc')); 
		}
	}
}

var quiz = {
	vote: function(vote, ip) {
		$.getJSON('vote/add/'+vote+'/'+ip, function(response) {
			return response;
		});
	}
}


$(document).ready(function() {
	dc.setup.init();
	
	// quiz stuff
	$('input:radio').checkbox({
		empty:'/themes/debtceiling/images/empty.png'
	});
	$('input:radio').click(function(e){
		$(this).parent().siblings().hide("fast");
		var vote = $(this).val();
		ip.ip(function(response) {
			quiz.vote(vote, response.ip);
		});
	})
});
















