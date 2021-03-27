import requests
from bs4 import BeautifulSoup
import json

storyFile = open('../../../../home/pi/crypto/stories.json', "r").read()

if storyFile:
    stories = json.loads(storyFile)
    
if stories:
    for story in stories:
        templateFile = open('template.php').read()
        templateFile = templateFile.replace('{title}', story['title'])
        templateFile = templateFile.replace('{meta-description}', story['title'])
        templateFile = templateFile.replace('{main-content}', story['content'])
        
        filename = story['title'].replace(" ", "-").replace("&", "-")
        
        f2= open(filename+".php", "w+")
        f2.write(templateFile)
        f2.close()

