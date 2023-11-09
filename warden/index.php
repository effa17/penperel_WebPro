<?php
require '../include/conn.php';
if (!isset($_SESSION['idwarden'])) header('location: ../login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warden Page</title>
</head>
<body>
<table>
    <tr>
        <td>Warden</td>
        <td class="navbar">
            <a href="index.php?menu=home">Home</a>
            <a href="index.php?menu=senaraiPelajar">Senarai Pelajar</a>
            <a href="index.php?menu=senaraiPeralatan">Senarai Peralatan</a>

        </td>
    </tr>
</table>

<?php
$menu = 'home';
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
}
include "$menu.php";
?>

</body>
</html>