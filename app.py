from flask import Flask, jsonify
from flask_cors import CORS
import mysql.connector

app = Flask(_name_)
CORS(app)

# Connect to MySQL
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="your_password",  # change this
    database="travel_site"
)
cursor = conn.cursor(dictionary=True)

# API to get tour packages
@app.route('/api/packages', methods=['GET'])
def get_packages():
    cursor.execute("SELECT * FROM tour_packages")
    packages = cursor.fetchall()
    return jsonify(packages)

if _name_ == '_main_':
    app.run(debug=True)