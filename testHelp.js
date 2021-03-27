	function getGameData() {
		var url = "https://api-2445582011268.apicast.io/characters/?fields=*&limit=10";

		$.ajax({

			url: url,
			
			beforeSend: function(xhr, settings) 
				{ 
				xhr.setRequestHeader('user_key','ba989492667e36e4abe1f3cc47d2d10a'); 
				xhr.setRequestHeader('Accept','application/json'); 
				},

			type: 'GET',

			dataType: 'json',

			crossDomain:true,

			success: function(result){

				return result;

			},

			error: function(result){

				console.log("Error");

			},

		});
	}