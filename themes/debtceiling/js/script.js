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
				// alert($.cookie('btdc'));	
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
	
	$('.quiz-answer').hide().removeClass('hidden');
	$('.quiz-option').quiz();
	
	
	// quiz stuff
	$('input:radio').checkbox({
		empty:'/themes/debtceiling/images/empty.png'
	});
	// $('input:radio').click(function(e){
	// 
	// 	if(!$('#quiz-answer'+vote).is(':visible')) {
	// 		$('#quiz-answer'+vote).show("slow");
	// 	}
	// })
});


(function($){
 
    $.fn.extend({ 
         
        //pass the options variable to the function
        quiz: function(options) {
 
 
            //Set the default values, use comma to separate the settings, example:
            var defaults = {
                answerIdRoot: '#quiz-answer'
            }
                 
            var options =  $.extend(defaults, options);
 
            return this.each(function() {
                var o = options;
								var obj = $(this);
								var checkbox = $('input:radio', obj);
								var selected = false;
																
								checkbox.click(function(e) {
									console.log("click");
									if(!selected) {
										selected = true;
										obj.addClass('selected');
										var vote = $(this).val();
										if(!$.cookie('ivoted')) {
											ip.ip(function(response) {
												quiz.vote(vote, response.ip);
												$.cookie('ivoted', vote);
											});											
										}
										obj.siblings().hide("fast");
										
										// show answer
										answer = $(options.answerIdRoot+vote);
										if(!answer.is(':visible')) { answer.show('slow'); }
									} else {
										e.preventDefault();
									}
								});
            });
        }
    });
     
})(jQuery);













