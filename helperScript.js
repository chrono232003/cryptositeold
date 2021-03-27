function getGameData(name) {
	var url = "https://www.giantbomb.com/api/games/?api_key=b3ded29dd3f27cee75d32787cc13f211a94fd55a&format=jsonp&filter=name:" + name;

	$.ajax({

		url: url,

		type: "GET",

		dataType: "jsonp",

		crossDomain:true,

		jsonp:"json_callback",

		success: function(result){

			var gameImage = (result.results[0].image.medium_url == null || result.results[0].image.medium_url == undefined) ? "No Image Provided" : result.results[0].image.medium_url;
			var gameDescription = (result.results[0].description == null || result.results[0].description == undefined) ? "No Description Provided" : result.results[0].description;
			document.getElementById("gameData").innerHTML = "<img src = '" + gameImage + "' style = 'max-width: 250px;'><br />" + gameDescription;

		},

		error: function(result){

			console.log("Error");

		},

	});
}



//function getGame(filename) {
//    location.href = "'games/" + filename + "'";
//}
