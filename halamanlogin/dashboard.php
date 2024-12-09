<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Manajemen Risiko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
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
                <a class="nav-link" href="#" id="form-link">
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

    <!-- Main Content -->
    <div class="content">
        <!-- Pages -->
        <div id="profile-page" class="content-page">
            <h2>Profile</h2>
            <p>Informasi profile pengguna.</p>
        </div>
        <div id="form-page" class="content-page d-none">
            <h2>Form Risiko</h2>
            <form id="risk-form">
                <div class="mb-3">
                    <label for="risk-name" class="form-label">Nama Risiko</label>
                    <input type="text" id="risk-name" class="form-control" placeholder="Masukkan nama risiko" required>
                </div>
                <div class="mb-3">
                    <label for="risk-category" class="form-label">Kategori Risiko</label>
                    <select id="risk-category" class="form-select" required>
                        <option value="" disabled selected>Pilih kategori</option>
                        <option value="finansial">Finansial</option>
                        <option value="operasional">Operasional</option>
                        <option value="strategi">Strategi</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="risk-description" class="form-label">Deskripsi Risiko</label>
                    <textarea id="risk-description" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div id="table-page" class="content-page d-none">
            <h2>Manajemen Risiko</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Risiko</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody id="risk-table-body">
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data.</td>
                    </tr>
                </tbody>
            </table>
        </div>
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
