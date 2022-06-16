import requests


def get(url):
 r =  requests.get(url).text
 rs = r.splitlines()
 for r in rs:
  name = r.split(',')[0]
  content = r.split(',')[1]
  return f"名前:{name}\n{content}"

def post(url,data):
  try:
    requests.post(url,data=data)
    result = {"name": data['name'],"content": data['content']}
  except:
    print("data error or url error {url}\n{data}")
  return result
  
