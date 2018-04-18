<!--
All eode is under the GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007.
-->

<?php 

include("config.php"); 

if ($db_type =='mysql'){
	// connect to the mysql server
	$link = mysql_connect($db_host, $db_user, $db_pass)
	or die ("Could not connect to mysql because ".mysql_error());

	// select the database
	mysql_select_db($db_name)
	or die ("Could not select database because ".mysql_error());

	// check if the username is taken
	$check = "select id from $db_table where username = '".$_POST['username']."';";
	$qry = mysql_query($check) or die ("Could not match data because ".mysql_error());
	$num_rows = mysql_num_rows($qry); 

} elseif ($db_type =='sqlite') {
	//connect to sqlite db
	$dbs = new SQLite3($dbs_name);

	//prepare query
	$match = "SELECT count(*) from $dbs_table where username = '".$_POST['username']."'";  

	//make query
	$num_rows = $dbs->querysingle($match);
}

if ($num_rows > 0) { 
	echo "Sorry, there the username $username is already taken.<br>";
	echo "<a href=register.html>Try again</a>";
	exit;

	} else {
		if ($db_type =='mysql'){
			// insert the data
			$insert = mysql_query("insert into $db_table values ('NULL',
			'".$_POST['username']."',
			'".$_POST['email']."',
			'".$_POST['password']."')")
			or die("Could not insert data because ".mysql_error());
		} else {
			$insert = "INSERT into $dbs_table(username, email, password) values ('".$_POST['username']."', '".$_POST['email']."', '".$_POST['password']."')";
			$insert_user = $dbs->querysingle($insert);
		}
	// print a success message
	echo "Your user account has been created!<br>"; 
	echo "Now you can <a href='login.html'>log in</a>"; 
	}


?>
