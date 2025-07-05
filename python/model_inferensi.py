# python/model_inferensi.py
import sys
import numpy as np
from tensorflow.keras.models import load_model
from tensorflow.keras.preprocessing import image

model_path = 'python/glaucoma_model.keras'
model = load_model(model_path)

def predict_image(img_path):
    img = image.load_img(img_path, target_size=(224, 224))  # ganti sesuai input model
    img_array = image.img_to_array(img) / 255.0
    img_array = np.expand_dims(img_array, axis=0)
    predictions = model.predict(img_array)
    return predictions[0].tolist()

if __name__ == "__main__":
    img_path = sys.argv[1]
    result = predict_image(img_path)
    print(result)
