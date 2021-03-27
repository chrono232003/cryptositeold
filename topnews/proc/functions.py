from datetime import datetime
import os
import requests
from bs4 import BeautifulSoup

# Creates the webpage and stores it in the "topnews" folder.
# The webpage to be created is based on a template file which is php.
# There is a content placeholder string in there that we overwrite with dyno content
def createWebPageFile(title,content):
    templateFile = open('templates/pageTemplate.php').read()
    templateFile = templateFile.replace('{title}', title)
    templateFile = templateFile.replace('{meta-description}', title)
    templateFile = templateFile.replace('{main-content}', content)

    filename = title.replace(" ", "-").replace("&", "-").replace("?", "").replace("*", "").replace(":", "")

    f= open("../" + filename+".php", "w+")
    f.write(templateFile)
    f.close()
    return "topnews/" + filename.encode('ascii', 'ignore').decode('utf-8') +".php"


#Generates and returns a single link for the side bar on pages.
#This is based on a template file that has the base structure of a single link
#There are content placeholders we overwrite and then return the whole html string back.
def generateNewLink(url, title, date):

    #check to make sure the file does not already exist
    f = open("../../php/page-components/sidebar-content.html", "r").read()
    soup = BeautifulSoup(f, 'html.parser')
    stories = soup.findAll(class_="interesting-reads-story")
    #print(stories)
    for story in stories:
        link = story.find("a")["href"]
        if link == url:
            return
    # existingFileNames = os.listdir("../")
    # for fileName in existingFileNames:
    #     if fileName in url:
    #         return

    singlelinkContent = open("templates/sidebarSingleLinkContent.txt", "r").read()
    singlelinkContent = singlelinkContent.replace('{title}', title)
    singlelinkContent = singlelinkContent.replace('{link}', url)
    singlelinkContent = singlelinkContent.replace('{date}', date)
    return singlelinkContent


#Update the actual sidebar component that the website pages use.
#We import the sidebar page component and inject all the content we get from all the "generateNewLink" calls
#We open that same page component again with write permaissions and write to it to update.
def updateHomeWithNewLinks(content):
    homeContent= open("../../php/page-components/sidebar-content.html", "r").read()

    # replace sidebar links with updated list
    newContent = homeContent.replace("<div id=\"replaceme\"></div>", "<div id=\"replaceme\"></div>" + content)

    f2= open("../../php/page-components/sidebar-content.html", "w+")
    f2.write(newContent)
    f2.close()

#Used to format the published date of the articles.
def getFormattedDate(date):
    date = datetime.strptime(date,'%Y-%m-%dT%H:%M:%S')
    return str(date.month) +"-"+ str(date.day) +"-"+ str(date.year)
