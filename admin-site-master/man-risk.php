<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "risk_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Mengambil semua data dari tabel risiko
$sql = "SELECT * FROM form_risiko";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Risiko</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></script>
    <style>
        footer {
            text-align: center;
            padding: 5px 0;
            color: #002B5B;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Manajemen Risiko</h1>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Tujuan</th>
                    <th>Kode Risiko</th>
                    <th>Departemen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['tujuan']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['kode_risiko']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['departemen']) . "</td>";
                        echo "<td>
                                <a href='lihat_risiko.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'>
                                    <i class='fas fa-eye'></i> Lihat
                                </a>
                                <a href='edit_risiko.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>
                                    <i class='fas fa-pencil-alt'></i> Edit
                                </a>
                                <a href='hapus_risiko.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>
                                    <i class='fas fa-trash'></i> Hapus
                                </a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Belum ada data risiko</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div style="display: flex; justify-content: center; align-items: center;">
        <a type="submit" href="chart-rev.php" class="btn btn-primary" style="text-align: center;">Lihat Chart</a>
    </div>

</body>
<footer>
    &copy; <?php echo date("Y"); ?> GuardRisk™. All rights reserved.
</footer>

</html>

<?php
$conn->close();
?>