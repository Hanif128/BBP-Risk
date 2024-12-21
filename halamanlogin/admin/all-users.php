<?php
$host = 'localhost';
$dbname = 'risk_management';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>GuardRisk</title>
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand"><i class='bx bxs-bank icon'></i> GuardRisk™</a>
        <ul class="side-menu">
            <li><a href="layout.php"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
            <li class="divider" data-text="main">Main</li>
            <li><a href="form-risk.php"><i class='bx bxs-notepad icon'></i> Forms Risiko</a></li>
            <li><a href="chart.php"><i class='bx bxs-chart icon'></i> Charts</a></li>
            <li><a href="man-risk.php"><i class='bx bx-table icon'></i> Tables</a></li>
            <li class="divider" data-text="users"> Users</li>
            <li><a href="all-users.php" class="active"><i class='bx bxs-happy icon'></i> All Users</a></li>
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
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <h1 class="title">Manage Users</h1>
        </main>
        <!-- NAVBAR -->

        <div class="container mt-5">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Departemen</th>
                        <th>role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['id']); ?></td>
                            <td><?php echo htmlspecialchars($user['nama']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['departemen']); ?></td>
                            <td><?php echo htmlspecialchars($user['role']); ?></td>
                            <td>
                                <!-- <button class='btn btn-info btn-sm' onclick="viewUser(<?php echo $user['id']; ?>)">
                        <i class='fas fa-eye'></i> Lihat
                        </button> -->
                                <!-- <button class='btn btn-warning btn-sm' onclick="editUser(<?php echo $user['id']; ?>)">
                                    <i class='fas fa-pencil-alt'></i> Edit
                                </button> -->
                                <button class='btn btn-danger btn-sm' onclick="deleteUser(<?php echo $user['id']; ?>)">
                                    <i class='fas fa-trash'></i> Hapus
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <br>
            <div id="form-page" class="content-page">


                <h2>Tambah Pengguna</h2>
                <form method="POST" action="insert-user.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3">
                        <label for="departemen">Departemen</label>
                        <select id="departemen" name="departemen" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="Informatika">Informatika</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Biologi">Biologi</option>
                            <option value="Fisika">Fisika</option>
                            <option value="Kimia">Kimia</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="role">Pilih role</label>
                        <select id="role" name="role" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="Admin">Admin</option>
                            <option value="Sub Admin">Sub Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </section>
    <script>
        function viewUser(id) {
            window.location.href = 'view.php?id=' + id;
        }

        function editUser(id) {
            window.location.href = 'edit.php?id=' + id;
        }

        function deleteUser(id) {
            if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
                window.location.href = 'delete-user.php?id=' + id;
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="scripts.js"></script>
</body>

</html>