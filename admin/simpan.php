<?php
require '../conn.php';

$namawarden = $_POST['namawarden'];
$nokpwarden = $_POST['nokpwarden'];
$katalaluan = $_POST['katalaluan'];

$sql = "INSERT INTO warden VALUES(null, '$namawarden', '$nokpwarden','$katalaluan')";
$conn->query($sql);

header('location: index.php?menu=pelajar');
