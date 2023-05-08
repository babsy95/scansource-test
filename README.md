# scansource-test

## PROJECT DESCRIPTION:

- PHP framework used: Laravel 9
- MySQL DB Tables Used: 
	- Users: Table for all users in a single one.
	- groups: Table for saving groups/roles.
	- user_groups: Table for assigning multiple roles to the users.

- I created an application starting with the login module. 
- Once the account is logged in, I provided a User management module(CRUD)
- The role-assigning feature has been added as part of the Edit user module.

- The flow of the application is as follows:
- Inserted sample roles data as Admin, Manager, Associate and Supervisor on 'groups' table.
- Inserted a main admin (admin@gmail.com) user in DB and gave the role of admin manually in DB(Since currently there are no roles for any user on the current system ).
- When the admin user is logged in with the role of admin, I gave admin the privilege to create a new user, edit and assign new roles to existing users and delete existing users.
- Any user who has a manager role has the same privileges as an Admin.
- For other users with roles of Associate and Supervisor, I set the permission to only view the users.


-----------------------------------------------------------------------

## Install project's supporting files (Vendor, NodeModule):
- On the project directory terminal run the following commands:
    - composer install
    - npm install


## Create Database tables and sample data:
- Commands to run migrations and seeder (OR the Dump file 'scansource-test.sql' is added on the root directory of the project, which can be executed) :
- CREATE DATABASE `scansource-test`; (Run the Command on PHPMyAdmin/Workbench)
- On the project directory run the following commands:
    - php artisan migrate
    - php artisan db:seed

## RUN the project:
- On the project directory terminal run the following commands (both should run in two separate terminals):
    - php artisan serve 
    - npm run dev

- Can be accessed from the default port - http://127.0.0.1:8000

- Test User:
    - Login email: admin@gmail.com
    - Login password: 1234

- GIT URL: https://github.com/babsy95/scansource-test


## Requirements Completed:
    -Commit your code (via git) as if you are working on a production project
    -Create a management interface for managing users with a focus on updating existing users
    -Create backend CRUD code with a focus on reading and updating existing users
    -Bonus (not a requirement for this assessment): Add front and/or backend code for creating and deleting users
    -Submitted code provided must contain:
        -PHP 7.3 or higher
        -MySQL/MariaDB

