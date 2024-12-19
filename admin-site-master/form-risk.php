<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>GuardRisk</title>
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand"><i class='bx bxs-bank icon'></i> GuardRisk™</a>
        <ul class="side-menu">
            <li><a href="index.html"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
            <li class="divider" data-text="main">Main</li>
            <li><a href="form-risk.php" class="active"><i class='bx bxs-notepad icon'></i> Forms Risiko</a></li>
            <li><a href="#"><i class='bx bxs-chart icon'></i> Charts</a></li>
            <li><a href="#"><i class='bx bxs-widget icon'></i> Monitoring</a></li>
            <li><a href="#"><i class='bx bx-table icon'></i> Tables</a></li>
            <li class="divider" data-text="table and forms"> Users</li>
            <li><a href="#"><i class='bx bxs-happy icon'></i> All Users</a></li>

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
            <a href="#" class="nav-link">
                <i class='bx bxs-bell icon'></i>
                <span class="badge">5</span>
            </a>
            <a href="#" class="nav-link">
                <i class='bx bxs-message-square-dots icon'></i>
                <span class="badge">8</span>
            </a>
            <span class="divider"></span>
            <div class="profile">
                <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                <ul class="profile-link">
                    <li><a href="#"><i class='bx bxs-user-circle icon'></i> Profile</a></li>
                    <li><a href="#"><i class='bx bxs-cog'></i> Settings</a></li>
                    <li><a href="#"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-- Form -->
        <br>
        <div id="form-page" class="content-page d-none">
            <div class="mb-3">
                <div class="form-container">
                    <h1>Form Risiko</h1>
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
                            <option value="eks">Eksternal</option>
                            <option value="inter">Internal</option>
                            <option value="eks-int">Eksternal dan Internal</option>
                        </select>

                        <label for="uraianPeristiwa">Uraian Peristiwa</label>
                        <textarea id="uraianPeristiwa" name="uraianPeristiwa"></textarea>

                        <label for="penyebabRisiko">Penyebab Risiko</label>
                        <textarea id="penyebabRisiko" name="penyebabRisiko"></textarea>

                        <h3>Potensi Kerugian</h3>
                        <label for="akibatQualitative">Akibat Qualitative</label>
                        <textarea id="akibatQualitative" name="akibatQualitative"></textarea>

                        <label for="akibatFinansial">Akibat Finansial</label>
                        <input
                            id="akibatFinansial"
                            name="akibatFinansial"
                            type="text"
                            placeholder="Masukkan nilai dalam Rupiah"
                            style="width: 100%; padding: 8px; box-sizing: border-box;"
                            oninput="formatRupiah(this)">

                        <!-- <script>
                            function formatRupiah(input) {
                                let value = input.value.replace(/\D/g, ''); // Menghapus karakter non-angka
                                let formatted = new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR'
                                }).format(value);
                                input.value = formatted.replace(/^Rp/, '').trim(); // Menghapus label 'Rp' jika tidak diinginkan
                            }
                        </script> -->


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

                        <h3>Penilaian Risiko</h3>
                        <label for="inherentLikelihood">Inherent Likelihood</label>
                        <input type="number" id="inherentLikelihood" name="inherentLikelihood" value="0">

                        <label for="inherentImpact">Inherent Impact</label>
                        <input type="number" id="inherentImpact" name="inherentImpact" value="0">

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
                        <input type="number" id="residualLikelihood" name="residualLikelihood" value="0">

                        <label for="residualImpact">Residual Impact</label>
                        <input type="number" id="residualImpact" name="residualImpact" value="0">

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
                        <input type="number" id="mitigasiLikelihood" name="mitigasiLikelihood" value="0">

                        <label for="mitigasiImpact">Mititgasi Impact</label>
                        <input type="number" id="mitigasiImpact" name="mitigasiImpact" value="0">

                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>

    </section>
    <!-- NAVBAR -->

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
</body>

</html>