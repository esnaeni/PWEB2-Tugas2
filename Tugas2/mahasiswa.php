<?php
    // Menyertakan file koneksi.php yang berisi definisi kelas Database dan koneksi ke database
    include_once("koneksi.php");

    // Mendefinisikan kelas Mahasiswa yang merupakan turunan dari kelas Database
    class Mahasiswa extends Database {

        // Mendefinisikan metode tampilData untuk menampilkan data mahasiswa, dengan parameter opsional $filter
        public function tampilData($filter = "2") {
            // Memeriksa apakah filter diberikan
            if ($filter) {
                // Jika filter diberikan, membuat query SQL untuk mengambil data mahasiswa berdasarkan id_class tertentu
                $query = "SELECT * FROM student WHERE id_class = '2'";
            } else {
                // Jika tidak ada filter, membuat query SQL untuk mengambil semua data mahasiswa
                $query = "SELECT * FROM student";
            }

            // Menjalankan query dan menyimpan hasilnya ke dalam variabel $result
            $result = $this->conn->query($query);

            // Mengembalikan hasil query sebagai output dari metode ini
            return $result;
        }
    }
?>
