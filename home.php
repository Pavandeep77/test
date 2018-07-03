<?php
session_start();
?>


<html>
<head>
<title>
HOME
</title>
</head>
<body>
LOGIN WITHOUT ANY CSS AND REGISTRATION , ONE FIXED ENTRY <br>
db:web  username:pavan password:12345<br><br><br><br><br><br>

<?php
if(isset($_SESSION['u_id']))
{
echo 'HEY ! '.$_SESSION['u_name'].'<BR> You are logged In';

echo '
<form action="logout.inc.php" method="POST">
<input type="submit" name="submit" value="LOG OUT">
</form>
 
';

}
else
{
	echo '<form align="center" method="POST" action="login.inc.php">
USERNAME : <input type="text" name="username"><br><br><br>
PASSWORD : <input type="password" name="password">
<br><br><br><br>
<input type="submit" name="submit" value="submit">

</form>';
}
?>

</body>
</html>
