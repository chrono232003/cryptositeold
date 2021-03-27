from crypto_news_api import CryptoControlAPI
import json

# Connect to the CryptoControl API
api = CryptoControlAPI("2c08926df75ec16a28000b70a07e730b")

# Connect to a self-hosted proxy server (to improve performance) that points to cryptocontrol.io
proxyApi = CryptoControlAPI("2c08926df75ec16a28000b70a07e730b", "http://cryptocontrol_proxy/api/v1/public")

# Enable the sentiment datapoints
#api.enableSentiment()

# Get top news
#print(api.getTopNews())

# # get latest russian news
# print(api.getLatestNews("ru"))
#
# # get top bitcoin news
news = api.getTopNewsByCoin("bitcoin")
#
# # get top EOS tweets
# print(api.getTopTweetsByCoin("eos"))
#
# # get top Ripple reddit posts
# print(api.getLatestRedditPostsByCoin("ripple"))
#
# # get reddit/tweets/articles in a single combined feed for NEO
# print(api.getTopFeedByCoin("neo"))
#
# # get latest reddit/tweets/articles (seperated) for Litecoin
# print(api.getLatestItemsByCoin("litecoin"))
#
# # get details (subreddits, twitter handles, description, links) for ethereum
#print(api.getCoinDetails("ethereum"))

with open('../news.json', 'w') as outfile:
     json.dump(news, outfile)
