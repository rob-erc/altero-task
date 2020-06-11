# Altero developer homework

![](altero-task.gif)

Instructions for testing:

Note: Application requires that a mysql database has been set up, and that Composer has been installed.

1. Run this command to install packages required by the project -
```
composer install
```

2. In the database create two tables - "applications" and "deals".

Applications table requires columns:
  - id (primary key)
  - email (varchar)
  - amount (int)
  - offer_received (bool)
  - created_at (timestamp)
  
Deals table requires columns:
  - id (primary key)
  - partner (varchar)
  - application_id (int)
  - status (varchar, with default value 'ask')
  - created_at (timestamp)
  
3. In file config/database.php change the array values to your mysql info.

4. Run this command to start php`s built in web server
```
php -S localhost:8080
```

5. Now the application is running. You can access it by typing 
```
localhost:8080
```
in the browser. Add new applications and see what is added to database tables using navigation menu.
