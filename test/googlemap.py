﻿import json
from urllib.request import urlopen                                                                                                                                                            
from urllib.parse import quote                                                                                                                                                                

CONFIG_FILE="historic_site.json"
CONFIG={}

def readConfig(filename):
    f = open(filename, 'r', encoding='utf-8')
    s = f.read()
    js = json.loads(s)
    f.close()
    return js

def main() :
    global CONFIG_FILE
    global CONFIG
    CONFIG = readConfig(CONFIG_FILE)
    sites = CONFIG['DATA']
    cnt = 10
    for site in sites:
        str = site['NAME_KOR']
        ss = str.split(' ')
        q = '+'.join(ss)
        
        url = 'https://maps.googleapis.com/maps/api/place/textsearch/json?query='+quote(q)+'&key=AIzaSyCG21Y5X-wARtfSC6WkgO1nxoVU0WwcjwE&location=37.563929,126.988169&radius=18000'
        doc = urlopen(url).read(10)
        print(doc)
        cnt--
        if (cnt == 0):
            break
        
if __name__ == "__main__":
    main()