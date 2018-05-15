import requests
import json
import os.path
import shutil
import zipfile

sq_sts = ""
sq_rqst = ""
path = ""
sq_bool = 0

def formatLength(length):
	rtnString = ""
	if length < 1000:
		rtnString = '0' + str(length)
	if length < 100:
		rtnString = '00' + str(length)
	if length < 10:
		rtnString = '000' + str(length)
	if length >= 100:
		rtnString = length
	return 'internal/' + rtnString
		

def downloadImages(path):

	r = requests.get('http://' + '192.168.47.1' + '/download/' + path, stream=True)

	print "copying files"

	if r.status_code == 200:
		 with open(os.path.basename(path) + '.zip', 'wb') as f:
		     r.raw.decode_content = True
		     shutil.copyfileobj(r.raw, f)

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

requests.get('http://' + '192.168.47.1' + '/capture/stop', verify=False, timeout=10)

r = requests.get('http://' + '192.168.47.1' + '/capture')
print json.dumps(r.json(), indent = 4)

sq_sts, sq_rqst, path, sq_bool = getStatusofCamera1(r, sq_sts, sq_rqst, path, sq_bool)

print path

if path == "" or None:
	r_end = requests.get('http://' + '192.168.47.1' + '/file/internal', stream=True)
	a_end = json.dumps(r_end.json(), indent = 4)
	newpath = formatLength(a_end.count('\n')-3+10) 
	print newpath
	path = newpath

downloadImages(path)

path_num = path[-4:] + '.zip'

print path_num

zip_ref = zipfile.ZipFile(path_num, 'r')
zip_ref.extractall('../imageStorage')
zip_ref.close()
