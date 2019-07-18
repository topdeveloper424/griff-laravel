import requests
import json
import time
import sys
url = sys.argv[1]
#print(url)

#url = 'https://www.zillow.com/search/GetResults.htm?spt=homes&status=100000&lt=110000&ht=000000&pr=,&mp=196,489&bd=0%2C&ba=0%2C&sf=,&lot=0%2C&yr=,&singlestory=0&hoa=0%2C&pho=0&pets=0&parking=0&laundry=0&income-restricted=0&fr-bldg=0&condo-bldg=0&furnished-apartments=0&cheap-apartments=0&studio-apartments=0&pnd=0&red=0&zso=0&days=any&ds=all&pmf=0&pf=0&sch=100111&zoom=13&rect=-88211847,42497162,-88134943,42538726&p=1&sort=globalrelevanceex&search=maplist&listright=true&isMapSearch=true&zoom=13'
headers = {'authority': 'www.zillow.com','scheme':'https','accept':'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3','upgrade-insecure-requests':'1','user-agent':'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36'}

source = requests.get(url, headers=headers).text
json_array = json.loads(source)

out_json = {}
try:
    out_json["numPages"] = json_array['list']['numPages']
    out_json["curPage"] = json_array['list']['page']
    data_list = []
    for house in json_array['map']['properties']:
        data_list.append(house[8][11])
    out_json["data"] = data_list
except Exception:
    time.sleep(0.2)
    source = requests.get(url, headers=headers).text
    json_array = json.loads(source)
    out_json["numPages"] = json_array['list']['numPages']
    out_json["curPage"] = json_array['list']['page']
    data_list = []
    for house in json_array['map']['properties']:
        data_list.append(house[8][11])
    out_json["data"] = data_list


print(json.dumps(out_json))   
    
#file = open("out.txt","w") 

#file.write(json.dumps(json_array['list']['numPages'], indent=4, sort_keys=True)) 
#file.write(json.dumps(json_array['map']['properties'], indent=4, sort_keys=True)) 
#file.write(source)
#file.close()
# json_array['curPageNumber'] = json_array['list']['numPages']
# print(json.dumps(json_array, indent=4, sort_keys=True))
