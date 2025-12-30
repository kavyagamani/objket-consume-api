# objket-consume-api
Objket Login System (PHP)
📌 Project Overview

This project is a simple login system built using Objket-style APIs.
The login and logout features are created as separate API endpoints, and a PHP frontend consumes these APIs to authenticate users and display results.

🔁 API Response (Simple)

The Login API returns a JSON response:

{
  "objket": "login",
  "status": "success",
  "message": "Login successful"
}


If login fails:

{
  "objket": "login",
  "status": "error",
  "message": "Invalid username or password"
}


The Logout API returns:

{
  "objket": "logout",
  "status": "success",
  "message": "Logout successful"
}

🔗 How the API is Consumed

The user enters username and password in the login form.

The frontend PHP file sends this data to the Objket Login API using an HTTP POST request.

The API checks the database and sends a JSON response.

The frontend reads the response:

On success → stores user in session and redirects to dashboard.

On failure → shows error message.

Logout works by calling the Objket Logout API, which clears the session.

▶️ How to Run the Project

Install XAMPP

Start Apache and MySQL

Create a database and users table

Place the project folder inside:

C:\xampp\htdocs\


Open browser and run:

http://localhost/objket-mini-project/index.php


<img width="1096" height="715" alt="Screenshot (525)" src="https://github.com/user-attachments/assets/e09fb819-8385-43af-b471-fee16b5f7773" />
<img width="1141" height="512" alt="Screenshot (526)" src="https://github.com/user-attachments/assets/38e6bab4-b62b-44cc-9a3e-01c0ed35e9e9" />


🧰 Technologies Used

PHP – frontend and backend logic

MySQL – user authentication database

Apache (XAMPP) – local server

cURL – API communication

HTML & CSS – user interface

JSON – API request and response format

🧠 Key Concept

This project follows the Objket approach, where each feature (login, logout) is implemented as a separate API, making the system clean, modular, and easy to maintain.
