import requests as rs
import json

url = 'https://www.edsonmelo.com.br/api_rest/user.php'

def new(name, user, password, url):
  payload = {
    "type":"new", 
    "name":name, 
    "user":user,
    "password": password
    }
  headers = {'Content-type':'application/json', 'Accept': 'text/plain'}
  data = rs.post(url, data=json.dumps(payload), headers=headers)
  dicionario = json.loads(data.text)

  for k, v in dicionario.items():
    print(k, v)

def login(user, password, url):
  payload = {
    "type":"login", 
    "user":user,
    "password": password
    }
  headers = {'Content-type':'application/json', 'Accept': 'text/plain'}
  data = rs.post(url, data=json.dumps(payload), headers=headers)
  dicionario = json.loads(data.text)

  for k, v in dicionario.items():
    print(k, v)

# Chamar a função new
new('Edson Melo de Souza', 'edson.melo', 'edson123', url)

# Chamar a função login
login('edson.melo', 'edson123', url)