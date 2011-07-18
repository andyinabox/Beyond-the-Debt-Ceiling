var sl = {
	
};

sl.leg = {
	// Return all congressmen from the requested zip
	zip: function(zip, callback) {
		$.getJSON('leg/zip/'+zip, function(response) {
			callback(response);
		});
	}
};


var ip = {
	loc: function(callback, ip) {
		if(ip) {
			$.getJSON('leg/loc/'+ip, callback);	
		} else {
			$.getJSON('leg/loc', callback);
		}
		
	},
	ip: function(callback) {
		$.getJSON('leg/ip', callback);
	}
}