from src import *
import json

with open("config.json","r+") as f:
  config = json.load(f)
  post = config["posturl"]
  get = config['geturl']

print(message.get(get))

name = input("name:")
contnet = input("content:")

data = {
  "name": name,
  "content": content
}

print(message.post(post,data=data))
