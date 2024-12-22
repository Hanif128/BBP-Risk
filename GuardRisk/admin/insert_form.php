<?php
// Parent Class untuk koneksi database
class Database {
    private $servername; // Tetap private
    private $username;   // Tetap private
    private $password;   // Tetap private
    private $dbname;     // Tetap private
    public $conn;

    // Constructor untuk inisialisasi properti
    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        // Buat koneksi
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Periksa koneksi
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Getter untuk properti
    protected function getServername() {
        return $this->servername;
    }

    protected function getUsername() {
        return $this->username;
    }

    protected function getPassword() {
        return $this->password;
    }

    protected function getDbname() {
        return $this->dbname;
    }

    // Tutup koneksi
    public function closeConnection() {
        $this->conn->close();
    }
}

// Child Class yang mewarisi Database
class RiskDatabase extends Database {
    public function __construct($servername, $username, $password, $dbname) {
        parent::__construct($servername, $username, $password, $dbname);
    }

    // Method tambahan di Child Class
    public function query($sql) {
        return $this->conn->query($sql);
    }

    // Contoh penggunaan getter dari parent
    public function printConnectionDetails() {
        echo "Server: " . $this->getServername() . "<br>";
        echo "User: " . $this->getUsername() . "<br>";
        echo "Database: " . $this->getDbname() . "<br>";
    }
}

// Class untuk operasi database (CRUD)
class FormRisiko {
    private $db;

    // Constructor untuk menerima instance Database
    public function __construct(RiskDatabase $db) {
        $this->db = $db;
    }

    public function insertData($data) {
        $sql = "INSERT INTO form_risiko 
        (tujuan, kode_risiko, proses_bisnis, kelompok, sumber, uraian_peristiwa, penyebab_risiko, 
        akibat_qualitative, akibat_finansial, pemilik_risiko, departemen, 
        inherent_likelihood, inherent_impact, residual_likelihood, residual_impact, 
        mitigasi_likelihood, mitigasi_impact, control, memadai, status, mitigasi, perlakuan) 
        VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->conn->prepare($sql);

        if ($stmt === false) {
            die("Error preparing statement: " . $this->db->conn->error);
        }

        $stmt->bind_param(
            "ssssssssssiiiiiiisssss",
            $data['tujuan'],
            $data['kodeRisiko'],
            $data['prosesBisnis'],
            $data['kelompok'],
            $data['sumber'],
            $data['uraianPeristiwa'],
            $data['penyebabRisiko'],
            $data['akibatQualitative'],
            $data['akibatFinansial'],
            $data['pemilikRisiko'],
            $data['departemen'],
            $data['inherentLikelihood'],
            $data['inherentImpact'],
            $data['residualLikelihood'],
            $data['residualImpact'],
            $data['mitigasiLikelihood'],
            $data['mitigasiImpact'],
            $data['control'],
            $data['memadai'],
            $data['status'],
            $data['mitigasi'],
            $data['perlakuan']
        );

        if ($stmt->execute()) {
            echo "<script>
                alert('Data berhasil disimpan!');
                window.location.href = 'chart.php';
            </script>";
        } else {
            echo "<script>
                alert('Error: " . $stmt->error . "');
                window.history.back();
            </script>";
        }

        $stmt->close();
    }
}

// Inisialisasi database dan operasi CRUD
$db = new RiskDatabase("localhost", "root", "", "risk_management");
$formRisiko = new FormRisiko($db);

// Ambil data dari form
$data = [
    'tujuan' => $_POST['tujuan'],
    'kodeRisiko' => $_POST['kodeRisiko'],
    'prosesBisnis' => $_POST['prosesBisnis'],
    'kelompok' => $_POST['kelompok'],
    'sumber' => $_POST['sumber'],
    'uraianPeristiwa' => $_POST['uraianPeristiwa'],
    'penyebabRisiko' => $_POST['penyebabRisiko'],
    'akibatQualitative' => $_POST['akibatQualitative'],
    'akibatFinansial' => $_POST['akibatFinansial'],
    'pemilikRisiko' => $_POST['pemilikRisiko'],
    'departemen' => $_POST['departemen'],
    'inherentLikelihood' => $_POST['inherentLikelihood'],
    'inherentImpact' => $_POST['inherentImpact'],
    'residualLikelihood' => $_POST['residualLikelihood'],
    'residualImpact' => $_POST['residualImpact'],
    'mitigasiLikelihood' => $_POST['mitigasiLikelihood'],
    'mitigasiImpact' => $_POST['mitigasiImpact'],
    'control' => $_POST['control'],
    'memadai' => $_POST['memadai'],
    'status' => $_POST['status'],
    'mitigasi' => $_POST['mitigasi'],
    'perlakuan' => $_POST['perlakuan']
];

// Simpan data
$formRisiko->insertData($data);

// Tutup koneksi
$db->closeConnection();
?>
