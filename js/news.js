/*************************************************************************************
*********************************************************
***************************************** news **************************************/
controlNews.forEach(addNews)

function addNews(story) {
  document.getElementById("news-stories").innerHTML += newsSyndacateSection(story)
}

compareNews[0].Data.forEach((item, i) => {
  //console.log("sljflsdjfs:" + item.id)
  document.getElementById("news-stories").innerHTML += newsSyndacateSection2(item)
});


function newsSyndacateSection(news) {
  if (news.thumbnail) {
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
            } else {
              return `<div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
                            <a target="_blank" href="${news.url}"><h4 class="h4 mb-2">${news.title}</h4></a>
                            <p>${news.description}</p>
                            <ul class="list-unstyled list-line">
                              <li>Published: <b>${formatDate(news.publishedAt)}</li></b>
                              <li>Source: <b>${news.source.name}</b></li>

                            </ul>
                          </div>`
            }
}

function newsSyndacateSection2(news) {
  if (news.imageurl) {
    return `<div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
                  <span><img src="${news.imageurl}" style="margin-bottom: 17px;"></span>
                  <br />
                  <a target="_blank" href="${news.url}"><h4 class="h4 mb-2">${news.title}</h4></a>
                  <p>${news.body}</p>
                  <ul class="list-unstyled list-line">
                    <li>Published: <b>${formatDate(news.published_on)}</li></b>
                    <li>Source: <b>${news.source}</b></li>

                  </ul>
                </div>`
            } else {
              return `<div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
                            <a target="_blank" href="${news.imageurl}"><h4 class="h4 mb-2">${news.title}</h4></a>
                            <p>${news.body}</p>
                            <ul class="list-unstyled list-line">
                              <li>Published: <b>${formatDate(news.published_on)}</li></b>
                              <li>Source: <b>${news.source}</b></li>

                            </ul>
                          </div>`
            }
}

//utility functions
function formatDate(data) {
  const months = ["JAN", "FEB", "MAR","APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];
  var date = new Date(data)
  formatted_date = months[date.getMonth()] + "-" + date.getDate() + "-" + date.getFullYear()
  return formatted_date
}
