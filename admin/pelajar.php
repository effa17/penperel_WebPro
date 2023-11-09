<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warden</title>
</head>
<body>
<h1>Senarai Warden</h1>

    <?php
    if (!isset($_GET['edit'])) {
        ?>
<form action="simpan.php" method="post">
    <fieldset>
        <legend>Daftar Warden</legend>
        <table>
            <tr>
                <td>Nama Warden</td>
                <td><input type="text" name="namawarden" required ></td>
            </tr>

            <tr>
                <td>No KP Warden</td>
                <td><input type="text" name="nokpwarden" required></td>
            </tr>

            <tr>
                <td>Kata Laluan</td>
                <td><input type="text" name="katalaluan" required></td>
            </tr>
            <tr>
                <td colspan="2" class="btn-group">
                    <button type="submit">SIMPAN</button>
                    <button type="reset">BATAL</button>
                </td>
            </tr>
        </table>
    </fieldset>
</form> <br><br><br>
<?php
    } else {
        $idwarden =$_GET['edit'];
        $sql = "SELECT * FROM warden WHERE idwarden = $idwarden";
        $result = $conn->query($sql);
        $row = $result->fetch_object();
?>
<form action="update.php" method="post">
    <input type="hidden" name="idwarden" value="<?php echo $row->idwarden; ?>">
    <fieldset>
        <legend>Update Data Warden</legend>
        <table>
            <tr>
                <td>Nama Warden</td>
                <td><input type="text" name="namawarden" required value="<?php echo $row->namawarden;?>"></td>
            </tr>
            <tr>
                <td>No KP Warden</td>
                <td><input type="text" name="nokpwarden" required value="<?php echo $row->nokpwarden;?>"></td>
            </tr>
            <tr>
                <td>Kata Laluan</td>
                <td><input type="text" name="katalaluan" required value="<?php echo $row->katalaluan;?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="btn-group">
                    <button type="submit">SIMPAN</button>
                    <button type="reset" >BATAL</button>
                </td>
            </tr>
        </table>
    </fieldset>
</form>
<?php
    }
?>

<table class="table">
    <tr>
        <th>Bil</th>
        <th>Nama Warden</th>
        <th>No KP Warden</th>
        <th>Kata Laluan</th>
        <th>Tindakan</th>
    </tr>

<?php
$bil = 1;
$sql = "SELECT * FROM warden ORDER By namawarden";
$result =$conn->query($sql);
while ($row= $result->fetch_object()) {
    ?>
<tr>
    <td><?php echo $bil++; ?></td>
    <td><?php echo $row->namawarden; ?></td>
    <td><?php echo $row->nokpwarden; ?></td>
    <td><?php echo $row->katalaluan; ?></td>
    <td>
        <a href="index.php?menu=pelajar&edit=<?php echo $row->idwarden; ?>" class="btn-edit">Edit</a>

        <a href="padam.php?idwarden<?php echo $row->idwarden; ?>" onclick="return confirm('Adakah anda pasti?')" class="btn-edit">Padam</a>
    </td>
</tr>
<?php
}
?>
</table>
</body>
</html>
