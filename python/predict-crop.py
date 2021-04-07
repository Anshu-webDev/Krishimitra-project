#!C:\Users\amits\AppData\Local\Programs\Python\Python37\python.exe
# print ("Content-type: text/html\n")
from pickle import load
import numpy as np
from tensorflow import keras
from flask import Flask, session, Request, redirect, render_template, request
app = Flask(__name__)


@app.route('/predict', methods=["GET"])
def Index():
    temperature = request.args.get('temperature')
    humidity = request.args.get('humidity')
    ph = request.args.get('ph')
    rain = request.args.get('rain')
    print(temperature+" "+humidity+" "+ph+" "+rain)

    def predict(temp, hum, ph, rain):
        model = keras.models.load_model('model.hdf5')
        encoder = load(open('encoder.pkl', 'rb'))
        scaler = load(open('scaler.pkl', 'rb'))

        preds = scaler.transform(np.array([[temp, hum, ph, rain]]))
        preds = encoder.inverse_transform(model.predict(preds))
        return preds[0][0]

    value = predict(temperature, humidity, ph, rain)
    return value


if __name__ == '__main__':
    app.run(debug=True)
