## Scholar Clubs Management System
This is a web application developed using the Laravel framework to manage scholar clubs within an educational institution. The system allows users to create, manage, and participate in various scholar clubs and their activities.

## Features
- User Roles:
Administrators: Manage clubs, users, and system settings.
Club Responsibles: Manage club details, events, and memberships.
Club Members: Participate in club activities and events.

- Club Management:
Create and edit club profiles with descriptions, logos, and contact information.
Manage club events, including scheduling, RSVPs, and attendance tracking.
Assign club responsibles and members with different permissions.

- Event Management:
Create, edit, and delete events for clubs with details such as date, time, location, and descriptions.
Allow RSVPs and track attendance for events.

- User Management:
Register and manage user accounts with roles and permissions.
User authentication and authorization for secure access to system features.

## Installation

- Clone the repository to your local machine.

- Install Composer dependencies:

- composer install
Copy the .env.example file to .env and configure your database settings.

- Generate the application key:
php artisan key:generate

- Migrate and seed the database:
php artisan migrate --seed

- Start the development server:
php artisan serve

- Access the application in your web browser at http://localhost:8000.

## Account Details
Admin Account:

Email: admin@gmail.com
Password: 1234

Responsible Account:

Email: hajar@gmail.com
Password: 1234

