<?php
//include('credentials.php');

$stringConnection = 'mysql:dbname=testing;host=localhost;';
$user = 'admin_barbara';
$password = 'b01042000H@';

$connect = new PDO($stringConnection, $user, $password);

session_start();

$_SESSION['user_id'] = '1';
