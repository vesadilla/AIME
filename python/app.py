from flask import Flask, request, jsonify
import tensorflow as tf
from tensorflow.keras.models import load_model
from tensorflow.keras.preprocessing import image
import numpy as np
from PIL import Image
from flask_cors import CORS

app = Flask(__name__)
CORS(app)  # Izinkan akses dari luar (misal: Laravel)

# Load model hanya sekali
model = load_model('glaucomma-modeleee.h5')
IMG_SIZE = (224, 224)
CLASS_NAMES = ['glaucoma', 'normal']  # ubah sesuai label modelmu

@app.route('/')
def index():
    return 'Flask API is running.'

@app.route('/predict', methods=['POST'])
def predict():
    if 'image' not in request.files:
        return jsonify({'error': 'No image uploaded'}), 400

    img_file = request.files['image']
    img = Image.open(img_file).convert('RGB')
    img = img.resize(IMG_SIZE)
    img_array = image.img_to_array(img)
    img_array = np.expand_dims(img_array, axis=0) / 255.0

    predictions = model.predict(img_array)
    predicted_class = CLASS_NAMES[np.argmax(predictions[0])]
    confidence = float(np.max(predictions[0]))

    return jsonify({
        'prediction': predicted_class,
        'confidence': confidence
    })

if __name__ == '__main__':
    app.run(port=5000, debug=True)
