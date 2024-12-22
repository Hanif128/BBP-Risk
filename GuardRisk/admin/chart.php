<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "risk_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari form_risiko
$sql = "SELECT inherent_likelihood, inherent_impact, inherent_risk_score FROM form_risiko";
$result = $conn->query($sql);

// Inisialisasi array untuk menyimpan data
$data_points = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Format data untuk Chart.js: [x, y, size]
        // x = inherent_likelihood (kemungkinan)
        // y = inherent_impact (dampak)
        // size = inherent_risk_score (untuk menentukan ukuran atau warna titik)
        $data_points[] = [
            'x' => (int)$row['inherent_likelihood'],
            'y' => (int)$row['inherent_impact'],
            'r' => (int)$row['inherent_risk_score'] // radius (ukuran titik)
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risk Matrix Chart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Styling untuk chart container */
        .container {
            width: 90%;
            margin: auto;
            padding-top: 30px;
        }

        /* Mengatur ukuran canvas untuk chart dengan rasio 1:1 */
        canvas {
            display: block;
            margin: auto;
        }
    </style>
</head>

<body>
    <section id="sidebar">
        <a href="#" class="brand"><i class='bx bxs-bank icon'></i> GuardRisk™</a>
        <ul class="side-menu">
            <li><a href="layout.php"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
            <li class="divider" data-text="main">Main</li>
            <li><a href="form-risk.php"><i class='bx bxs-notepad icon'></i> Forms Risiko</a></li>
            <li><a href="chart.php" class="active"><i class='bx bxs-chart icon'></i> Charts</a></li>
            <li><a href="man-risk.php"><i class='bx bx-table icon'></i> Tables</a></li>
            <li class="divider" data-text="Users"> Users</li>
            <li><a href="all-users.php"><i class='bx bxs-happy icon'></i> All Users</a></li>

        </ul>
    </section>

    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <form action="#">
            </form>
            
            <span class="divider"></span>
            <div class="profile">
                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="">
                <ul class="profile-link">
                    <!-- <li><a href="#"><i class='bx bxs-user-circle icon'></i> Profile</a></li>
                    <li><a href="#"><i class='bx bxs-cog'></i> Settings</a></li> -->
                    <li><a href="#"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <h1 class="text-center">Risk Matrix</h1>
            <canvas id="riskMatrixChart"></canvas>
        </div>

    </section>

    <script>
        // Data yang diambil dari PHP dan diteruskan ke Chart.js
        const dataPoints = <?php echo json_encode($data_points); ?>;

        // Chart.js Configuration
        const ctx = document.getElementById('riskMatrixChart').getContext('2d');
        const riskMatrixChart = new Chart(ctx, {
            type: 'scatter', // Jenis chart scatter
            data: {
                datasets: [{
                    label: 'Risk Points',
                    data: dataPoints, // Data titik dari PHP
                    backgroundColor: 'rgba(255, 99, 132, 0.6)', // Warna titik
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true, // Membuat chart responsif
                maintainAspectRatio: true, // Mempertahankan rasio aspect
                aspectRatio: 1, // Memastikan rasio 1:1 antara sumbu X dan Y
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return `Likelihood: ${tooltipItem.raw.x}, Impact: ${tooltipItem.raw.y}, Risk Score: ${tooltipItem.raw.r}`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        type: 'linear',
                        position: 'bottom',
                        min: 0, // Mengatur nilai minimum X menjadi 0
                        max: 6, // Mengatur nilai maksimum X menjadi 6
                        stepSize: 1, // Kelipatan 1
                        title: {
                            display: true,
                            text: 'Likelihood (Kemungkinan)'
                        }
                    },
                    y: {
                        min: 0, // Mengatur nilai minimum Y menjadi 0
                        max: 6, // Mengatur nilai maksimum Y menjadi 6
                        stepSize: 1, // Kelipatan 1 (0,1,2,3,4,5,6)
                        title: {
                            display: true,
                            text: 'Impact (Dampak)'
                        }
                    }
                }
            }
        });
    </script>

    <script src="scripts.js"></script>
</body>

</html>

<?php
$conn->close();
?>