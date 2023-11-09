<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'penperel';

$conn = new mysqli($host, $user, $password, $dbname);
session_start();
