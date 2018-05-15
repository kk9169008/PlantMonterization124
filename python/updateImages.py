import requests
import json

sequoia_ip = '192.168.47.1'

print "get:"
r = requests.get('http://' + sequoia_ip + '/config')
print json.dumps(r.json(), indent = 4)

print "post:"
payload = { "capture_mode": "single",
            "timelapse_param": 2.5,
            "gps_param": 25.0,
            "overlap_param": 80.0,
            "resolution_rgb": 12,
            "resolution_mono": 1.2,
            "bit_depth": 10,
            "sensors_mask": 31,
            "storage_selected": "internal",
            "auto_select": "off",
          }
r = requests.post('http://' + sequoia_ip + '/config', json = payload)
print json.dumps(r.json(), indent = 4)
