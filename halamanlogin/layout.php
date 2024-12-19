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

// Query untuk menghitung jumlah data dengan sumber "Eksternal"
$sql_eksternal = "SELECT COUNT(*) AS jumlah_eksternal FROM form_risiko WHERE sumber = 'Eksternal'";
$result_eksternal = $conn->query($sql_eksternal);
$jumlah_eksternal = 0;

if ($result_eksternal->num_rows > 0) {
    $row_eksternal = $result_eksternal->fetch_assoc();
    $jumlah_eksternal = $row_eksternal['jumlah_eksternal'];
}

// Query untuk menghitung jumlah data dengan sumber "Internal"
$sql_internal = "SELECT COUNT(*) AS jumlah_internal FROM form_risiko WHERE sumber = 'Internal'";
$result_internal = $conn->query($sql_internal);
$jumlah_internal = 0;

if ($result_internal->num_rows > 0) {
    $row_internal = $result_internal->fetch_assoc();
    $jumlah_internal = $row_internal['jumlah_internal'];
}

// Query untuk menghitung jumlah data dengan sumber "Eksternal dan Internal"
$sql_eksternal_internal = "SELECT COUNT(*) AS jumlah_eksternal_internal FROM form_risiko WHERE sumber = 'Eksternal dan Internal'";
$result_eksternal_internal = $conn->query($sql_eksternal_internal);
$jumlah_eksternal_internal = 0;

if ($result_eksternal_internal->num_rows > 0) {
    $row_eksternal_internal = $result_eksternal_internal->fetch_assoc();
    $jumlah_eksternal_internal = $row_eksternal_internal['jumlah_eksternal_internal'];
}

// Query untuk menghitung jumlah data dalam tabel form_risiko
$sql_count = "SELECT COUNT(*) AS jumlah_data FROM form_risiko";
$result_count = $conn->query($sql_count);
$jumlah_data = 0; // Inisialisasi jumlah data

if ($result_count->num_rows > 0) {
    $row_count = $result_count->fetch_assoc();
    $jumlah_data = $row_count['jumlah_data'];
}

// Query untuk menghitung total kerugian (akibat_finansial)
$sql_kerugian = "SELECT SUM(akibat_finansial) AS total_kerugian FROM form_risiko";
$result_kerugian = $conn->query($sql_kerugian);
$total_kerugian = 0; // Inisialisasi total kerugian

if ($result_kerugian->num_rows > 0) {
    $row_kerugian = $result_kerugian->fetch_assoc();
    $total_kerugian = $row_kerugian['total_kerugian'];
}

// Query untuk mengambil data dari form_risiko untuk chart
$sql = "SELECT inherent_likelihood, inherent_impact, inherent_risk_score FROM form_risiko";
$result = $conn->query($sql);

// Inisialisasi array untuk menyimpan data chart
$data_points = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Format data untuk Chart.js
        $data_points[] = [
            'x' => (int)$row['inherent_likelihood'],
            'y' => (int)$row['inherent_impact'],
            'r' => (int)$row['inherent_risk_score']
        ];
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>GuardRisk</title>
    <style>
        canvas {
            display: block;
            margin: auto;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand"><i class='bx bxs-bank icon'></i> GuardRisk™</a>
        <ul class="side-menu">
            <li><a href="layout.php" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
            <li class="divider" data-text="main">Main</li>
            <li><a href="form-risk.php"><i class='bx bxs-notepad icon'></i> Forms Risiko</a></li>
            <li><a href="chart.php"><i class='bx bxs-chart icon'></i> Charts</a></li>
            <li><a href="monitoring.php"><i class='bx bxs-widget icon'></i> Monitoring</a></li>
            <li><a href="man-risk.php"><i class='bx bx-table icon'></i> Tables</a></li>
            <li class="divider" data-text="Users"> Users</li>
            <li><a href="all-users.php"><i class='bx bxs-happy icon'></i> All Users</a></li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- NAVBAR -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <form action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search...">
                    <i class='bx bx-search icon'></i>
                </div>
            </form>
            <span class="divider"></span>
            <div class="profile">
                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="">
                <ul class="profile-link">
                    <li><a href="#"><i class='bx bxs-user-circle icon'></i> Profile</a></li>
                    <li><a href="#"><i class='bx bxs-cog'></i> Settings</a></li>
                    <li><a href="logout.php"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <h1 class="title">Dashboard</h1>
            <ul class="breadcrumbs">
                <li><a href="#">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Dashboard</a></li>
            </ul>
            <div class="info-data">
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>Jumlah</h2>
                            <p>Risiko</p>
                        </div>
                        <i class='bx bx-trending-up icon'></i>
                    </div>
                    <span class="progress" data-value="100%"></span>
                    <span class="label"><?php echo $jumlah_data; ?></span>
                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>Sumber</h2>
                            <p>Risiko</p>
                        </div>
                        <i class='bx bx-trending-up icon'></i>
                    </div>
                    <span class="progress" data-value="100%"></span>
                    <div class="label">Eksternal: <?php echo $jumlah_eksternal; ?></div>
                    <div class="label">Internal: <?php echo $jumlah_internal; ?></div>
                    <div class="label">Eksternal dan Internal: <?php echo $jumlah_eksternal_internal; ?></div>
                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>Total</h2>
                            <p>Kerugian</p>
                        </div>
                        <i class='bx bx-trending-up icon'></i>
                    </div>
                    <span class="progress" data-value="100%"></span>
                    <span class="label">Rp<?php echo number_format($total_kerugian, 2); ?></span>
                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>Jumlah</h2>
                            <p>Departemen</p>
                        </div>
                        <i class='bx bx-trending-up icon'></i>
                    </div>
                    <span class="progress" data-value="100%"></span>
                    <span class="label">6</span>
                </div>
            </div>
            <div class="data">
                <div class="content-data">
                    <div class="head">
                        <h3>Risk Matrix</h3>
                        <div class="menu">
                            <i class='bx bx-dots-horizontal-rounded icon'></i>
                            <ul class="menu-link">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Save</a></li>
                                <li><a href="#">Remove</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="chart">
                        <canvas id="riskMatrixChart"></canvas>
                    </div>
                </div>
                <div class="content-data">
                    <div class="head">
                        <h3>Info</h3>
                        <div class="menu">
                            <i class='bx bx-dots-horizontal-rounded icon'></i>
                            <ul class="menu-link">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Save</a></li>
                                <li><a href="#">Remove</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="chat-box">
                        <p class="day"><span>Today</span></p>
                        <div class="msg">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                            <div class="chat">
                                <div class="profile">
                                    <span class="username">User</span>
                                    <span class="time">07.00</span>
                                </div>
                                <p>Apa itu GuardRisk?</p>
                            </div>
                        </div>
                        <div class="msg me">
                            <div class="chat">
                                <div class="profile">
                                    <span class="time">07.01</span>
                                </div>
                                <p>GuardRisk adalah aplikasi manajemen risiko yang dirancang untuk membantu organisasi dalam mengidentifikasi, menganalisis, dan mengelola berbagai risiko yang mungkin mempengaruhi operasional dan tujuan bisnis.</p>
                            </div>
                        </div>
                        <div class="msg me">
                            <div class="chat">
                                <div class="profile">
                                    <span class="time">07.01</span>
                                </div>
                                <p>Dengan antarmuka yang mudah digunakan, GuardRisk memungkinkan pengguna untuk mencatat dan memantau risiko-risiko yang ada, serta mengembangkan strategi mitigasi yang efektif.</p>
                            </div>
                        </div>
                    </div>
                    <form action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Type...">
                            <button type="submit" class="btn-send"><i class='bx bxs-send'></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- NAVBAR -->
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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="scripts.js"></script>
</body>

</html>