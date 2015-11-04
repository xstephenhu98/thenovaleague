from urllib2 import Request, urlopen
from urllib import urlencode

values = urlencode(client_id="0ebc6165a0d7516fd7a5"
	&client_secret="9251f07bb37c6bbee4afb787674d01b745a98ead"
	&grant_type="password"
	&username="xhu5000"
	&password="50b864cd126e82be40e9a0f678fc5c3e")

headers = {
  'Content-Type': 'application/x-www-form-urlencoded'
}
request = Request('http://online-go.com/oauth2/access_token', data=values, headers=headers)

response_body = urlopen(request).read()
print response_body