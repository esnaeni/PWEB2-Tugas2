<?php
    // Menyertakan file koneksi.php yang berisi koneksi ke database
    include("koneksi.php");

    // Menyertakan file guidance.php yang berisi definisi kelas Guidance
    include("guidance.php");

    // Menyertakan file mahasiswa.php yang berisi definisi kelas Mahasiswa
    include("mahasiswa.php");

    // Inisialisasi objek dari kelas Mahasiswa
    $mahasiswa = new Mahasiswa();

    // Memanggil metode tampilData untuk mengambil data mahasiswa
    $result = $mahasiswa->tampilData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik</title>
    <link rel="stylesheet" href="style.css"> <!-- Link ke file CSS -->
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
    }

    /* Styling untuk tabel */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: white;
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

    /* Styling untuk pesan pilihan */
    .message {
        margin-top: 20px;
        font-size: 18px;
        color: #333;
    }
</style>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <ul>
            <li><a href="viewGuid.php">Guidance</a></li>
            <li><a href="viewMHS.php">Students</a></li>
        </ul>
    </nav>

    <!-- Kontainer dengan pesan -->
    <div class="container">
        <p class="message">Silakan pilih salah satu menu di atas untuk melihat data.</p>
    </div>
</body>
</html>
