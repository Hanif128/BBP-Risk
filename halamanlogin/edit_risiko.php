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

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID tidak ditemukan!";
    exit;
}

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
    $tujuan = trim($_POST['tujuan']);

    // Validasi input 'tujuan'
    if (empty($tujuan) || strlen($tujuan) > 255) {
        echo "<div class='error'>Input 'tujuan' tidak valid!</div>";
    } else {
        $tujuan = $_POST['tujuan'];
        $kodeRisiko = $_POST['kodeRisiko'];
        $prosesBisnis = $_POST['prosesBisnis'];
        $kelompok = $_POST['kelompok'];
        $sumber = $_POST['sumber'];
        $uraianPeristiwa = $_POST['uraianPeristiwa'];
        $penyebabRisiko = $_POST['penyebabRisiko'];
        $akibatQualitative = $_POST['akibatQualitative'];
        $akibatFinansial = $_POST['akibatFinansial'];
        $pemilikRisiko = $_POST['pemilikRisiko'];
        $departemen = $_POST['departemen'];
        $inherentLikelihood = $_POST['inherentLikelihood'];
        $inherentImpact = $_POST['inherentImpact'];
        $residualLikelihood = $_POST['residualLikelihood'];
        $residualImpact = $_POST['residualImpact'];
        $mitigasiLikelihood = $_POST['mitigasiLikelihood'];
        $mitigasiImpact = $_POST['mitigasiImpact'];
        $control = $_POST['control'];
        $memadai = $_POST['memadai'];
        $status = $_POST['status'];
        $mitigasi = $_POST['mitigasi'];
        $perlakuan = $_POST['perlakuan'];

        $update_sql = "UPDATE form_risiko SET tujuan = ?, kode_risiko = ?, proses_bisnis = ?, kelompok = ?, sumber = ?, uraian_peristiwa = ?, penyebab_risiko = ?, akibat_qualitative = ?, akibat_finansial = ?, pemilik_risiko = ?, departemen = ?, inherent_likelihood = ?, inherent_impact = ?, residual_likelihood = ?, residual_impact = ?, mitigasi_likelihood = ?, mitigasi_impact = ?, control = ?, memadai = ?, status = ?, mitigasi = ?, perlakuan = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sssssssssssiiiiiisssssi", $tujuan, $kodeRisiko, $prosesBisnis, $kelompok, $sumber, $uraianPeristiwa, $penyebabRisiko, $akibatQualitative, $akibatFinansial, $pemilikRisiko, $departemen, $inherentLikelihood, $inherentImpact, $residualLikelihood, $residualImpact, $mitigasiLikelihood, $mitigasiImpact, $control, $memadai, $status, $mitigasi, $perlakuan, $id);


        if ($update_stmt->execute()) {
            echo "Data berhasil diupdate!";
        } else {
            echo "Terjadi kesalahan!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Risiko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #F9FAFB;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .form-container {
            width: 100%;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #1E3A8A;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #333;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #2563EB;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1E3A8A;
        }

        .message {
            text-align: center;
            margin-bottom: 15px;
            color: #28A745;
            font-weight: bold;
        }

        .error {
            text-align: center;
            margin-bottom: 15px;
            color: #DC3545;
            font-weight: bold;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .action-buttons button {
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Risiko</h1>
        <form method="POST">
            <h3>Informasi Risiko</h3>
            <label for="tujuan">Tujuan</label>
            <input type="text" id="tujuan" name="tujuan" value="<?php echo htmlspecialchars($risiko['tujuan']); ?>" maxlength="255" required>

            <!-- Input lainnya (kodeRisiko, prosesBisnis, dll) -->
            <label for="kodeRisiko">Kode Risiko</label>
            <input type="text" id="kodeRisiko" name="kodeRisiko" value="<?php echo htmlspecialchars($risiko['kode_risiko']); ?>">

            <label for="prosesBisnis">Proses Bisnis</label>
            <select id="prosesBisnis" name="prosesBisnis">
                <option value="">--Pilih--</option>
                <option value="Keuangan" <?php if ($risiko['proses_bisnis'] == 'Keuangan') echo 'selected'; ?>>Keuangan</option>
                <option value="akademik" <?php if ($risiko['proses_bisnis'] == 'akademik') echo 'selected'; ?>>Akademik</option>
                <option value="kepegawaian" <?php if ($risiko['proses_bisnis'] == 'kepegawaian') echo 'selected'; ?>>Kepegawaian</option>
            </select>

            <label for="kelompok">Kelompok</label>
            <select id="kelompok" name="kelompok">
                <option value="">--Pilih--</option>
                <option value="risiko-stratejik" <?php if ($risiko['kelompok'] == 'risiko-stratejik') echo 'selected'; ?>>Risiko Stratejik</option>
                <option value="risiko-finansial" <?php if ($risiko['kelompok'] == 'risiko-finansial') echo 'selected'; ?>>Risiko Finansial</option>
                <option value="risiko-operasional" <?php if ($risiko['kelompok'] == 'risiko-operasional') echo 'selected'; ?>>Risiko Operasional</option>
            </select>

            <label for="sumber">Sumber</label>
            <select id="sumber" name="sumber">
                <option value="">-- Pilih --</option>
                <option value="eks" <?php if ($risiko['sumber'] == 'eks') echo 'selected'; ?>>Eksternal</option>
                <option value="inter" <?php if ($risiko['sumber'] == 'inter') echo 'selected'; ?>>Internal</option>
                <option value="eks-int" <?php if ($risiko['sumber'] == 'eks-int') echo 'selected'; ?>>Eksternal dan Internal</option>
            </select>

            <label for="uraianPeristiwa">Uraian Peristiwa</label>
            <textarea id="uraianPeristiwa" name="uraianPeristiwa"><?php echo htmlspecialchars($risiko['uraian_peristiwa']); ?></textarea>

            <label for="penyebabRisiko">Penyebab Risiko</label>
            <textarea id="penyebabRisiko" name="penyebabRisiko"><?php echo htmlspecialchars($risiko['penyebab_risiko']); ?></textarea>

            <h3>Potensi Kerugian</h3>
            <label for="akibatQualitative">Akibat Qualitative</label>
            <textarea id="akibatQualitative" name="akibatQualitative"><?php echo htmlspecialchars($risiko['akibat_qualitative']); ?></textarea>

            <label for="akibatFinansial">Akibat Finansial</label>
            <textarea id="akibatFinansial" name="akibatFinansial"><?php echo htmlspecialchars($risiko['akibat_finansial']); ?></textarea>

            <h3>Informasi Terkait</h3>
            <label for="pemilikRisiko">Pemilik Risiko</label>
            <input type="text" id="pemilikRisiko" name="pemilikRisiko" value="<?php echo htmlspecialchars($risiko['pemilik_risiko']); ?>">

            <label for="departemen">Departemen</label>
            <select id="departemen" name="departemen">
                <option value="">-- Pilih --</option>
                <option value="Informatika" <?php if ($risiko['departemen'] == 'Informatika') echo 'selected'; ?>>Informatika</option>
                <option value="Teknik Industri" <?php if ($risiko['departemen'] == 'Teknik Industri') echo 'selected'; ?>>Teknik Industri</option>
                <option value="Matematika" <?php if ($risiko['departemen'] == 'Matematika') echo 'selected'; ?>>Matematika</option>
                <option value="Biologi" <?php if ($risiko['departemen'] == 'Biologi') echo 'selected'; ?>>Biologi</option>
                <option value="Fisika" <?php if ($risiko['departemen'] == 'Fisika') echo 'selected'; ?>>Fisika</option>
                <option value="Kimia" <?php if ($risiko['departemen'] == 'Kimia') echo 'selected'; ?>>Kimia</option>
            </select>

            <h3>Penilaian Risiko</h3>
            <label for="inherentLikelihood">Inherent Likelihood</label>
            <input type="number" id="inherentLikelihood" name="inherentLikelihood" value="<?php echo htmlspecialchars($risiko['inherent_likelihood']); ?>">

            <label for="inherentImpact">Inherent Impact</label>
            <input type="number" id="inherentImpact" name="inherentImpact" value="<?php echo htmlspecialchars($risiko['inherent_impact']); ?>">

            <label for="inherentRisk">Inherent Risk</label>
            <input type="text" id="inherentRisk" name="inherentRisk" value="<?php echo htmlspecialchars($risiko['inherent_likelihood'] * $risiko['inherent_impact']); ?>" readonly>

            <h3>Pengendalian</h3>
            <label for="control">Control</label>
            <select id="control" name="control">
                <option value="">-- Pilih --</option>
                <option value="ada" <?php if ($risiko['control'] == 'ada') echo 'selected'; ?>>Ada</option>
                <option value="tidak-ada" <?php if ($risiko['control'] == 'tidak-ada') echo 'selected'; ?>>Tidak Ada</option>
            </select>

            <label for="memadai">Memadai</label>
            <select id="memadai" name="memadai">
                <option value="">-- Pilih --</option>
                <option value="memadai" <?php if ($risiko['memadai'] == 'memadai') echo 'selected'; ?>>Memadai</option>
                <option value="tidak-memadai" <?php if ($risiko['memadai'] == 'tidak-memadai') echo 'selected'; ?>>Tidak Memadai</option>
            </select>

            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="">-- Pilih --</option>
                <option value="dijalankan" <?php if ($risiko['status'] == 'dijalankan') echo 'selected'; ?>>Dijalankan 100%</option>
                <option value="belumjalan" <?php if ($risiko['status'] == 'belumjalan') echo 'selected'; ?>>Belum Dijalankan 100%</option>
            </select>

            <label for="residualLikelihood">Residual Likelihood</label>
            <input type="number" id="residualLikelihood" name="residualLikelihood" value="<?php echo htmlspecialchars($risiko['residual_likelihood']); ?>">

            <label for="residualImpact">Residual Impact</label>
            <input type="number" id="residualImpact" name="residualImpact" value="<?php echo htmlspecialchars($risiko['residual_impact']); ?>">

            <label for="residualRisk">Residual Risk</label>
            <input type="text" id="residualRisk" name="residualRisk" value="<?php echo htmlspecialchars($risiko['residual_likelihood'] * $risiko['residual_impact']); ?>" readonly>

            <h3>Penanganan</h3>
            <label for="mitigasi">Tindakan Mitigasi</label>
            <textarea id="mitigasi" name="mitigasi"><?php echo htmlspecialchars($risiko['mitigasi']); ?></textarea>

            <label for="perlakuan">Perlakuan</label>
            <select id="perlakuan" name="perlakuan">
                <option value="">-- Pilih --</option>
                <option value="accept" <?php if ($risiko['perlakuan'] == 'accept') echo 'selected'; ?>>Accept</option>
                <option value="reduce" <?php if ($risiko['perlakuan'] == 'reduce') echo 'selected'; ?>>Reduce</option>
            </select>

            <label for="mitigasiLikelihood">Mitigasi Likelihood</label>
            <input type="number" id="mitigasiLikelihood" name="mitigasiLikelihood" value="<?php echo htmlspecialchars($risiko['mitigasi_likelihood']); ?>">

            <label for="mitigasiImpact">Mitigasi Impact</label>
            <input type="number" id="mitigasiImpact" name="mitigasiImpact" value="<?php echo htmlspecialchars($risiko['mitigasi_impact']); ?>">

            <label for="mitigasiRisk">Mitigasi Risk</label>
            <input type="text" id="mitigasiRisk" name="mitigasiRisk" value="<?php echo htmlspecialchars($risiko['mitigasi_likelihood'] * $risiko['mitigasi_impact']); ?>" readonly>

            <div class="action-buttons">
                <button type="submit">Update</button>
                <button type="button" onclick="window.location.href='layout.php';">Kembali</button>
            </div>
        </div>
        </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
