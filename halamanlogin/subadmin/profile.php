<h2>Profile</h2>
<form action="update_profile.php" method="POST" enctype="multipart/form-data">
    <div class="form-container">
        <h3>Informasi Profil</h3>
        <label for="profile-picture">Foto Profil</label>
        <input type="file" id="profile-picture" name="profile_picture">

        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="Nama Pengguna">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="email@example.com">

        <label for="password">Password (Opsional)</label>
        <input type="password" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">

        <button type="submit" class="btn btn-primary">Update Profil</button>
    </div>
</form>
