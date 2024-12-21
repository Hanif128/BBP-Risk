<?php
// Koneksi ke database (sesuaikan dengan kredensial Anda)
include('db_connection.php'); // pastikan file ini berisi koneksi ke database

// Pastikan pengguna sudah login (sesuaikan dengan sistem autentikasi Anda)
session_start();
$userId = $_SESSION['user_id']; // ID pengguna yang sedang login

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Mengelola foto profil
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
        $fileName = $_FILES['profile_picture']['name'];
        $fileType = $_FILES['profile_picture']['type'];
        $fileSize = $_FILES['profile_picture']['size'];

        // Validasi apakah file adalah gambar
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($fileType, $allowedTypes)) {
            die('Hanya file gambar yang diperbolehkan!');
        }

        // Membuat nama file unik
        $uploadDirectory = 'uploads/profiles/';
        $dest_path = $uploadDirectory . uniqid('profile_', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

        // Memastikan direktori upload ada
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        // Memindahkan file gambar ke folder upload
        if (!move_uploaded_file($fileTmpPath, $dest_path)) {
            die('Gagal mengunggah file.');
        }
    } else {
        $dest_path = null; // Jika tidak ada foto yang diunggah
    }

    // Jika password kosong, jangan ubah password
    if (!empty($password)) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET username = ?, email = ?, password = ?, profile_picture = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssi', $username, $email, $passwordHash, $dest_path, $userId);
    } else {
        $query = "UPDATE users SET username = ?, email = ?, profile_picture = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssi', $username, $email, $dest_path, $userId);
    }

    // Eksekusi query untuk memperbarui profil
    if ($stmt->execute()) {
        echo 'Profil berhasil diperbarui.';
        // Redirect atau pesan sukses lainnya
    } else {
        echo 'Gagal memperbarui profil.';
    }

    // Tutup statement
    $stmt->close();
}
?>
