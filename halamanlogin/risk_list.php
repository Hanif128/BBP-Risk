<?php
include 'db.php'; // Pastikan file koneksi database sudah ada

// Ambil data risiko dari database
$query = "SELECT * FROM risiko";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Risiko</title>
    <link rel="stylesheet" href="styles.css"> <!-- Tambahkan CSS untuk styling -->
</head>
<body>
    <h1>Daftar Risiko</h1>
    <a href="form_risiko.html">Tambah Risiko Baru</a> <!-- Link ke form input risiko -->
    
    <table border="1">
        <thead>
            <tr>
                <th>Kode Risiko</th>
                <th>Tujuan</th>
                <th>Departemen</th>
                <th>Skor Risiko</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Hitung Skor Risiko (contoh: Inherent Impact x Inherent Likelihood)
                    $skorRisiko = $row['inherent_impact'] * $row['inherent_likelihood'];
                    echo "<tr>
                        <td>{$row['kode_risiko']}</td>
                        <td>{$row['tujuan']}</td>
                        <td>{$row['departemen']}</td>
                        <td>{$skorRisiko}</td>
                        <td>
                            <a href='view_risiko.php?id={$row['id']}'>👁️</a>
                            <a href='edit_risiko.php?id={$row['id']}'>✏️</a>
                            <a href='delete_risiko.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus risiko ini?\")'>🗑️</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data risiko</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
