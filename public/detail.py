import requests
from bs4 import BeautifulSoup
import json
import sys
import time

zpid = sys.argv[1]

url = 'https://www.zillow.com/homes/'+zpid+'_zpid/'
headers = {'authority': 'www.zillow.com','scheme':'https','accept':'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3','upgrade-insecure-requests':'1','user-agent':'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36'}
try:
    source = requests.get(url, headers=headers).text
    soup = BeautifulSoup(source, 'lxml')
    search_content = soup.find("script",{'id':'hdpApolloPreloadedData'})
    json_array = json.loads(search_content.text)
    out_json = {}
    apiCache = json.loads(json_array['apiCache'])
    out_json['data'] = apiCache['ForSaleDoubleScrollInitialRenderSEOQuery{\"zpid\":'+zpid+'}']['property']
    print(json.dumps(out_json))
except Exception:
    time.sleep(0.2)
    source = requests.get(url, headers=headers).text
    soup = BeautifulSoup(source, 'lxml')
    search_content = soup.find("script",{'id':'hdpApolloPreloadedData'})
    json_array = json.loads(search_content.text)
    out_json = {}
    out_json['data'] = json_array['ForSaleDoubleScrollInitialRenderSEOQuery{\"zpid\":'+zpid+'}']['property']
    print(json.dumps(out_json))