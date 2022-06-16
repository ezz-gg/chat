from src import *
import json

with open("config.json","r+") as f:
  config = json.load(f)
  url = config["url"]

print(message.get(url))

name = input("name:")
contnet = input("content:")

data = {
  "name": name,
  "content": content
}

print(message.post(url,data=data))
