# Registration and Login App

This project is a simple registration and login application that supports two user types: user and admin. It includes features for user registration, login, and a dashboard interface.

## Project Structure

```
registration-login-app
├── src
│   ├── css
│   │   └── styles.css
│   ├── js
│   │   └── scripts.js
│   ├── php
│   │   ├── config.php
│   │   ├── db.php
│   │   ├── register.php
│   │   ├── login.php
│   │   ├── logout.php
│   │   ├── dashboard.php
│   │   └── check_username.php
│   ├── index.html
│   └── dashboard.html
├── sql
│   └── schema.sql
└── README.md
```

## Features

- User registration with username availability check.
- Secure password hashing and storage.
- User login with session management.
- Dashboard for logged-in users with a logout option.
- Confirmation popover for logout action.

## Technologies Used

- HTML
- CSS
- JavaScript
- PHP
- MySQL

## Setup Instructions

1. Clone the repository to your local machine.
2. Import the `sql/schema.sql` file into your MySQL database to create the necessary tables.
3. Update the `src/php/config.php` file with your database connection settings.
4. Open `src/index.html` in your web browser to access the application.

## Usage

- Users can register by providing a username and password.
- If the username is already taken, an error message will be displayed.
- After successful registration, users will be redirected to the dashboard.
- Users can log in with their credentials, and upon successful login, they will be directed to the dashboard.
- The dashboard includes a logout button that prompts for confirmation before logging out.

## Dependencies

- PHP 7.0 or higher
- MySQL 5.7 or higher
- A web server (e.g., Apache, Nginx) to run the PHP files

## License

This project is open-source and available for modification and distribution.