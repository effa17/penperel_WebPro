<?php
require '../include/conn.php';

if ($conn->connect_error) {
    die("Sambungan ke pangkalan data gagal: " . $conn->connect_error);
}

$idpelajar = $_POST['idpelajar'];

$sql = "SELECT PERALATAN FROM idperalatan WHERE idpelajar = $idpelajar";

$result = $conn->query($sql);

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
