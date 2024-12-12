<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "risk_management";

$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_GET['id'];

$sql = "SELECT * FROM form_risiko WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$risiko = $result->fetch_assoc();

if (!$risiko) {
    echo "Data tidak ditemukan!";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tujuan = $_POST['tujuan'];
    $kodeRisiko = $_POST['kodeRisiko'];
    $prosesBisnis = $_POST['prosesBisnis'];

    $update_sql = "UPDATE form_risiko SET tujuan = ?, kode_risiko = ?, proses_bisnis = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sssi", $tujuan, $kodeRisiko, $prosesBisnis, $id);

    if ($update_stmt->execute()) {
        echo "Data berhasil diupdate!";
    } else {
        echo "Terjadi kesalahan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Risiko</title>
</head>
<body>
    <form method="POST">
        <label>Tujuan</label>
        <input type="text" name="tujuan" value="<?php echo htmlspecialchars($risiko['tujuan']); ?>">
        <label>Kode Risiko</label>
        <input type="text" name="kodeRisiko" value="<?php echo htmlspecialchars($risiko['kode_risiko']); ?>">
        <label>Proses Bisnis</label>
        <input type="text" name="prosesBisnis" value="<?php echo htmlspecialchars($risiko['proses_bisnis']); ?>">
        <button type="submit">Update</button>
    </form>
</body>
</html>
