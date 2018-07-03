<?php

session_start();

//echo 'HEY '.$username. '<br>Your password is '.$password ;

if(isset($_POST['submit']))
{
	include 'dbh.inc.php';

$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=mysqli_real_escape_string($conn,$_POST['password']);

//check for empty fields

if(empty($username) || empty($password))
{
	header("Location:home.php?login empty !");
}

//check if user is valid ,thus log in else denied
$sql="Select * from users where user_name='$username' ";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);

if($resultCheck<1)
{
		header("Location:home.php?login errror/invalid!");
		exit();

}
else
{
	if($row=mysqli_fetch_assoc($result))
	{
		$hashpwdCheck=password_verify($password,$row['user_pass']);
		if(hashpwdCheck==false)
		{
			header("Location:home.php?login error!");
			exit();
		}
		else if(hashpwdCheck==true)
		{
			//log in the user
			$_SESSION['u_id']=$row['user_id'];
			$_SESSION['u_name']=$row['user_name'];
			$_SESSION['u_pass']=$row['user_pass'];
			
			header("Location:home.php?login success!");
			exit();
		}
	}
}

}
else
{
	header("Location:home.php");
	exit();
}




?>