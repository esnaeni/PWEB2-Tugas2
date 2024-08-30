# PWEB2-Tugas2
# koneksi

    <?php
        class Database{
            private $servername;
            private $username;
            private $password;
            private $database;
            protected $conn;
    
            public function __construct(){
                $this->servername = 'localhost';
                $this->username = 'root';
                $this->password = '';
                $this->database = 'pweb2';
    
                $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
    
                if (mysqli_connect_errno()){
                    echo "Koneksi ke database gagal: " . mysqli_connect_errno();
                }
            }
    
            public function tampilData(){
            }
    
        }
    
    ?>

<h6>1. Deklarasi Properti:</h6>
   
  <p>
  private $servername;, private $username;, private $password;, private $database;, Properti ini bersifat private, yang berarti hanya dapat diakses dari dalam kelas Database sendiri. Properti ini digunakan untuk menyimpan informasi koneksi ke database.
  protected $conn;, Properti ini bersifat protected, sehingga bisa diakses oleh kelas turunan dari Database. Properti ini digunakan untuk menyimpan objek koneksi ke database.
  </p>
  
<h6>2. Konstruktor (__construct):</h6>

  <p>
  Konstruktor adalah fungsi yang otomatis dijalankan saat sebuah objek dari kelas ini dibuat.
  $this->servername = 'localhost'; ini menetapkan nama server database.
  $this->username = 'root'; ini menetapkan username untuk login ke database.
  $this->password = ''; ini menetapkan password untuk login ke database.
  $this->database = 'pweb2'; ini menetapkan nama database yang akan digunakan.
  $this->conn = mysqli_connect(...);ini membuat koneksi ke database menggunakan fungsi mysqli_connect() dan menyimpannya dalam properti $conn.
  </p>
  
<h6>3. Pengecekan Koneksi:</h6>

  <p>
  if (mysqli_connect_errno()) { ... }: Mengecek apakah ada kesalahan saat mencoba melakukan koneksi ke database. Jika ada, pesan error akan ditampilkan menggunakan echo.
  </p>

<h6>4. Metode tampilData:</h6>

  <p>
  public function tampilData(){} metode ini adalah placeholder (fungsi kosong) yang didefinisikan di kelas ini. Metode ini tidak memiliki implementasi, karena mungkin akan diimplementasikan di kelas turunan yang memerlukan fungsi ini.
  Kelas Database ini merupakan kelas dasar yang menyediakan fungsi koneksi ke database dan dapat digunakan sebagai dasar bagi kelas-kelas lain yang memerlukan akses ke database. Kelas turunan dapat mengakses koneksi database melalui properti $conn yang bersifat protected.
  </p>

# guidance

    <?php
        include_once("koneksi.php");
    
        class Guidance extends Database {
            public function tampilData($filter = '23012') {
                if ($filter) {
                    $query = "SELECT guidance.*, student.name, student.student_number 
                            FROM guidance 
                            INNER JOIN student ON student.id_student = guidance.id_student 
                            WHERE student.student_number = '23012'";
                } else {
                    $query = "SELECT guidance.*, student.name, student.student_number 
                            FROM guidance 
                            INNER JOIN student ON student.id_student = guidance.id_student";
                }
                $result = $this->conn->query($query);
                return $result;
            }
        }
    ?>

1. <b>include_once("koneksi.php");</b> ini mengimpor file koneksi.php, yang mengandung koneksi ke database dan kelas Database. Menggunakan include_once memastikan bahwa file hanya diimpor satu kali, meskipun diminta beberapa kali.

2. <b>class Guidance extends Database {</b> dideklarasikan sebagai turunan dari kelas Database, sehingga mewarisi properti dan metode dari Database, termasuk koneksi database ($conn).

3. <b>public function tampilData($filter = '23012') {</b> didefinisikan untuk menampilkan data bimbingan. Metode ini memiliki parameter opsional $filter dengan nilai default '23012'.

4. <b>if ($filter) { ... } else { ... }</b> ini memeriksa apakah filter diberikan. Jika ada, query SQL akan difokuskan pada student dengan student_number tertentu. Jika tidak ada filter, query SQL akan menampilkan semua data bimbingan tanpa filter tambahan.

5. <b>$result = $this->conn->query($query);</b> menjalankan query SQL yang telah disusun menggunakan koneksi database yang diambil dari kelas Database, dan menyimpan hasilnya dalam variabel $result.

6. <b>return $result;</b> ini mengembalikan hasil query sebagai output. Output ini biasanya berupa objek yang dapat digunakan untuk menampilkan data bimbingan pada aplikasi.


# Student

    <?php
      include_once("koneksi.php");
  
      class Mahasiswa extends Database {
          public function tampilData($filter = "2") {
              if ($filter) {
                  $query = "SELECT * FROM student WHERE id_class = '2'";
              } else {
                  $query = "SELECT * FROM student";
              }
              $result = $this->conn->query($query);
              return $result;
          }
      }
  ?>


<h6>1. include_once("koneksi.php");</h6>
<p>
Menyertakan file koneksi.php untuk mengimpor definisi kelas Database dan koneksi ke database. Menggunakan include_once memastikan bahwa file ini hanya disertakan satu kali, mencegah duplikasi.
</p>
<h6>2. class Mahasiswa extends Database {</h6>
<p>
Mendeklarasikan kelas Mahasiswa yang merupakan turunan dari kelas Database. Ini berarti Mahasiswa mewarisi semua properti dan metode dari kelas Database, termasuk koneksi ke database ($conn).
</p>
<h6>3. public function tampilData($filter = "2") {</h6>
<p>
Metode tampilData didefinisikan untuk menampilkan data mahasiswa. Metode ini memiliki parameter opsional $filter dengan nilai default "2". Jika tidak ada parameter yang diberikan saat metode dipanggil, nilai default ini akan digunakan.
</p>
<h6>4. if ($filter) { ... } else { ... }</h6>
<p>
Blok kondisional ini memeriksa apakah filter diberikan. Jika $filter memiliki nilai (tidak null atau kosong), query SQL akan difokuskan pada mahasiswa dengan id_class tertentu (dalam kasus ini, kelas dengan ID "2"). Jika tidak ada filter, query SQL akan mengambil semua data mahasiswa tanpa filter tambahan.
</p>
<h6>5. $result = $this->conn->query($query);</h6>
<p>
Baris ini menjalankan query SQL yang telah disusun menggunakan koneksi database yang disimpan dalam properti $conn (yang diwarisi dari kelas Database), dan menyimpan hasilnya dalam variabel $result.
</p>
<h6>6. return $result;</h6>
<p>
Metode ini mengembalikan hasil query sebagai output. Output ini biasanya berupa objek hasil query (misalnya, mysqli result object) yang kemudian dapat digunakan untuk menampilkan data mahasiswa pada aplikasi.
Kelas Mahasiswa ini menggunakan koneksi database yang disediakan oleh kelas Database untuk mengambil data mahasiswa berdasarkan filter tertentu (id_class) atau untuk mengambil semua data mahasiswa jika filter tidak diberikan. Ini adalah implementasi dari konsep pewarisan dalam OOP, di mana kelas Mahasiswa mewarisi dan menggunakan koneksi database dari kelas Database.
</p>

# Index (Tampilan Awal yang akan di munculkan)

    <?php
        include("koneksi.php");
        include("guidance.php");
        include("mahasiswa.php");
    
        // Inisialisasi objek dari kelas Mahasiswa
        $mahasiswa = new Mahasiswa();
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
            <p class="message">Silakan pilih salah satu menu di atas untuk melihat data.
            </p>
        </div>
    </body>
    </html>

<p>
    Kode di atas adalah sebuah contoh halaman web sederhana yang berfungsi sebagai antarmuka untuk sebuah sistem informasi akademik. Halaman ini menghubungkan dengan basis data melalui file <b>koneksi.php</b>, dan memanfaatkan dua class yang berbeda, yaitu <b>Mahasiswa</b> dan <b>Guidance</b>, untuk menampilkan data yang relevan di halaman lain.
    Pada bagian PHP, dilakukan inisialisasi objek dari class <b>Mahasiswa</b>, dan data mahasiswa diambil menggunakan metode <b>tampilData()</b>. Namun, data ini tidak langsung ditampilkan di halaman ini, halaman ini lebih berfungsi sebagai menu utama yang memberikan pilihan kepada pengguna untuk melihat data guidance atau data mahasiswa melalui dua tautan yang tersedia di navbar.
    Bagian HTML dari kode ini membangun struktur dasar halaman dengan menggunakan elemen <b>nav</b> untuk menampilkan navigasi berbentuk navbar. Navbar tersebut memiliki dua item menu yang masing-masing mengarahkan ke halaman <b>viewGuid.php</b> untuk melihat data guidance dan <b>viewMHS.php</b> untuk melihat data mahasiswa.
    Di bagian tengah halaman, terdapat pesan yang menyarankan pengguna untuk memilih salah satu menu yang tersedia. Desain halaman disederhanakan dengan menggunakan CSS yang tertanam langsung di dalam halaman (inline CSS), di mana elemen-elemen seperti body, navbar, container, dan tabel telah diatur tampilannya. 
    Secara keseluruhan, halaman ini berfungsi sebagai halaman depan yang mengarahkan pengguna untuk memilih data yang ingin mereka lihat dalam sistem informasi akademik, dengan desain yang minimalis dan antarmuka yang mudah dipahami.
</p>

# viewMHS (Tampilan untuk menampilkan data pada tabel student)

    <?php
        include("koneksi.php");
        include("mahasiswa.php");
        
        // Inisialisasi objek dari kelas Mahasiswa
        $mahasiswa = new Mahasiswa();
        
        // Cek apakah ada filter berdasarkan id_class
        $filter = isset($_GET['id_class']) ? $_GET['id_class'] : null;
        $result = $mahasiswa->tampilData($filter);
        ?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Student Data</title>
            <link rel="stylesheet" href="style.css">
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
            <nav class="navbar">
                <ul>
                    <li><a href="viewMHS.php">All Student Data</a></li>
                    <li><a href="viewMHS.php?id_class=SPECIFIC_CLASS_ID">Filter by Class ID</a></li>
                </ul>
            </nav>
        
            <div class="container">
                <a href="index.php" class="back-button">Kembali</a>
        
                <h2>Student Data</h2>
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
                        if ($result->num_rows > 0) {
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
                            echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
                        }
                    ?>
                </table>
            </div>
        </body>
        </html>

<p>
    Kode di atas adalah halaman web yang menampilkan data mahasiswa dari sebuah sistem informasi akademik. Halaman ini menghubungkan dengan database melalui file <b>koneksi.php</b> dan menggunakan class <b><b>Mahasiswa</b> untuk mengambil data mahasiswa dari database.
    Bagian pertama kode PHP melakukan inisialisasi objek dari class <b>Mahasiswa</b> dan memanggil metode <b>tampilData()</b> untuk mendapatkan data mahasiswa. Metode ini dapat menerima parameter <b>id_class</b> untuk menyaring data berdasarkan ID class tertentu, jika parameter tersebut tersedia di URL.
    Bagian HTML membangun struktur halaman yang meliputi elemen-elemen seperti navbar, kontainer utama, dan tabel data. Navbar berfungsi sebagai navigasi, menyediakan dua tautan satu untuk melihat semua data mahasiswa dan satu lagi untuk memfilter data berdasarkan ID class (dengan placeholder <b>SPECIFIC_CLASS_ID</b> yang seharusnya diganti dengan ID class yang relevan). 
    Kontainer utama menampung tabel yang menampilkan data mahasiswa. Tabel ini memiliki kolom untuk nomor urut, ID class, nama, nomor mahasiswa, nomor telepon, alamat, dan tanda tangan. Jika hasil query dari database mengembalikan baris data, tabel akan diisi dengan data tersebut. Jika tidak ada data yang ditemukan, tabel akan menampilkan pesan "Tidak ada data" di baris yang ditambahkan untuk mengisi seluruh kolom tabel.
    Desain halaman ini menggunakan CSS internal untuk mengatur tampilan elemen-elemen seperti body, navbar, tabel, dan tombol. CSS ini memastikan tampilan yang bersih dan responsif, dengan elemen-elemen yang dipusatkan secara horizontal, bayangan di sekitar kontainer untuk efek kedalaman, dan perubahan warna pada hover untuk tautan dan tombol.
</p>

# viewGuid (Menampilkan data pada tabel guidance)

    <?php
        include("koneksi.php");
        include("guidance.php");
        
        // Inisialisasi objek dari kelas Guidance
        $guidance = new Guidance();
        
        // Cek apakah ada filter berdasarkan student_number
        $filter = isset($_GET['student_number']) ? $_GET['student_number'] : null;
        $result = $guidance->tampilData($filter);
        ?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Guidance Data</title>
            <link rel="stylesheet" href="style.css">
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
            <nav class="navbar">
                <ul>
                    <li><a href="viewGuid.php">All Guidance Data</a></li>
                    <li><a href="viewGuid.php?student_number=SPECIFIC_STUDENT_NUMBER">Filter by Student Number</a></li>
                </ul>
            </nav>
        
            <div class="container">
                <a href="index.php" class="back-button">Kembali</a>
        
                <h2>Guidance Data</h2>
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>ID Guidance</th>
                        <th>ID Student</th>
                        <th>Nama Mahasiswa</th>
                        <th>Student Number</th>
                        <th>Problem</th>
                        <th>Solution</th>
                    </tr>
        
                    <?php
                        $no = 1;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>".$no++."</td>";
                                echo "<td>".$row['id_guidance']."</td>";
                                echo "<td>".$row['id_student']."</td>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['student_number']."</td>";
                                echo "<td>".$row['problem']."</td>";
                                echo "<td>".$row['solution']."</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
                        }
                    ?>
                </table>
            </div>
        </body>
        </html>

<p>
    Kode di atas merupakan halaman web yang menampilkan data terkait bimbingan atau guidance mahasiswa dari sebuah sistem informasi akademik. Pada bagian PHP, kode ini mulai dengan mengimpor file <b>koneksi.php</b> untuk koneksi ke database dan <b>guidance.php</b> untuk class yang mengelola data bimbingan. Setelah itu, objek dari class <b>Guidance</b> diinisialisasi untuk memungkinkan akses ke metode-metode yang ada dalam class tersebut. Metode <b>tampilData()</b> dipanggil untuk mengambil data bimbingan. Metode ini juga bisa menerima parameter <b>student_number</b> untuk menyaring data berdasarkan nomor mahasiswa jika parameter tersebut tersedia dalam URL.
    Di bagian HTML, struktur halaman dibangun dengan elemen-elemen seperti navbar, kontainer utama, dan tabel data. Navbar memiliki dua tautan satu untuk melihat semua data bimbingan dan satu lagi untuk memfilter data berdasarkan nomor mahasiswa (dengan placeholder <b>SPECIFIC_STUDENT_NUMBER</b> yang harus diganti dengan nomor mahasiswa yang relevan). 
    Kontainer utama berisi tabel yang menampilkan data bimbingan. Tabel ini memiliki kolom untuk nomor urut, ID bimbingan, ID mahasiswa, nama mahasiswa, nomor mahasiswa, masalah yang dihadapi, dan solusi yang diberikan. Jika ada data yang dikembalikan oleh query, tabel akan diisi dengan baris data tersebut. Jika tidak ada data, tabel akan menampilkan pesan "Tidak ada data" di baris yang meliputi seluruh kolom.
    Desain halaman ini menggunakan CSS internal untuk mengatur gaya elemen-elemen seperti body, navbar, tabel, dan tombol. CSS ini menciptakan tampilan yang bersih dan responsif dengan elemen yang dipusatkan secara horizontal, bayangan di sekitar kontainer untuk efek kedalaman, serta perubahan warna pada hover untuk tautan dan tombol.
</p>

# Output Yang dihasilkan
<h4>1. Tampilan Utama</h4>
