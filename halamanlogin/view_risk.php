<?php
include 'db.php';

$id = $_GET['id'];
$query = "SELECT * FROM risiko WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Data tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Risiko</title>
</head>
<body>
    <h1>Detail Risiko</h1>
    <p>Kode Risiko: <?= $data['kode_risiko'] ?></p>
    <p>Tujuan: <?= $data['tujuan'] ?></p>
    <p>Departemen: <?= $data['departemen'] ?></p>
    <p>Skor Risiko: <?= $data['inherent_impact'] * $data['inherent_likelihood'] ?></p>
    <a href="risiko_list.php">Kembali ke Daftar</a>
</body>
</html>
