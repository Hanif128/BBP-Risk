<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "risk_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $nama = $conn->real_escape_string($_POST['nama']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_BCRYPT); // Enkripsi password
    $departemen = $conn->real_escape_string($_POST['departemen']);
    $role = $conn->real_escape_string($_POST['role']);

    // Validasi role tidak kosong
    if (empty($role)) {
        echo "Role harus dipilih!";
        exit;
    }

    // Query untuk menyimpan data ke tabel users
    $sql = "INSERT INTO users (username, email, password, nama, departemen, role) 
            VALUES ('$username', '$email', '$password', '$nama', '$departemen', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Data berhasil ditambahkan!');
        window.location.href = 'all-users.php';
    </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
}
?>
