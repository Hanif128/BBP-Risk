<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Form style */
        .form-container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    <title>GuardRisk</title>
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand"><i class='bx bxs-bank icon'></i> GuardRisk™</a>
        <ul class="side-menu">
            <li><a href="layout.php"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
            <li class="divider" data-text="main">Main</li>
            <li><a href="form-risk.php" class="active"><i class='bx bxs-notepad icon'></i> Forms Risiko</a></li>
            <li><a href="chart.php"><i class='bx bxs-chart icon'></i> Charts</a></li>
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
            </form>
           
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
        <!-- Form -->
        <br>
        <div id="form-page" class="content-page d-none">
            <div class="mb-3">

                <h1>Form Risiko</h1>
                <div class="form-container">
                    <form action="insert_form.php" method="POST">
                        <script src="script.js" defer></script>

                        <h3>Informasi Risiko</h3>
                        <label for="tujuan">Tujuan</label>
                        <input type="text" id="tujuan" name="tujuan">

                        <label for="kodeRisiko">Kode Risiko</label>
                        <input type="text" id="kodeRisiko" name="kodeRisiko">

                        <label for="prosesBisnis">Proses Bisnis</label>
                        <select id="prosesBisnis" name="prosesBisnis">
                            <option value="">--Pilih--</option>
                            <option value="Keuangan">Keuangan</option>
                            <option value="akademik">Akademik</option>
                            <option value="kepegawaian">Kepegawaian</option>
                        </select>

                        <label for="kelompok">Kelompok</label>
                        <select id="kelompok" name="kelompok">
                            <option value="">--Pilih--</option>
                            <option value="risiko-stratejik">Risiko Stratejik</option>
                            <option value="risiko-finansial">Risiko Finansial</option>
                            <option value="risiko-operasional">Risiko Operasional</option>
                        </select>

                        <label for="sumber">Sumber</label>
                        <select id="sumber" name="sumber">
                            <option value="">-- Pilih --</option>
                            <option value="Eksternal">Eksternal</option>
                            <option value="Internal">Internal</option>
                            <option value="Eksternal dan Internal">Eksternal dan Internal</option>
                        </select>

                        <label for="uraianPeristiwa">Uraian Peristiwa</label>
                        <textarea id="uraianPeristiwa" name="uraianPeristiwa"></textarea>

                        <label for="penyebabRisiko">Penyebab Risiko</label>
                        <textarea id="penyebabRisiko" name="penyebabRisiko"></textarea>
                </div>
                <br>

                <div class="form-container">
                    <h3>Potensi Kerugian</h3>
                    <label for="akibatQualitative">Akibat Qualitative</label>
                    <textarea id="akibatQualitative" name="akibatQualitative"></textarea>

                    <label for="akibatFinansial">Akibat Finansial</label>
                    <input
                        id="akibatFinansial"
                        name="akibatFinansial"
                        type="number"
                        placeholder="Masukkan nilai dalam Rupiah">
                </div>
                <br>

                <div class="form-container">
                    <h3>Informasi Terkait</h3>
                    <label for="pemilikRisiko">Pemilik Risiko</label>
                    <input type="text" id="pemilikRisiko" name="pemilikRisiko">

                    <label for="departemen">Departemen</label>
                    <select id="departemen" name="departemen">
                        <option value="">-- Pilih --</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Teknik Industri">Teknik Industri</option>
                        <option value="Matematika">Matematika</option>
                        <option value="Biologi">Biologi</option>
                        <option value="Fisika">Fisika</option>
                        <option value="Kimia">Kimia</option>
                    </select>
                </div>
                <br>
                <div class="form-container">
                    <h3>Penilaian Risiko</h3>
                    <label for="inherentLikelihood">Inherent Likelihood</label>
                    <input type="number" id="inherentLikelihood" name="inherentLikelihood" value="1" min="1" max="5">

                    <label for="inherentImpact">Inherent Impact</label>
                    <input type="number" id="inherentImpact" name="inherentImpact" value="1" min="1" max="5">
                </div>
                <br>
                <div class="form-container">
                    <h3>Pengendalian</h3>
                    <label for="control">Control</label>
                    <select id="control" name="control">
                        <option value="">-- Pilih --</option>
                        <option value="ada">Ada</option>
                        <option value="tidak-ada">Tidak ada</option>
                    </select>

                    <label for="memadai">Memadai</label>
                    <select id="memadai" name="memadai">
                        <option value="">-- Pilih --</option>
                        <option value="memadai">Memadai</option>
                        <option value="tidak-memadai">Tidak Memadai</option>
                    </select>

                    <label for="status">Status</label>
                    <select id="status" name="status">
                        <option value="">-- Pilih --</option>
                        <option value="dijalankan">Dijalankan 100%</option>
                        <option value="belumjalan">Belum Dijalankan 100%</option>
                    </select>

                    <label for="residualLikelihood">Residual Likelihood</label>
                    <input type="number" id="residualLikelihood" name="residualLikelihood" value="1" min="1" max="5">

                    <label for="residualImpact">Residual Impact</label>
                    <input type="number" id="residualImpact" name="residualImpact" value="1" min="1" max="5">
                </div>
                <br>
                <div class="form-container">
                    <h3>Penanganan</h3>
                    <label for="mitigasi">Tindakan Mitigasi</label>
                    <textarea id="mitigasi" name="mitigasi"></textarea>

                    <label for="perlakuan">Perlakuan</label>
                    <select id="perlakuan" name="perlakuan">
                        <option value="">-- Pilih --</option>
                        <option value="Accept">Accept</option>
                        <option value="Reduce">Reduce</option>
                    </select>

                    <label for="mitigasiLikelihood">Mititgasi Likelihood</label>
                    <input type="number" id="mitigasiLikelihood" name="mitigasiLikelihood" value="1" min="1" max="5">

                    <label for="mitigasiImpact">Mititgasi Impact</label>
                    <input type="number" id="mitigasiImpact" name="mitigasiImpact" value="1" min="1" max="5">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                </form>
            </div>
        </div>

    </section>
    <!-- NAVBAR -->

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="scripts.js"></script>
</body>

</html>