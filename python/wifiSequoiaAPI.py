import requests
import json
import subproccess

sequoia_ip = '192.168.47.1'

class Sequoia:

	def _init_(self):
		self.ip = '192.168.47.1'
		self.con = detect_connection()
		self.status = detect_status()

	def detect_connection():
		parrot_connected = 0
		sequoia_status = 'http://' + sequoia_ip + '/status'

		from subprocess import check_output
		out = check_output(["lsusb"])

		word = "Parrot"

		if word in out: 
   		parrot_connected = 1

		if parrot_connected == 0:
			r = requests.get(sequoia_status, verify=False, timeout=10)
			print json.dumps(r.json(), indent = 4)
			parrot_connected = 2

		return parrot_connected

	def capture_image(self):

	if self.con == 2:
		r = requests.get('http://' + sequoia_ip + '/capture')
		print json.dumps(r.json(), indent = 4)
		

	def status(self):
		r = requests.get('http://' + sequoia_ip + '/status')

		print json.dumps(r.json(), indent = 4)


