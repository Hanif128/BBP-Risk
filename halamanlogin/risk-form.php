<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Risiko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        body {
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        /* Sidebar Styles */
        #sidebar {
            background: linear-gradient(180deg, #1E3A8A, #3B82F6);
            color: #fff;
            width: 80px;
            transition: width 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #sidebar:hover {
            width: 250px;
        }

        #sidebar .nav-link {
            color: #fff;
            transition: background-color 0.3s, color 0.3s;
        }

        #sidebar .nav-link:hover {
            background-color: #2563EB;
        }

        #sidebar .nav-item span {
            display: none;
            margin-left: 10px;
        }

        #sidebar:hover .nav-item span {
            display: inline;
        }

        /* Profile Section */
        .profile-section {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-section img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        #sidebar:hover .profile-section img {
            width: 80px;
            height: 80px;
        }

        #sidebar .profile-section span {
            display: none;
        }

        #sidebar:hover .profile-section span {
            display: block;
            color: #E0E7FF;
        }

        #logout-link {
            display: none;
            margin-top: 10px;
        }

        #sidebar:hover #logout-link {
            display: block;
        }

        /* Content Styles */
        .content {
            flex: 1;
            padding: 20px;
            background-color: #F9FAFB;
        }

        .content h2 {
            color: #1E3A8A;
        }

        .btn-primary {
            background-color: #2563EB;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1E3A8A;
        }

        /* halaman form*/
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
        input, select, textarea {
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
</head>
<body>

<!-- Sidebar -->
<div id="sidebar" class="d-flex flex-column py-3">
        <div class="profile-section">
            <img src="https://via.placeholder.com/80" alt="Foto Profil">
            <span class="fw-bold">Nama Pengguna</span>
            <span class="small">email@example.com</span>
            <a href="logout.php" class="btn btn-danger btn-sm" id="logout-link">Logout</a>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#" id="profile-link">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="risk-form.php" id="form-link">
                    <i class="bi bi-journal-plus"></i>
                    <span>Form Risiko</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="table-link">
                    <i class="bi bi-table"></i>
                    <span>Manajemen Risiko</span>
                </a>
            </li>
        </ul>
    </div>

<div class="form-container">
    <h1>Form Risiko</h1>
    <form action="#" method="POST">
        <h3>Informasi Risiko</h3>
        <label for="tujuan">Tujuan</label>
        <input type="text" id="tujuan" name="tujuan">
        
        <label for="kodeRisiko">Kode Risiko</label>
        <input type="text" id="kodeRisiko" name="kodeRisiko">
        
        <label for="prosesBisnis">Proses Bisnis</label>
        <select id="prosesBisnis" name="prosesBisnis">
            <option value="">-- Pilih --</option>
        </select>
        
        <label for="kelompok">Kelompok</label>
        <select id="kelompok" name="kelompok">
            <option value="">-- Pilih --</option>
        </select>
        
        <label for="sumber">Sumber</label>
        <select id="sumber" name="sumber">
            <option value="">-- Pilih --</option>
        </select>
        
        <label for="uraianPeristiwa">Uraian Peristiwa</label>
        <textarea id="uraianPeristiwa" name="uraianPeristiwa"></textarea>
        
        <label for="penyebabRisiko">Penyebab Risiko</label>
        <textarea id="penyebabRisiko" name="penyebabRisiko"></textarea>

        <h3>Potensi Kerugian</h3>
        <label for="akibat">Akibat</label>
        <textarea id="akibat" name="akibat"></textarea>
        
        <label for="akibatFinansial">Akibat Finansial</label>
        <textarea id="akibatFinansial" name="akibatFinansial"></textarea>

        <h3>Informasi Terkait</h3>
        <label for="pemilikRisiko">Pemilik Risiko</label>
        <input type="text" id="pemilikRisiko" name="pemilikRisiko">
        
        <label for="departemen">Departemen</label>
        <select id="departemen" name="departemen">
            <option value="">-- Pilih --</option>
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
        </select>
        
        <label for="memadai">Memadai</label>
        <select id="memadai" name="memadai">
            <option value="">-- Pilih --</option>
        </select>
        
        <label for="status">Status</label>
        <select id="status" name="status">
            <option value="">-- Pilih --</option>
        </select>
        
        <label for="residualLikelihood">Residual Likelihood</label>
        <input type="number" id="residualLikelihood" name="residualLikelihood" value="0">
        
        <label for="residualImpact">Residual Impact</label>
        <input type="number" id="residualImpact" name="residualImpact" value="0">

        <h3>Penanganan</h3>
        <label for="tindakanMitigasi">Tindakan Mitigasi</label>
        <textarea id="tindakanMitigasi" name="tindakanMitigasi"></textarea>
        
        <label for="perlakuan">Perlakuan</label>
        <select id="perlakuan" name="perlakuan">
            <option value="">-- Pilih --</option>
        </select>
        
        <label for="mitigasiLikelihood">Mitigasi Likelihood</label>
        <input type="number" id="mitigasiLikelihood" name="mitigasiLikelihood" value="0">
        
        <label for="mitigasiImpact">Mitigasi Impact</label>
        <input type="number" id="mitigasiImpact" name="mitigasiImpact" value="0">

        <button type="submit">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navigasi antar halaman
        const links = document.querySelectorAll('.nav-link');
        const pages = document.querySelectorAll('.content-page');

        links.forEach(link => {
            link.addEventListener('click', () => {
                pages.forEach(page => page.classList.add('d-none'));
                links.forEach(l => l.classList.remove('active'));
                link.classList.add('active');
                document.querySelector(`#${link.id.split('-')[0]}-page`).classList.remove('d-none');
            });
        });
    </script>

</body>
</html>
