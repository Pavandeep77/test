<?php
$conn = new mysqli("localhost", "root", "", "web");

if (!$conn) {
	die("Connection Failed: ".$conn->connect_error);
}
