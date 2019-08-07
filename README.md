# Open Organization Capability Model

## Requirements
*  PHP
*  MySQL
*  Apache

## Setup
Use openorg.sql to setup the table for the openorg database.

Edit dbconnect.php with your mysql credentials.

Create the database and tables:

mysql -u XXXX -p openorg < openorg.sql

The database will be initialized with an Admin User account (username: admin, password: admin).  For security reasonse, please delete this user before going live/public with your code.

This app uses a captcha to ensure no robot creation of users.

Securimage: A PHP class dealing with CAPTCHA images, audio, and validation
https://www.phpcaptcha.org/documentation/quickstart-guide/

To register with recaptcha, visit: https://www.google.com/recaptcha/intro/v3.html

