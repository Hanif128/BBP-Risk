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
    <div class="container">
        <h1 class="text-center">Risk Matrix with Chart.js</h1>
        <canvas id="riskMatrixChart"></canvas>
    </div>

    <a type="submit" href="layout.php" class="btn btn-primary">Kembali</a>

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
                responsive: true,  // Membuat chart responsif
                maintainAspectRatio: true,  // Mempertahankan rasio aspect
                aspectRatio: 1,  // Memastikan rasio 1:1 antara sumbu X dan Y
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
                        min: 0,  // Mengatur nilai minimum X menjadi 0
                        max: 6,  // Mengatur nilai maksimum X menjadi 6
                        stepSize: 1,  // Kelipatan 1
                        title: {
                            display: true,
                            text: 'Likelihood (Kemungkinan)'
                        }
                    },
                    y: {
                        min: 0,  // Mengatur nilai minimum Y menjadi 0
                        max: 6,  // Mengatur nilai maksimum Y menjadi 6
                        stepSize: 1,  // Kelipatan 1 (0,1,2,3,4,5,6)
                        title: {
                            display: true,
                            text: 'Impact (Dampak)'
                        }
                    }
                }
            }
        });
    </script>
    
</body>
</html>

<?php
$conn->close();
?>
