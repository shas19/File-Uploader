<?php

require_once 'connect.inc.php'; //connects to the database
session_start();
if(isset($_POST['email'])&&isset($_POST['password']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	if(!empty($email)&&!empty($password))
	{
		//Check whether the given email and password exist in the directory
		$query = "SELECT ID FROM User_Info WHERE Username='$email' AND Password='$password'";
		$query_run = mysql_query($query);
		if(!$query_run)
			echo 'The query is invalid!' . ' ' . mysql_error() . ' ' . $query;
		else{
		$query_rows = mysql_num_rows($query_run);
		if($query_rows==0)
			echo 'The email/password combination is invaid!';
		else
		{
			$user_id = mysql_result($query_run,0,'id'); //gives the 0th row of the 1-row query run and gives column corressponding to id
            //Now we have the user id of the person to use for log-in sessions
            $_SESSION['id']=$user_id;
			header('Location: handleupload.php');
		}}
	}
	else
		echo 'Please enter both the email and password!';
}

?>
<link rel="stylesheet" type="text/css" href="style.css">

<div id="Sign-In">
<fieldset style="width:30%"><legend>LOG-IN HERE</legend>
<form method="POST" action="login.php">
Username: <br><input type="text" name="email" size="40"><br>
Password: <br><input type="password" name="password" size="40"><br>
<input id="button" type="submit" name="submit" value="Log-In">
</form>
</fieldset>
</div>
