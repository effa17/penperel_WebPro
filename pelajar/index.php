<?php
require '../include/conn.php';
if (!isset($_SESSION['idpelajar'])) header('location: ../login.php');
?>

<!DOCTYPE html>
<?php
session_start();
require '../include/conn.php';

if (!isset($_SESSION['idpelajar'])) {
    header('location: ../login.php');
    exit();
}

$menu = 'home';

if (isset($_GET['menu'])) {
    $allowedMenus = ['home', 'senaraiPelajar', 'senaraiPeralatan'];
    $menu = in_array($_GET['menu'], $allowedMenus) ? $_GET['menu'] : 'home';
}

include "$menu.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelajar Page</title>
</head>
<body>
<table>
    <tr>
        <td>Pelajar</td>
        <td class="navbar">
            <a href="index.php?menu=home">Home</a>
            <a href="index.php?menu=senaraiPelajar">Senarai Pelajar</a>
            <a href="index.php?menu=senaraiPeralatan">Senarai Peralatan</a>
        </td>
    </tr>
</table>
</body>
</html>