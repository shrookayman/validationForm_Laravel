# Laravel Validation Form

## Overview

This Laravel project implements a registration web page that captures user details and stores them in a MySQL database. The registration form includes client-side and server-side validations, user image upload, external API integration, automated email notifications, and multi-language support.

## Features

1. **Client-side Validations:**
   - Full Name, User Name, Birthdate, Phone, Address, Password, Confirm Password, User Image, and Email are mandatory.
   - Email, Birthdate, and Full Name follow correct types.
   - Password must match Confirm Password, be at least 8 characters long, and include at least 1 number and 1 special character.

2. **Header and Footer Design:**
   - The registration webpage incorporates a header and footer of custom design for a cohesive user interface.

3. **Server-side Validations:**
   - Checks if the username is already registered in the User's table in the database.
   - Alerts the user to choose another username if it already exists.

4. **User Image Upload:**
   - Enables users to upload an image, which is stored on the server, and the image name is stored in the database.

5. **Birthdate Check Button:**
   - Adds a button next to the Birthdate field to check actors born on the same day using the MDBI API.

6. **Automated Email Notification:**
   - Sends an automatic email with the title "New registered user" and content "A new user <username> is registered to the system" upon successful registration.

7. **Laravel Testing:**
   - Includes one automated test function using Laravel testing for improved code reliability.

8. **Multi-language Support:**
   - Utilizes Laravel's multi-language feature to support English and an additional language (Arabic recommended).

## How to Run

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/your_username/validationForm_Laravel.git
## Run the Migration:

php artisan migrate

## Start the Development Server:

php artisan serve

## Access the Application:

Open your web browser and go to http://localhost:8000

