<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Manajemen Risiko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
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
                <a class="nav-link" href="dashboard.php" data-page="dashboard.php">
                    <i class="bi bi-house-door"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.php" data-page="profile.php">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="form-risk.php" data-page="form-risk.php">
                    <i class="bi bi-journal-plus"></i>
                    <span>Form Risiko</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="man-risk.php" data-page="man-risk.php">
                    <i class="bi bi-table"></i>
                    <span>Manajemen Risiko</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content" id="main-content">
        <!-- Content will be dynamically loaded here -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="script.js"></script>
</body>
</html>
