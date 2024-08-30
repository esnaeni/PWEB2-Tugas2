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

# 
