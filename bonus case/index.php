<?php
require_once 'config.php';
require_once 'users.php';
require_once 'instansi.php';

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (verifyUser($username, $password)) {
        // Login berhasil, set session atau tanda pengguna telah login
        session_start();
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit();
    } else {
        // Login gagal, tampilkan pesan error
        $error = 'Username atau password salah';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>

    <?php if (isset($error)) : ?>
        <p><?= $error ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>

</html>