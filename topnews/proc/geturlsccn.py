import requests
from bs4 import BeautifulSoup
import json
from datetime import datetime
import os
import functions

headers = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36'}
page = requests.get("https://www.ccn.com/crypto/", headers=headers)
soup = BeautifulSoup(page.text, 'html.parser')
stories = soup.findAll(class_="fsp")
arr = []
sidebarStoryContent = ""

for story in stories:
    link = story.find('a')
    if link:
        #get story from link
        headers = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36'}
        page2 = requests.get(link['href'], headers=headers)
        soup2 = BeautifulSoup(page2.text, 'html.parser')

        title = link['title'].encode('ascii', 'ignore').decode('utf-8')
        url = link['href'].encode('ascii', 'ignore').decode('utf-8')
        img = soup2.find(class_="amp-featured-image").find("amp-img")['src']
        date = soup2.find(class_="loop-date").text
        # # date = functions.getFormattedDate(date)
        content = soup2.find(class_="lft").prettify().encode('ascii', 'ignore').decode('utf-8')


        arr.append({'title':title, 'link':url, 'img':img, 'date':date, 'content':content})
        coinsamplePageUrl = functions.createWebPageFile(title,content)

        #returns formatted link with info. IF link already exists, return None.
        generatedContent = functions.generateNewLink(coinsamplePageUrl, title, date)
        if generatedContent is not None:
            sidebarStoryContent += functions.generateNewLink(coinsamplePageUrl, title, date)

print(sidebarStoryContent)

# Update the web pages to include these new links
functions.updateHomeWithNewLinks(sidebarStoryContent)
