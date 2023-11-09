<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Pelajar</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
<h1>Senarai Pelajar</h1>

<!-- Borang Pendaftaran -->
<form id="borangPendaftaran">
    <label for="namaPelajar">Nama Pelajar:</label>
    <input type="text" id="namaPelajar" name="namaPelajar" required>
    <span class="error-message" id="errorNamaPelajar"></span><br><br>

    <label for="noKpPelajar">No Kp Pelajar:</label>
    <input type="text" id="noKpPelajar" name="noKpPelajar" required>
    <span class="error-message" id="errorNoKpPelajar"></span><br><br>

    <label for="jenisPeralatan">Jenis Peralatan:</label>
    <input type="text" id="jenisPeralatan" name="jenisPeralatan" required>
    <span class="error-message" id="errorJenisPeralatan"></span><br><br>

    <label for="jenama">Jenama:</label>
    <input type="text" id="jenama" name="jenama" required>
    <span class="error-message" id="errorJenama"></span><br><br>

    <label for="noSiri">No Siri:</label>
    <input type="text" id="noSiri" name="noSiri" required>
    <span class="error-message" id="errorNoSiri"></span><br><br>

    <!-- Mesej kesalahan -->
    <p class="error-message" id="errorMessage"></p>

    <button type="button" id="simpanButton" onclick="simpanData()">SIMPAN</button>
    <button type="button" id="kemaskiniButton" onclick="kemaskiniData()" style="display: none;">KEMASKINI</button>
    <button type="button" onclick="batal()">BATAL</button>
</form>

<hr>

<!-- Senarai Pelajar dalam Jadual -->
<h2>Senarai Pelajar</h2>
<table>
    <thead>
    <tr>
        <th>Bil</th>
        <th>Nama Pelajar</th>
        <th>No Kp Pelajar</th>
        <th>Jenis Peralatan</th>
        <th>Jenama</th>
        <th>No Siri</th>
        <th>Tindakan</th>
    </tr>
    </thead>
    <tbody id="senaraiPelajar">
    <!-- Data pelajar akan dipaparkan di sini -->
    </tbody>
</table>

<script>
    var bilanganPelajar = 1; // Inisialisasi bilangan pelajar

    // Fungsi untuk memeriksa apakah semua input telah diisi
    function periksaIsian() {
        var namaPelajar = document.getElementById("namaPelajar").value;
        var noKpPelajar = document.getElementById("noKpPelajar").value;
        var jenisPeralatan = document.getElementById("jenisPeralatan").value;
        var jenama = document.getElementById("jenama").value;
        var noSiri = document.getElementById("noSiri").value;

        // Reset pesan kesalahan
        document.getElementById("errorNoKpPelajar").textContent = "";
        document.getElementById("errorNoSiri").textContent = "";

        // Periksa jika semua input telah diisi
        if (namaPelajar && noKpPelajar && jenisPeralatan && jenama && noSiri) {
            // Aktifkan tombol Simpan jika tidak ada kesalahan
            document.getElementById("simpanButton").disabled = false;
        } else {
            document.getElementById("simpanButton").disabled = true;
        }
    }

    // Panggil fungsi periksaIsian setiap kali ada perubahan pada input
    document.getElementById("namaPelajar").addEventListener("input", periksaIsian);
    document.getElementById("noKpPelajar").addEventListener("input", periksaIsian);
    document.getElementById("jenisPeralatan").addEventListener("input", periksaIsian);
    document.getElementById("jenama").addEventListener("input", periksaIsian);
    document.getElementById("noSiri").addEventListener("input", periksaIsian);

    // Fungsi untuk menampilkan pesan kesalahan
    function tampilkanKesalahan(message) {
        document.getElementById("errorMessage").textContent = message;
    }

    // Fungsi untuk menyembunyikan pesan kesalahan
    function sembunyikanKesalahan() {
        document.getElementById("errorMessage").textContent = "";
    }

    // Fungsi untuk memeriksa kesamaan Nomor Kp Pelajar dalam tabel
    function isDuplicateNoKp(noKp) {
        var table = document.getElementById("senaraiPelajar");
        for (var i = 1; i < table.rows.length; i++) {
            var row = table.rows[i];
            var noKpPelajar = row.cells[2].innerHTML;
            if (noKp === noKpPelajar) {
                return true;
            }
        }
        return false;
    }

    // Fungsi untuk memeriksa kesamaan Nomor Siri dalam tabel
    function isDuplicateNoSiri(noSiri) {
        var table = document.getElementById("senaraiPelajar");
        for (var i = 1; i < table.rows.length; i++) {
            var row = table.rows[i];
            var noSiriPeralatan = row.cells[5].innerHTML;
            if (noSiri === noSiriPeralatan) {
                return true;
            }
        }
        return false;
    }

    // Fungsi untuk memeriksa validitas input sebelum menyimpan data
    function periksaValiditasInput(namaPelajar, noKpPelajar, jenisPeralatan, jenama, noSiri) {
        if (isDuplicateNoKp(noKpPelajar)) {
            tampilkanKesalahan("Rekod dengan nomor kad pengenalan yang sama telah wujud dalam jadual.");
            return false;
        }

        if (isDuplicateNoSiri(noSiri)) {
            tampilkanKesalahan("Rekod dengan nomor siri yang sama telah wujud dalam jadual.");
            return false;
        }

        sembunyikanKesalahan();
        return true;
    }

    // Fungsi untuk menyimpan data pelajar ke dalam tabel
    function simpanData() {
        var namaPelajar = document.getElementById("namaPelajar").value;
        var noKpPelajar = document.getElementById("noKpPelajar").value;
        var jenisPeralatan = document.getElementById("jenisPeralatan").value;
        var jenama = document.getElementById("jenama").value;
        var noSiri = document.getElementById("noSiri").value;

        // Periksa validitas input sebelum menyimpan data
        if (!periksaValiditasInput(namaPelajar, noKpPelajar, jenisPeralatan, jenama, noSiri)) {
            return;
        }

        var dataPelajar = {
            nama: namaPelajar,
            noKp: noKpPelajar,
            peralatan: jenisPeralatan,
            jenama: jenama,
            noSiri: noSiri
        };

        // Simpan data pelajar ke Local Storage
        localStorage.setItem("pelajar_" + bilanganPelajar, JSON.stringify(dataPelajar));

        // Tambahkan data ke dalam tabel
        tambahDataKeTabel(dataPelajar);

        // Resetkan borang pendaftaran
        document.getElementById("borangPendaftaran").reset();
        document.getElementById("simpanButton").disabled = true;

        // Tambah bilangan pelajar setiap kali data disimpan
        bilanganPelajar++;
    }

    // Fungsi untuk menambah data pelajar ke dalam tabel
    function tambahDataKeTabel(data) {
        var senaraiPelajar = document.getElementById("senaraiPelajar");
        var row = senaraiPelajar.insertRow();
        var cellBil = row.insertCell(0);
        var cellNama = row.insertCell(1);
        var cellNoKp = row.insertCell(2);
        var cellJenisPeralatan = row.insertCell(3);
        var cellJenama = row.insertCell(4);
        var cellNoSiri = row.insertCell(5);
        var cellTindakan = row.insertCell(6);

        cellBil.innerHTML = bilanganPelajar;
        cellNama.innerHTML = data.nama;
        cellNoKp.innerHTML = data.noKp;
        cellJenisPeralatan.innerHTML = data.peralatan;
        cellJenama.innerHTML = data.jenama;
        cellNoSiri.innerHTML = data.noSiri;
        cellTindakan.innerHTML = '<button onclick="editData(this)">Edit</button> <button onclick="padamData(this)">Padam</button>';
    }

    // Fungsi untuk mengaktifkan tombol "Edit" saat mengkliknya
    function editData(button) {
        var row = button.parentNode.parentNode;
        var noKpPelajar = row.cells[2].innerHTML;
        var noSiriPeralatan = row.cells[5].innerHTML;

        // Isi kembali borang pendaftaran dengan data yang akan diedit
        document.getElementById("namaPelajar").value = row.cells[1].innerHTML;
        document.getElementById("noKpPelajar").value = noKpPelajar;
        document.getElementById("jenisPeralatan").value = row.cells[3].innerHTML;
        document.getElementById("jenama").value = row.cells[4].innerHTML;
        document.getElementById("noSiri").value = noSiriPeralatan;

        // Sembunyikan tombol "SIMPAN" dan aktifkan tombol "KEMASKINI"
        document.getElementById("simpanButton").style.display = "none";
        document.getElementById("kemaskiniButton").style.display = "block";

        // Simpan data yang akan diedit dalam data-attribute
        document.getElementById("borangPendaftaran").setAttribute("data-edit-index", row.rowIndex);
    }

    // Fungsi untuk mengaktifkan tombol "Padam" saat mengkliknya
    function padamData(button) {
        var konfirmasi = confirm("Adakah anda pasti untuk memadam rekod ini?");
        if (konfirmasi) {
            var row = button.parentNode.parentNode;
            row.remove();
            // Hapus data dari Local Storage (berdasarkan bilanganPelajar atau data lain yang sesuai)
            var key = "pelajar_" + row.cells[0].innerHTML;
            localStorage.removeItem(key);
        }
    }

    // Fungsi untuk memuat data dari Local Storage saat halaman dimuat
    function muatDataDariLocalStorage() {
        for (var i = 1; i <= localStorage.length; i++) {
            var key = "pelajar_" + i;
            var data = JSON.parse(localStorage.getItem(key));
            if (data) {
                tambahDataKeTabel(data);
                bilanganPelajar++; // Tambah bilangan pelajar
            }
        }
    }

    // Panggil fungsi untuk memuat data dari Local Storage saat halaman dimuat
    muatDataDariLocalStorage();

    // Fungsi untuk membatalkan pengeditan dan reset borang
    function batal() {
        document.getElementById("borangPendaftaran").reset();
        document.getElementById("simpanButton").style.display = "block";
        document.getElementById("kemaskiniButton").style.display = "none";
        document.getElementById("borangPendaftaran").removeAttribute("data-edit-index");
    }

    // Fungsi untuk mengemaskini data pelajar yang sedang diedit
    function kemaskiniData() {
        var editIndex = document.getElementById("borangPendaftaran").getAttribute("data-edit-index");
        if (editIndex !== null) {
            var namaPelajar = document.getElementById("namaPelajar").value;
            var noKpPelajar = document.getElementById("noKpPelajar").value;
            var jenisPeralatan = document.getElementById("jenisPeralatan").value;
            var jenama = document.getElementById("jenama").value;
            var noSiri = document.getElementById("noSiri").value;

            // Update data dalam tabel
            var table = document.getElementById("senaraiPelajar");
            var row = table.rows[editIndex];
            row.cells[1].innerHTML = namaPelajar;
            row.cells[2].innerHTML = noKpPelajar;
            row.cells[3].innerHTML = jenisPeralatan;
            row.cells[4].innerHTML = jenama;
            row.cells[5].innerHTML = noSiri;

            // Resetkan borang pendaftaran dan tombol
            document.getElementById("borangPendaftaran").reset();
            document.getElementById("simpanButton").style.display = "block";
            document.getElementById("kemaskiniButton").style.display = "none";

            // Hapus data-edit-index dari borang pendaftaran
            document.getElementById("borangPendaftaran").removeAttribute("data-edit-index");
        }
    }
</script>
</body>
</html>