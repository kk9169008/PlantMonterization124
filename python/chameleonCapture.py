import PyCapture2
import cv2
import matplotlib.pyplot as plt
import numpy as np
from PIL import Image

bus = PyCapture2.BusManager()
numCams = bus.getNumOfCameras()
camera = PyCapture2.Camera()
uid = bus.getCameraFromIndex(0)
camera.connect(uid)
camera.startCapture()

while True:
    image = camera.retrieveBuffer()
    row_bytes = float(len(image.getData())) / float(image.getRows());
    cv_image = np.array(image.getData(), dtype="uint8").reshape((image.getRows(), image.getCols()) );
    cv2.imshow('frame',cv_image)
    cv2.waitKey(0)
