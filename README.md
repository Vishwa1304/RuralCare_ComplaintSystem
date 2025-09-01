 🏡 RuralCare Complaint Management System
 
web-based complaint management system built with PHP and MySQL for rural areas.  
It allows citizens to register, submit complaints, and track them.  
Admins can manage complaints and provide responses.  


 🚀 Features

- User Registration & Login
- Admin & User Roles
- Submit Complaints (electricity, water, road, etc.)
- View Complaint Status
- Admin Dashboard to manage complaints
- Simple & Responsive UI (HTML + CSS + Bootstrap)
- Database-driven system using **MySQL**


🛠️ Tech Stack

- Frontend: HTML, CSS, Bootstrap  
- Backend: PHP   
- Database: MySQL (`ruralcare_db`)  
- Server: XAMPP / Apache  


 ⚙️ Installation

1. Clone the repository:
    `bash
   git clone https://github.com/Vishwa1304/RuralCare_ComplaintSystem.git

2. Move the project folder to your XAMPP htdocs directory:
C:\xampp\htdocs\RuralCare_ComplaintSystem

3. Import the database:
Open phpMyAdmin (http://localhost/phpmyadmin/)
Create a new database named:ruralcare_db
Import the provided ruralcare_db.sql file (found inside the project folder).

4. Run the project in your browser:
http://localhost/RuralCare_ComplaintSystem

👤 Default Login Credentials

Admin
Email: admin@gmail.com
Password: admin123

User
Register a new account from the registration page.

📌 Project Structure

RuralCare_ComplaintSystem/
│── config.php               # Database connection
│── index.php                # Login Page
│── register.php             # User Registration
│── dashboard.php            # User Dashboard
│── submit_complaint.php     # Complaint Submission
│── profile.php      	     # user profile 
│── logout.php               # Logout
│── contact.php              # Contact Page
│── offers.php               # Offers Page
│── feedback.php             # Feedback Form
│── feedback_submit.php      # Feedback Submission
│
├── admin/                   # Admin Panel
│   │── dashboard.php        # Admin Dashboard
│   │── header.php           # Admin Header
│   │── manage_complaint.php # Manage Complaints
│   │── profile.php          # Admin Profile
│
├── includes/                # Reusable components
│   │── header.php           # Global Header
│   │── footer.php           # Global Footer
│
├── assets/                  # Static files
│   │── style.css            # CSS Styles
│   │── script.js            # JavaScript
│
│── ruralcare_db.sql         # Database schema
│── README.md                # Documentation

👥 User Roles
1. User
- Register/Login
- Submit complaints
- View complaint status
- Submit feedback
- Access offers & contact page

2. Admin
- Login via /admin/dashboard.php
- Manage complaints (approve/resolve/delete)
- View user profiles

  ✨ Author

Developed by Vishwa Pandya
📧 Email: vishwa1342005@gmail.com


