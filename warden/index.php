<?php
session_start();
require '../include/conn.php';

if ($conn->connect_error) {
    die("Sambungan ke pangkalan data gagal: " . $conn->connect_error);
}

if (!isset($_SESSION['idpelajar'])) {
    header('location: ../login.php');
    exit();
}

$idpelajar = $_SESSION['idpelajar'];

$sql = "SELECT idperalatan FROM peralatan WHERE idpelajar = $idpelajar";

$result = $conn->query($sql);

if ($result === false) {
    die("Error in SQL query: " . $conn->error);
}

if ($result->num_rows > 0) {
    echo "Senarai peralatan milik pelajar ID $idpelajar:<br>";
    while ($row = $result->fetch_assoc()) {
        echo $row["idperalatan"] . "<br>";
    }
} else {
    echo "Tiada peralatan dijumpai untuk pelajar ID $idpelajar.";
}

$conn->close();
?>
