<?php
// Menyertakan file koneksi.php yang berisi pengaturan koneksi ke database
include("koneksi.php");

// Menyertakan file mahasiswa.php yang berisi definisi kelas Mahasiswa
include("mahasiswa.php");

// Inisialisasi objek dari kelas Mahasiswa
$mahasiswa = new Mahasiswa();

// Cek apakah ada filter berdasarkan id_class dari parameter GET
$filter = isset($_GET['id_class']) ? $_GET['id_class'] : null;

// Memanggil metode tampilData dengan filter yang sesuai (jika ada)
$result = $mahasiswa->tampilData($filter);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <link rel="stylesheet" href="style.css"> <!-- Menyertakan file CSS eksternal -->
</head>
<style>
    /* Styling untuk body */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    /* Styling untuk navbar */
    .navbar {
        background-color: #333;
        overflow: hidden;
    }

    .navbar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center; /* Pusatkan menu secara horizontal */
    }

    .navbar ul li {
        float: left;
    }

    .navbar ul li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 20px;
        text-decoration: none;
    }

    .navbar ul li a:hover {
        background-color: #575757;
    }

    /* Styling untuk kontainer */
    .container {
        padding: 20px;
        max-width: 1200px; /* Membatasi lebar kontainer untuk tampilan yang lebih baik */
        margin: 0 auto; /* Pusatkan kontainer secara horizontal */
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Tambahkan bayangan untuk efek depth */
    }

    /* Styling untuk tabel */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fff;
    }

    table th, table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    table th {
        background-color: #333;
        color: white;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #e1e1e1;
    }

    /* Styling untuk heading */
    h2 {
        color: #333;
        border-bottom: 2px solid #333;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    /* Styling untuk tombol kembali */
    .back-button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        color: white;
        background-color: #333;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .back-button:hover {
        background-color: #575757;
    }

</style>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <ul>
            <li><a href="viewMHS.php">All Student Data</a></li>
            <li><a href="viewMHS.php?id_class=SPECIFIC_CLASS_ID">Filter by Class ID</a></li>
        </ul>
    </nav>

    <!-- Kontainer untuk menampilkan data -->
    <div class="container">
        <a href="index.php" class="back-button">Kembali</a>

        <h2>Student Data</h2>

        <!-- Tabel untuk menampilkan data dari database -->
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Class ID</th>
                <th>Name</th>
                <th>Student Number</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Signature</th>
            </tr>

            <?php
                $no = 1;
                // Memeriksa apakah ada hasil yang ditemukan dari query
                if ($result->num_rows > 0) {
                    // Mengulang setiap baris hasil query dan menampilkannya di dalam tabel
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$no++."</td>";
                        echo "<td>".$row['id_class']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['student_number']."</td>";
                        echo "<td>".$row['phone_number']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['signature']."</td>";
                        echo "</tr>";
                    }
                } else {
                    // Jika tidak ada data yang ditemukan, tampilkan pesan di dalam tabel
                    echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>
