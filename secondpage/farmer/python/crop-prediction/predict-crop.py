#!C:\Users\amits\AppData\Roaming\Microsoft\Windows\Start Menu\Programs\Python 3.7
#!/usr/bin/env python

from tensorflow import keras
import numpy as np
from pickle import load


def predict(temp, hum, ph, rain):
    model = keras.models.load_model('model.hdf5')
    encoder = load(open('encoder.pkl', 'rb'))
    scaler = load(open('scaler.pkl', 'rb'))

    preds = scaler.transform(np.array([[temp, hum, ph, rain]]))
    preds = encoder.inverse_transform(model.predict(preds))
    return preds[0][0]

value = predict(20, 0.98, 8, 400)
print(value)