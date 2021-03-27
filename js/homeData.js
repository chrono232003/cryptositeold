data = data[0];

var coins = [];
//data.forEach(addCoin);

for(coin in data) {
  addCoin(coin, data[coin])
}

function addCoin(symbol, coindata) {
  document.getElementById("portfolio-grid").innerHTML += dataStructure(symbol, coindata)
}


function dataStructure(symbol, coin) {
  return `<div class="item web col-sm-6 col-md-4 col-lg-4 mb-4">
              <a href="coin.php?coin=${coin.name}" class="item-wrap fancybox">
                <div class="work-info">
                  <h3>${coin.name}</h3>
                  <span>${symbol}</span>
                  <p>Current Price: $${coin.exchangeRate}<br/>
                  Rating: ${ratingDesign(coin.rating)}<p>
                </div>
                <center><img class="img-fluid" src="../coin-images/${coin.imageFileName}"></center>
              </a>
              <center><p style="margin-top:5px;"><a href="https://paxful.com/?r=2xdVKEyXEYr" class="readmore">Learn More</a></p></center>
            </div>`
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
while (index < controlNews.length) {
//for (var i=0; i < 4; i++) {
  if (controlNews[index].thumbnail) {
      addNews(controlNews[index])
      maxStories ++
      if (maxStories == 4) {
        break;
      }
  }
  index++
}
//news.forEach(addNews)

function addNews(story) {
  document.getElementById("top-news-stories").innerHTML += newsSyndacateSection(story)
}

function newsSyndacateSection(news) {
  return `<div class="col-12 col-sm-6 col-md-6 col-lg-3">
    <span><img src="${news.thumbnail}" style="margin-bottom: 17px;"></span>
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
***************************************** Partners **************************************/

partners.forEach(addPartners)

function addPartners(partner) {
  document.getElementById("partners").innerHTML += partnerSection(partner)
}

function partnerSection(partner) {
  return `<div class="col-4 col-sm-4 col-md-2">
    <a href="${partner.affiliateLink}" class="client-logo"><img src="${partner.imageLink}" alt="Image" class="img-fluid"></a>
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
  randomStory(controlNews, 4)
}



//utility functions
function formatDate(data) {
  const months = ["JAN", "FEB", "MAR","APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
  var date = new Date(data)
  formatted_date = months[date.getMonth()] + "-" + date.getDate() + "-" + date.getFullYear()
  return formatted_date
}
