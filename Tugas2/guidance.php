<?php
    // Menyertakan file koneksi.php yang berisi kelas Database dan koneksi ke database
    include_once("koneksi.php");

    // Mendeklarasikan kelas Guidance yang merupakan turunan dari kelas Database
    class Guidance extends Database {

        // Mendefinisikan metode tampilData untuk menampilkan data bimbingan, dengan parameter opsional $filter
        public function tampilData($filter = '23012') {

            // Memeriksa apakah ada filter yang diberikan
            if ($filter) {
                // Jika filter diberikan, membuat query SQL untuk mengambil data guidance dan student berdasarkan student_number tertentu
                $query = "SELECT guidance.*, student.name, student.student_number 
                        FROM guidance 
                        INNER JOIN student ON student.id_student = guidance.id_student 
                        WHERE student.student_number = '23012'";
            } else {
                // Jika tidak ada filter, membuat query SQL untuk mengambil semua data guidance dan student tanpa filter
                $query = "SELECT guidance.*, student.name, student.student_number 
                        FROM guidance 
                        INNER JOIN student ON student.id_student = guidance.id_student";
            }

            // Menjalankan query dan menyimpan hasilnya ke dalam variabel $result
            $result = $this->conn->query($query);

            // Mengembalikan hasil query sebagai output dari metode ini
            return $result;
        }
    }
?>
