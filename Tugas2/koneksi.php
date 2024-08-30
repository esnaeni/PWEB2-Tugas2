<?php
    // Mendefinisikan kelas Database
    class Database {
        // Deklarasi properti kelas dengan hak akses private dan protected
        private $servername;  // Menyimpan nama server
        private $username;    // Menyimpan username untuk koneksi database
        private $password;    // Menyimpan password untuk koneksi database
        private $database;    // Menyimpan nama database yang digunakan
        protected $conn;      // Menyimpan koneksi database, dapat diakses oleh kelas turunan

        // Konstruktor kelas Database, dijalankan saat objek kelas ini dibuat
        public function __construct(){
            // Inisialisasi properti dengan nilai default
            $this->servername = 'localhost';
            $this->username = 'root';
            $this->password = '';
            $this->database = 'pweb2';

            // Membuat koneksi ke database menggunakan fungsi mysqli_connect
            $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);

            // Memeriksa apakah koneksi berhasil
            if (mysqli_connect_errno()){
                // Jika koneksi gagal, menampilkan pesan error
                echo "Koneksi ke database gagal: " . mysqli_connect_errno();
            }
        }

        // Placeholder untuk metode tampilData, dapat diimplementasikan di kelas turunan
        public function tampilData(){
            // Fungsi ini belum diimplementasikan dalam kelas ini
        }

    }

?>
