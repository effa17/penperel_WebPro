<?php
require '../conn.php';

$idwarden=$_POST['idwarden'];
$namawarden = $_POST['namawarden'];
$nokpwarden = $_POST['nokpwarden'];
$katalaluan = $_POST['katalaluan'];

$sql = "UPDATE warden
        SET namawarden = '$namawarden', nokpwarden = '$nokpwarden', katalaluan='$katalaluan'
        WHERE idwarden = $idwarden";
$conn->query($sql);

header('location: index.php?menu=pelajar');