/* Author: 

*/

var dc = {};

dc.util = {
	validateZipCode: function(elementValue) {
    	var zipCodePattern = /^\d{5}$/;
     	return zipCodePattern.test(elementValue);
	}
}


/**
 * Feel free to change the way this displays.  You can see the full reps object,
 * which contains all found legislators, using the js console:
 * 
 * dc.setup.reps
 * 
 */
dc.reps = {
	// Get legislators for the obtained location, insert into DOM
	getReps: function(zip) {
		// clear current rep list, show loader
		$("#reps").empty();
		$("#loading-reps").show();
		// validate zip
		if(!dc.util.validateZipCode(zip)) {
			alert("Please enter a valid zipcode.");
			return;
		}
		// set loc to entered zip
		$.cookie('btdcz', zip); 
		sl.leg.zip(zip, function(response) {
			$("#loading-reps").hide();
			dc.setup.reps = response;
			dc.setup.reps = _.sortBy(dc.setup.reps, function(item) {
				if(!_.isUndefined(item.legislator)) {
					return item.legislator.chamber;
					if(item.legislator.chamber == "senate") {
						return 1;
					} else {
						return 2;
					}
				}
			});
			_.each(dc.setup.reps, function(item) {
				if(!_.isUndefined(item.legislator)) {
					var li = "<li class='"+item.legislator.party+"'>";
					li += "<h3 class='repname'>";
					li += "<a target='_blank' href='"+item.legislator.website+"'>"
					if(item.legislator.chamber == "house") {
						li += "Representative "+item.legislator.firstname+" "+item.legislator.lastname;
					} else {
						li += "Senator "+item.legislator.firstname+" "+item.legislator.lastname;
					}
					li += " ("+item.legislator.party+"-"+item.legislator.state+")</a></h3>";
					li += "<span class='phone'>Phone: "+item.legislator.phone+"</span>";
					li += "</li>";
					/*
					<li>
						<em class="repname">Senator Herb Kohl (D-WI)</em><br/>
						<span class="phone">phone: 202-224-5653</span><br/>
						<span class="webform">contact form: <a target='_blank' class="webformhref" href="#">http://kohl.senate.gov/contact.cfm</a></span>
					</li>*/
					$("#reps").append(li);
					//alert(item.legislator.lastname);
				}
			});
		});
	} 
	
};


/*
 * This should check if the cookie is set, if so pull the location data from it and store it in JS.
 * 
 * If cookie is NOT set, grab the location data from the server, store it in JS, and set the cookie.
 * 
 */
dc.setup = {
	loc: null,
	reps: null,
	init: function() {
		if(!$.cookie('btdcz')) {
			// Add the IP param for local testing after callback function
			ip.loc(function(response) {
				//var loc = JSON.stringify(response);
				// alert(loc);
				// If a location has been found set cookie and loc object, get legislators. 
				if(response.success) {
					if(response.zipCode != "-") {
						$.cookie('btdcz', response.zipCode);
						dc.setup.loc = response.zipCode;
						$("#zip").val(dc.setup.loc);
						dc.reps.getReps(dc.setup.loc);
					}
				}
				//alert(dc.setup.loc.zipCode);
				// alert($.cookie('btdc'));	
			// below is for testing only
			// }, '63.131.38.149');
			});
		} else {
			// A location cookie has been found, get legislators.
			dc.setup.loc = $.cookie('btdcz');
			if(dc.setup.loc != "-") {
				$("#zip").val(dc.setup.loc);
				dc.reps.getReps(dc.setup.loc);
			} else {
				// cookie found, but no location... try again (could be new IP on laptop)?  Or just let user enter a zip.
			}
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
	
	$('input#zip').keydown(function(e) {
		//alert(e.keyCode);
		
		if (e.keyCode) {
        	key = e.keyCode;
  		} else { // mozilla
	        key = e.which;
      	}
		switch(key) {
			// left
			case 37: 
			  break;
			// up
			case 38: 
			  break;
			// right
			case 39:
			  break;
			// down
			case 40:
			  break;
			// enter
			case 13: 
			  dc.reps.getReps($(this).val());
			  break;
		}
	});
	
	$('input#zip').blur(function(e) {
		dc.reps.getReps($(this).val());
	});
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
						if(!answer.is(':visible')) { answer.slideDown('slow'); }
					} else {
						e.preventDefault();
					}
				});
            });
        }
    });
     
})(jQuery);













