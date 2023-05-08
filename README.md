# scansource-test
PROJECT DESCRIPTION:

PHP framework used: Laravel 9
DB Tables Used: 
	Users - Table for all users in a single one.
	groups - Table for saving groups/roles.
	user_groups - Table for assigning multiple roles to the users.

- I created an application starting with the login module. 
- Once the account is logged in, I provided a User management module(CRUD)
- The role-assigning feature has been added as part of the Edit user module.

The flow of the application is as follows,
- Inserted Roles data as Admin, Manager, Associate and Supervisor as an example.
- Inserted a main admin (admin@gmail.com) user in DB and gave the role of admin manually in DB(Since currently there are no roles for any user on the current system ).
- When the admin user is logged in with the role of admin, I gave the admin the privilege to create a new user, edit and assign new roles to existing users and delete existing users.
- Any user who has a manager role has the same privileges as an Admin.
- For other users with roles of Associate and Supervisor, I set the permission to only view the users.


-----------------------------------------------------------------------

// Commands to install the project:
-composer install
-npm install

// commands to run the project (should run both in two separate terminals):
-php artisan serve 
-npm run dev

DATABASE 
//commands to run migrations and seeder. (Dump file is also added)

CREATE DATABASE `scansource-test`;

-php artisan migrate
-php artisan db:seed

Can be accessed from the default port - http://127.0.0.1:8000

-------------------------------------------------------------------------

