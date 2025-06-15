# 🔐 Simple PHP Login System - by Dhiraj Dhakal

This is a basic but secure PHP login system that uses **MySQL** and **sessions**. It allows users to log in using their email and password. Passwords are hashed in the database for security.

---

## 📁 Files Included

- `datalogin.php` – PHP backend logic for login.
- `index.html` – The frontend login form.
- MySQL Database: `fristdb`, table: `users`.

---

## ⚙️ Features

- Connects to MySQL using `mysqli`.
- Uses prepared statements to prevent SQL injection.
- Passwords stored as hashes (`password_hash`, `password_verify`).
- Displays appropriate messages for success or failure.
- Uses sessions to keep users logged in.

---

## 🛠 Requirements

- XAMPP / WAMP / LAMP server or any PHP + MySQL setup
- PHP 7.4 or above
- MySQL server

---

## 🧪 Setup Instructions

### 1️⃣ Create the Database

```sql
CREATE DATABASE fristdb;
