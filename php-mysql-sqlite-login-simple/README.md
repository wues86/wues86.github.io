# php-mysql-sqlite-login
A simple php and mySQL or SQLite login system.
Forked from [JoeZwet](https://github.com/JoeZwet/php-mysql-login-simple)
#### Config
##### config.php
```
<?php
//pick db type
$db_type = "sqlite"; //sqlite or mysql

//mysql
$db_host = "localhost";  // server to connect to.
$db_name = "login";  // the name of the database.
$db_user = "database username";  // mysql username to access the database with.
$db_pass = "database password";  // mysql password to access the database with.
$db_table = "users";    // the table that this script will set up and use.

//sqlite
$dbs_name ="users.sqlite"; // sqlite db name
$dbs_table = "users"; // the table that this script will set up and use.
?>
```
