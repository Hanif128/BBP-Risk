<?php
session_start();
session_destroy();  // Menghancurkan sesi
header("Location: index.php");  // Arahkan kembali ke halaman login
exit();
