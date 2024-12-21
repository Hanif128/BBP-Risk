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
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section id="sidebar">
        <a href="#" class="brand"><i class='bx bxs-bank icon'></i> GuardRisk™</a>
        <ul class="side-menu">
            <li><a href="layout.php"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
            <li class="divider" data-text="main">Main</li>
            <li><a href="form-risk.php"><i class='bx bxs-notepad icon'></i> Forms Risiko</a></li>
            <li><a href="chart.php"><i class='bx bxs-chart icon'></i> Charts</a></li>
            <li><a href="man-risk.php" class="active"><i class='bx bx-table icon'></i> Tables</a></li>

        </ul>
    </section>

    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <form action="#">
                <!-- <div class="form-group">
                    <input type="text" placeholder="Search...">
                    <i class='bx bx-search icon'></i>
                </div> -->
            </form>
            <!-- <a href="#" class="nav-link">
                <i class='bx bxs-bell icon'></i>
                <span class="badge">5</span>
            </a>
            <a href="#" class="nav-link">
                <i class='bx bxs-message-square-dots icon'></i>
                <span class="badge">8</span> -->
            </a>
            <span class="divider"></span>
            <div class="profile">
                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="">
                <ul class="profile-link">
                    <!-- <li><a href="#"><i class='bx bxs-user-circle icon'></i> Profile</a></li>
                    <li><a href="#"><i class='bx bxs-cog'></i> Settings</a></li> -->
                    <li><a href="logout.php"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="container mt-5">
            <h1 class="text-center mb-4">Manajemen Risiko</h1>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tujuan</th>
                        <th>Kode Risiko</th>
                        <th>Proses Bisnis</th>
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
                            echo "<td>" . htmlspecialchars($row['proses_bisnis']) . "</td>";
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
    </section>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="scripts.js"></script>
</body>

</html>

<?php
$conn->close();
?>