<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "risk_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan ID dari URL
$id = $_GET['id'];

// Mengambil data risiko berdasarkan ID
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Risiko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="content">
        <h1>Detail Risiko</h1>
        <div class="form-container">

            <form>
                <!-- Menampilkan data -->
                <h3>Informasi Risiko</h3>
                <div class="form-group">
                    <label for="tujuan">Tujuan:</label>
                    <input type="text" id="tujuan" class="form-control" value="<?php echo htmlspecialchars($risiko['tujuan']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="kode_risiko">Kode Risiko:</label>
                    <input type="text" id="kode_risiko" class="form-control" value="<?php echo htmlspecialchars($risiko['kode_risiko']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="proses_bisnis">Proses Bisnis:</label>
                    <input type="text" id="proses_bisnis" class="form-control" value="<?php echo htmlspecialchars($risiko['proses_bisnis']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="kelompok">Kelompok:</label>
                    <input type="text" id="kelompok" class="form-control" value="<?php echo htmlspecialchars($risiko['kelompok']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="sumber">Sumber:</label>
                    <input type="text" id="sumber" class="form-control" value="<?php echo htmlspecialchars($risiko['sumber']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="uraian_peristiwa">Uraian Peristiwa:</label>
                    <textarea id="uraian_peristiwa" class="form-control" readonly><?php echo htmlspecialchars($risiko['uraian_peristiwa']); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="penyebab_risiko">Penyebab Risiko:</label>
                    <textarea id="penyebab_risiko" class="form-control" readonly><?php echo htmlspecialchars($risiko['penyebab_risiko']); ?></textarea>
                </div>
        </div>
        <br>

        <div class="form-container">
            <h3>Potensi Kerugian</h3>
            <div class="form-group">
                <label for="akibat_qualitative">Akibat Qualitative:</label>
                <textarea id="akibat_qualitative" class="form-control" readonly><?php echo htmlspecialchars($risiko['akibat_qualitative']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="akibat_finansial">Akibat Finansial:</label>
                <textarea id="akibat_finansial" class="form-control" readonly><?php echo htmlspecialchars($risiko['akibat_finansial']); ?></textarea>
            </div>
        </div>
        <br>

        <div class="form-container">
            <h3>Informasi Terkait</h3>
            <div class="form-group">
                <label for="pemilik_risiko">Pemilik Risiko:</label>
                <input type="text" id="pemilik_risiko" class="form-control" value="<?php echo htmlspecialchars($risiko['pemilik_risiko']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="departemen">Departemen:</label>
                <input type="text" id="departemen" class="form-control" value="<?php echo htmlspecialchars($risiko['departemen']); ?>" readonly>
            </div>
        </div>
        <br>

        <div class="form-container">
            <h3>Penilaian Risiko</h3>
            <div class="form-group">
                <label for="inherent_likelihood">Inherent Likelihood:</label>
                <input type="number" id="inherent_likelihood" class="form-control" value="<?php echo htmlspecialchars($risiko['inherent_likelihood']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="inherent_impact">Inherent Impact:</label>
                <input type="number" id="inherent_impact" class="form-control" value="<?php echo htmlspecialchars($risiko['inherent_impact']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="inherent_risk">Inherent Risk</label>
                <input type="text" id="inherent_risk" class="form-control" value="<?php echo htmlspecialchars($risiko['inherent_likelihood'] * $risiko['inherent_impact']); ?>" readonly>
            </div>
        </div>
        <br>

        <div class="form-container">
            <h3>Pengendalian</h3>
            <div class="form-group">
                <label for="control">Control:</label>
                <input type="text" id="control" class="form-control" value="<?php echo htmlspecialchars($risiko['control']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="memadai">Memadai:</label>
                <input type="text" id="memadai" class="form-control" value="<?php echo htmlspecialchars($risiko['memadai']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" id="status" class="form-control" value="<?php echo htmlspecialchars($risiko['status']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="residual_likelihood">Residual Likelihood:</label>
                <input type="number" id="residual_likelihood" class="form-control" value="<?php echo htmlspecialchars($risiko['residual_likelihood']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="residual_impact">Residual Impact:</label>
                <input type="number" id="residual_impact" class="form-control" value="<?php echo htmlspecialchars($risiko['residual_impact']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="residual_risk">Residual Risk</label>
                <input type="text" id="residual_risk" class="form-control" value="<?php echo htmlspecialchars($risiko['residual_likelihood'] * $risiko['residual_impact']); ?>" readonly>
            </div>
        </div>
        <br>

        <div class="form-container">
            <h3>Penanganan</h3>
            <div class="form-group">
                <label for="mitigasi">Tindakan Mitigasi</label>
                <input type="text" id="mitigasi" class="form-control" value="<?php echo htmlspecialchars($risiko['mitigasi']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="perlakuan">Perlakuan:</label>
                <input type="text" id="perlakuan" class="form-control" value="<?php echo htmlspecialchars($risiko['perlakuan']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="mitigasi_likelihood">Mitigasi Likelihood:</label>
                <input type="number" id="mitigasi_likelihood" class="form-control" value="<?php echo htmlspecialchars($risiko['mitigasi_likelihood']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="mitigasi_impact">Mitigasi Impact:</label>
                <input type="number" id="mitigasi_impact" class="form-control" value="<?php echo htmlspecialchars($risiko['mitigasi_impact']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="mitigasi_risk">Mitigasi Risk</label>
                <input type="text" id="mitigasi_risk" class="form-control" value="<?php echo htmlspecialchars($risiko['mitigasi_likelihood'] * $risiko['mitigasi_impact']); ?>" readonly>
            </div>
            <a type="submit" href="man-risk.php" class="btn btn-primary">Kembali</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>

<?php
$stmt->close();
$conn->close();
?>