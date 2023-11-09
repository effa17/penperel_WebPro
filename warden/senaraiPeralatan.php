<?php
global $conn;
require_once('../include/conn.php');


if (isset($_POST['studentid'])) {
    $studentid = $_POST['studentid'];
} else {
    die("Error: Student ID not provided.");
}

$sql = "SELECT jenisperalatan, 
        FROM peralatan
        WHERE pelajar = $studentid";

$result = $conn->query($sql);

if ($result) {
    // Fetch the results
    $jenisperalatan = [];
    while ($row = $result->fetch_object()) {
        $jenisperalatan[] = $row;
    }

    // Display the equipment list
    echo "<h1>Senarai Peralatan Pelajar</h1><br>";
    echo "<table>";
    echo "<tr><th>IDPeralatan</th><th>Pelajar</th><th>Jenis Peralatan</th><th>Jenama</th><th>No Siri</th></tr>";

    foreach ($jenisperalatan as $peralatan) {
        echo "<tr>";
        echo "<td>" . $peralatan['idperalatan'] . "</td>";
        echo "<td>" . $peralatan['jenisperalatan'] . "</td>";
        echo "<td>" . $peralatan['jenama'] . "</td>";
        echo "<td>" . $peralatan['nosiri'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Error executing the query: " . $conn->error;
}

// Close the MySQLi connection
$conn->close();
?>