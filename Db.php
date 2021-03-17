<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "test";

// создаем подключения
$con = mysqli_connect($servername, $username, $password,$db);

// проверка подключения
if (!$con) 
{
    die("Connection failed: " . mysqli_connect_error());
} 
