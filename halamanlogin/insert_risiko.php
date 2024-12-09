<?php
// Periksa apakah file db.php ada dan include
if (file_exists('db.php')) {
    include 'db.php';
} else {
    die("File koneksi database (db.php) tidak ditemukan.");
}

// Cek apakah form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pastikan variabel $conn ada
    if (!isset($conn)) {
        die("Koneksi ke database gagal.");
    }

    // Ambil data dari form
    $tujuan = $_POST['tujuan'];
    $kode_risiko = $_POST['kodeRisiko'];
    $proses_bisnis = $_POST['prosesBisnis'];
    $kelompok = $_POST['kelompok'];
    $sumber = $_POST['sumber'];
    $uraian_peristiwa = $_POST['uraianPeristiwa'];
    $penyebab_risiko = $_POST['penyebabRisiko'];
    $akibat_qualitative = $_POST['akibatQualitative'];
    $akibat_finansial = $_POST['akibatFinansial'];
    $pemilik_risiko = $_POST['pemilikRisiko'];
    $departemen = $_POST['departemen'];
    $inherent_likelihood = $_POST['inherentLikelihood'];
    $inherent_impact = $_POST['inherentImpact'];
    $control = $_POST['control'];
    $memadai = $_POST['memadai'];
    $status = $_POST['status'];
    $residual_likelihood = $_POST['residualLikelihood'];
    $residual_impact = $_POST['residualImpact'];
    $mitigasi = $_POST['mitigasi'];
    $perlakuan = $_POST['perlakuan'];
    $mitigasi_likelihood = $_POST['mitigasiLikelihood'];
    $mitigasi_impact = $_POST['mitigasiImpact'];

    // Query untuk memasukkan data ke tabel
    $sql = "INSERT INTO risiko (
                tujuan, kode_risiko, proses_bisnis, kelompok, sumber, 
                uraian_peristiwa, penyebab_risiko, akibat_qualitative, akibat_finansial, 
                pemilik_risiko, departemen, inherent_likelihood, inherent_impact, 
                control, memadai, status, residual_likelihood, residual_impact, mitigasi, 
                perlakuan, mitigasi_likelihood, mitigasi_impact
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )";

    // Persiapkan statement untuk mencegah SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssssiiissiiisii", 
        $tujuan, $kode_risiko, $proses_bisnis, $kelompok, $sumber,
        $uraian_peristiwa, $penyebab_risiko, $akibat_qualitative, $akibat_finansial,
        $pemilik_risiko, $departemen, $inherent_likelihood, $inherent_impact,
        $control, $memadai, $status, $residual_likelihood, $residual_impact,
        $mitigasi, $perlakuan, $mitigasi_likelihood, $mitigasi_impact
    );

    // Eksekusi statement dan cek hasil
    if ($stmt->execute()) {
        echo "<script>
                alert('Data berhasil disimpan.');
                window.location.href = 'dashboard.php'; // Redirect kembali ke form
              </script>";
    } else {
        echo "<script>
                alert('Terjadi kesalahan: " . $stmt->error . "');
              </script>";
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
