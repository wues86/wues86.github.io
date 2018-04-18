<?php

##
#All eode is under the GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007.
##

include ("config.php");
if ($db_type =='mysql'){
	// connect to the mysql server
	$link = mysql_connect($db_host, $db_user, $db_pass)
	or die ("Could not connect to mysql because ".mysql_error());

	// select the database
	mysql_select_db($db_name)
	or die ("Could not select database because ".mysql_error());

	// create table on database
	$create = "create table $db_table (
	id smallint(5) NOT NULL auto_increment,
	username varchar(30) NOT NULL,
	password varchar(32) NOT NULL,
	email varchar(200) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE KEY username (username)
	);";

	mysql_query($create)
	or die ("Could not create tables because ".mysql_error());

}elseif ($db_type =='sqlite'){
	$dbs = new SQLite3($dbs_name);
	$create = "CREATE TABLE $dbs_table (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	username TEXT NOT NULL UNIQUE,
	password TEXT NOT NULL,
	email TEXT NOT NULL )";
	$create_table = $dbs->querysingle($create);

}

echo "Complete.";
?>
