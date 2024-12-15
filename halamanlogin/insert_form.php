<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "risk_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$tujuan = $_POST['tujuan'];
$kodeRisiko = $_POST['kodeRisiko'];
$prosesBisnis = $_POST['prosesBisnis'];
$kelompok = $_POST['kelompok'];
$sumber = $_POST['sumber'];
$uraianPeristiwa = $_POST['uraianPeristiwa'];
$penyebabRisiko = $_POST['penyebabRisiko'];
$akibatQualitative = $_POST['akibatQualitative'];
$akibatFinansial = $_POST['akibatFinansial'];
$pemilikRisiko = $_POST['pemilikRisiko'];
$departemen = $_POST['departemen'];
$inherentLikelihood = $_POST['inherentLikelihood'];
$inherentImpact = $_POST['inherentImpact'];
$residualLikelihood = $_POST['residualLikelihood'];
$residualImpact = $_POST['residualImpact'];
$mitigasiLikelihood = $_POST['mitigasiLikelihood'];
$mitigasiImpact = $_POST['mitigasiImpact'];
$control = $_POST['control'];
$memadai = $_POST['memadai'];
$status = $_POST['status'];
$mitigasi = $_POST['mitigasi'];
$perlakuan = $_POST['perlakuan'];

// Query untuk memasukkan data ke dalam tabel
$sql = "INSERT INTO form_risiko 
(tujuan, kode_risiko, proses_bisnis, kelompok, sumber, uraian_peristiwa, penyebab_risiko, 
akibat_qualitative, akibat_finansial, pemilik_risiko, departemen, 
inherent_likelihood, inherent_impact, residual_likelihood, residual_impact, 
mitigasi_likelihood, mitigasi_impact, control, memadai, status, mitigasi, perlakuan) 
VALUES 
('$tujuan', '$kodeRisiko', '$prosesBisnis', '$kelompok', '$sumber', '$uraianPeristiwa', 
'$penyebabRisiko', '$akibatQualitative', '$akibatFinansial', '$pemilikRisiko', '$departemen', 
$inherentLikelihood, $inherentImpact, $residualLikelihood, $residualImpact, 
$mitigasiLikelihood, $mitigasiImpact, '$control', '$memadai', '$status', '$mitigasi', '$perlakuan')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Data berhasil disimpan!');
        window.location.href = 'layout.php';
    </script>";
} else {
    echo "<script>
        alert('Error: " . $conn->error . "');
        window.history.back();
    </script>";
}

$conn->close();
?>
