var data = data[0];
var coins = [];

//get the coin that we need for the Page
// coin = window.location.href.replace(window.location.origin + "/crypto/", "").replace(".html", "")

//coin = window.location.search.replace("?coin=", "")

//htaccess rules edited the url, so I neede to edit this
coin = window.location.pathname.replace("/coin/","")

var obj = {}

for (x in data) {
    if (data[x].name == coin) {
      obj.name = x
      obj.fullName = data[x].name
      obj.imageUrl = "../coin-images/" + data[x].imageFileName
      obj.price = data[x].exchangeRate
      obj.bidPrice = data[x].bidPrice
      obj.askPrice = data[x].askPrice
      obj.rating = data[x].rating
      obj.developerScore = data[x].developerScore.substring(0, data[x].developerScore.length-1)
      obj.utilityScore = data[x].utilityScore.substring(0, data[x].utilityScore.length-1)
      break;
    }
  }

document.getElementById("div-title").innerHTML = dataTitle(obj)
document.getElementById("side-content").innerHTML = sideData(obj)
document.getElementById("image-container").innerHTML = coinPic(obj)

function dataTitle(obj) {
  return `<h2>${obj.fullName}</h2>
  <p></p>`
}

function coinPic(obj) {
  return `<img src="${obj.imageUrl}" alt="Image" class="img-fluid">`
}

function sideData(obj) {
  return `<h3 class="h3">${obj.fullName}</h3><p class="mb-4">
            <span class="text-muted">${obj.name}</span></p>
            <div class="mb-5">
                <p></p>
            </div>
            <h4 class="h4 mb-3">Details:</h4>
            <ul class="list-unstyled list-line mb-5">
                <li>Latest Price: <b>${obj.price}</b></li>
                <li>Bid Price: <b>${obj.bidPrice}</b></li>
                <li>Ask Price: <b>${obj.askPrice}</b></li>
                <li>Rating: <b>${ratingDesign(obj.rating)}</b></li>
                <li>Developer Score: <b>${obj.developerScore}%</b></li>
                <li>Utility Score: <b>${obj.utilityScore}%</b></li>
            </ul>
            <p><a href="https://paxful.com/?r=2xdVKEyXEYr" class="readmore">Learn More</a></p>`
}

function ratingDesign(rating) {
   if (rating == "Superb") {
    return `<span style="color:green; font-weight:bold; font-size: large;">${rating}</span>`
  } else if (rating == "Attractive") {
    return `<span style="color:lightGreen; font-weight:bold; font-size: large;">${rating}</span>`
  } else if (rating == "Basic") {
    return `<span style="color:white; font-weight:bold; font-size: large;">${rating}</span>`
  } else if (rating == "N/A") {
    return `<span style="color:white; font-weight:bold; font-size: large;">${rating}</span>`
  } else if (rating == "Caution") {
    return `<span style="color:orange; font-weight:bold; font-size: large;">${rating}</span>`
  } else {
    return `<span style="color:red; font-weight:bold; font-size: large;">${rating}</span>`
  }
}


/*************************************************************************************
*********************************************************
***************************************** news **************************************/
//grab the first 4 news stories
index = 0;
maxStories = 0;
while (index < news.length) {
//for (var i=0; i < 4; i++) {
  if (news[index].thumbnail) {
      addNews(news[index])
      maxStories ++
      if (maxStories == 6) {
        break;
      }
  }
  index++
}

function addNews(story) {
  document.getElementById("news-stories").innerHTML += newsSyndacateSection(story)
}

function newsSyndacateSection(news) {
  return `<div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
                <span><img src="${news.thumbnail}" style="margin-bottom: 17px;"></span>
                <br />
                <a target="_blank" href="${news.url}"><h4 class="h4 mb-2">${news.title}</h4></a>
                <p>${news.description}</p>
                <ul class="list-unstyled list-line">
                  <li>Published: <b>${formatDate(news.publishedAt)}</li></b>
                  <li>Source: <b>${news.source.name}</b></li>
                </ul>
              </div>`
}



/*************************************************************************************
*********************************************************
***************************************** top news carousel **************************************/

function addCarouselNews(story) {
  document.getElementById("top-coin-news").innerHTML += newsCarouselSection(story)
}

function newsCarouselSection(news) {
  return `<div class="testimonial-wrap">
    <div class="testimonial">
      <img src="${news.thumbnail}" alt="Image" class="img-fluid">
      <h4>${news.title}</h4>
      <h5>${formatDate(news.publishedAt)}</h5>
      <blockquote>
        <p>${news.description}</p>
      </blockquote>
      <p><b><a target="_blank" href="${news.url}">Full Story Here</a></b></p>
    </div>
  </div>`
}

 function randomStory(news, minStoryIndex) {
    var random = Math.floor(Math.random() * (+news.length - +minStoryIndex)) + +minStoryIndex;
    //console.log("Random Number Generated : " + random );
    if (news[random].thumbnail) {
      return addCarouselNews(news[random])
    }
}

for (var i=0; i<15; i++) {
  randomStory(news, 4)
}



//utility functions
function formatDate(data) {
  const months = ["JAN", "FEB", "MAR","APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
  var date = new Date(data)
  formatted_date = months[date.getMonth()] + "-" + date.getDate() + "-" + date.getFullYear()
  return formatted_date
}
