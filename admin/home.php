<?php
require '../conn.php';
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <h2>Carian Peralatan Pelajar</h2>

    <form action="" method="post">
        <fieldset>
            <legend>Carian Peralatan</legend>
            <table>
                <tr>
                    <td>No Siri</td>
                    <td><input type="text" name="nosiri" required></td>
                </tr>
                <tr>
                    <td colspan="2" class="btn-group">
                        <button type="submit">CARI</button>
                        <button type="reset" >BATAL</button>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form><br><br><br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $search_term = $_POST["nosiri"];
        $sql = "SELECT * FROM peralatan WHERE nosiri = '$search_term'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $bil = 1;
            ?>
            <table class="table">
                <tr>
                    <th>Bilangan</th>
                    <th>Nama Pelajar</th>
                    <th>Jenis Peralatan</th>
                    <th>Jenama</th>
                    <th>No Siri</th>
                </tr>
                <?php
                while ($row = $result->fetch_object()) {
                    ?>
                    <tr>
                        <td><?php echo $bil++; ?></td>
                        <td><?php echo $row->pelajar; ?></td>
                        <td><?php echo $row->jenisperalatan; ?></td>
                        <td><?php echo $row->jenama; ?></td>
                        <td><?php echo $row->nosiri; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php
        } else {
            echo "Tiada Rekod.";
        }
    }
    ?>
</body>
</html>
