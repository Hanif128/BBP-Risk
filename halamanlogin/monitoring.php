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
            <li><a href="layout.php"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
            <li class="divider" data-text="main">Main</li>
            <li><a href="form-risk.php"><i class='bx bxs-notepad icon'></i> Forms Risiko</a></li>
            <li><a href="chart.php"><i class='bx bxs-chart icon'></i> Charts</a></li>
            <li><a href="monitoring.php" class="active"><i class='bx bxs-widget icon'></i> Monitoring</a></li>
            <li><a href="man-risk.php"><i class='bx bx-table icon'></i> Tables</a></li>
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
            <h1 class="title">Monitoring</h1>
            <ul class="breadcrumbs">
                <li><a href="logout.php">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Monitoring</a></li>
            </ul>
        </main>
    </section>
    <!-- NAVBAR -->

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="scripts.js"></script>
</body>

</html>