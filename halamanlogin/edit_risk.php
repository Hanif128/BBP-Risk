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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tujuan = $_POST['tujuan'];
    $departemen = $_POST['departemen'];
    $inherent_impact = $_POST['inherent_impact'];
    $inherent_likelihood = $_POST['inherent_likelihood'];

    $updateQuery = "UPDATE risiko SET tujuan = ?, departemen = ?, inherent_impact = ?, inherent_likelihood = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param('ssiii', $tujuan, $departemen, $inherent_impact, $inherent_likelihood, $id);

    if ($updateStmt->execute()) {
        echo "<script>
                alert('Data berhasil diperbarui.');
                window.location.href = 'risk_list.php';
              </script>";
    } else {
        echo "Error: " . $updateStmt->error;
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
    <h1>Edit Risiko</h1>
    <form action="" method="POST">
        <label>Tujuan:</label>
        <input type="text" name="tujuan" value="<?= $data['tujuan'] ?>" required>
        <br>
        <label>Departemen:</label>
        <input type="text" name="departemen" value="<?= $data['departemen'] ?>" required>
        <br>
        <label>Inherent Impact:</label>
        <input type="number" name="inherent_impact" value="<?= $data['inherent_impact'] ?>" required>
        <br>
        <label>Inherent Likelihood:</label>
        <input type="number" name="inherent_likelihood" value="<?= $data['inherent_likelihood'] ?>" required>
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
