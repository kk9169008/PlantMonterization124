import requests
import json
import subprocess

parrot_connected = 0
sequoia_ip = '192.168.47.1'
sequoia_status = 'http://' + sequoia_ip + '/status'

from subprocess import check_output
out = check_output(["lsusb"])

word = "Parrot"

if word in out: 
   parrot_connected = 1

if parrot_connected == 0:
	r = requests.get(sequoia_status, verify=False, timeout=10)
	print json.dumps(r.json(), indent = 4)

