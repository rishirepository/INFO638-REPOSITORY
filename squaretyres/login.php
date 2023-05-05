<?php // login.php
$host = 'localhost'; 
$data = 'rmudalia_638'; 
$user = 'rmudalia_mysql'; 
$pass = 'T5OfGTmLqSy0'; 
$chrs = 'utf8mb4';
$attr = "mysql:host=$host;dbname=$data;charset=$chrs";
$opts =
[
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES => false,
];
?>
