import requests
import json
import time
import shutil
import os.path

sequoia_ip = '192.168.47.1'
sequoia_get = 'http://' + sequoia_ip + '/capture'
sequoia_capture = 'http://' + sequoia_ip + '/capture/start'
sq_end = 'http://' + sequoia_ip + '/capture/stop'
sq_sts = ""
sq_rqts = ""
path = ""
sq_bool = 0
injector = 0


from enum import Enum
class Connection(Enum):
	READY = 1
	CAPTURE_STATUS = 2
	DISCONNECT = 3

def getStatusofCamera1(r,sq_sts, sq_rqst, path, sq_bool):
	a = json.dumps(r.json(), indent = 4)

	for item in a.split("\n"):
		if "Ready" in item:
			sq_sts = item.strip()[11:-2] #self.status is ready
			print sq_sts
			sq_bool = 1
		if "request" in item:
			sq_rqst = item.strip()[12:-1] #self.request is capture_status
			print sq_rqst
		if "snapshot" in item:
			sq_sts = item.strip()[11:-2] #self.status is snapshot running
			print sq_sts
			sq_bool = 2
		if "path" in item:
			path = item.strip()[9:-2] #self.path
		 
	return (sq_sts, sq_rqst, path, sq_bool)

#con = Connection.DISCONNECT


	

try:
	r = requests.get(sequoia_get, verify=False, timeout=10)
	sq_sts, sq_rqts, path, sq_bool  = getStatusofCamera1(r, sq_sts, sq_rqts, path, sq_bool)
	print "looking at status"
	print json.dumps(r.json(), indent = 4)
	r2 = requests.get(sequoia_capture, verify=False, timeout=10)
	print json.dumps(r2.json(), indent = 4)
	sq_sts, sq_rqts, path, sq_bool  = getStatusofCamera1(r2, sq_sts, sq_rqts, path, sq_bool)
	print json.dumps(r2.json(), indent = 4)
	print "taking photos...."
	#os.system('edits.py')
	#r3 = requests.get(sq_end, verify=False, timeout=10)
	print "done!"
	
except requests.exceptions.RequestException as e:  # This is the correct syntax status 
	print e
	print "Please ensure that you are connected to the Sequioa"


