import requests
import json

page = requests.get("https://app.buysellhodlapp.com/api/rating/report?skipEmpty=true&limit=200")

jsonR = page.text
parsedJson = json.loads(jsonR)

with open('../data.json', 'w') as outfile:
     json.dump(parsedJson, outfile)
