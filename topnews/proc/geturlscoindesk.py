import requests
from bs4 import BeautifulSoup
import json
from datetime import datetime
import os
import functions

page = requests.get("https://www.coindesk.com/news")
soup = BeautifulSoup(page.text, 'html.parser')
stories = soup.findAll(class_="article-card-fh")

arr = []
sidebarStoryContent = ""

for story in stories:
    link = story.find('a')
    if link:
        #get story from link
        page2 = requests.get("https://www.coindesk.com" + link['href'])
        soup2 = BeautifulSoup(page2.text, 'html.parser')

        title = link['title'].encode('ascii', 'ignore').decode('utf-8')
        url = "https://www.coindesk.com" + link['href'].encode('ascii', 'ignore').decode('utf-8')
        img = soup2.find("picture").find("img")["src"]
        date = soup2.find("time")["datetime"]
        date = functions.getFormattedDate(date)
        content = soup2.findAll(class_="article-body")[0].prettify().encode('ascii', 'ignore').decode('utf-8')


        arr.append({'title':title, 'link':url, 'img':img, 'date':date, 'content':content})
        coinsamplePageUrl = functions.createWebPageFile(title,content)

        #returns formatted link with info. IF link already exists, return None.
        generatedContent = functions.generateNewLink(coinsamplePageUrl, title, date)
        if generatedContent is not None:
            sidebarStoryContent += functions.generateNewLink(coinsamplePageUrl, title, date)

print(sidebarStoryContent)

# Update the web pages to include these new links
functions.updateHomeWithNewLinks(sidebarStoryContent)
