<?php
require_once 'config.php';
require_once 'instansi.php';

session_start();
if (!isset($_SESSION['username'])) {
  // Pengguna belum login, arahkan ke halaman login
  header('Location: index.php');
  exit();
}

$instansiList = getInstansiList();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
</head>

<body>
  <h1>Selamat datang, <?= $_SESSION['username'] ?></h1>

  <h2>Daftar Instansi</h2>

  <table>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Telepon</th>
      <th>Email</th>
      <th>Aksi</th>
    </tr>
    <?php foreach ($instansiList as $instansi) : ?>
      <tr>
        <td><?= $instansi['id'] ?></td>
        <td><?= $instansi['nama'] ?></td>
        <td><?= $instansi['alamat'] ?></td>
        <td><?= $instansi['telepon'] ?></td>
        <td><?= $instansi['email'] ?></td>
        <td>
          <a href="edit.php?id=<?= $instansi['id'] ?>">Edit</a>
          <a href="delete.php?id=<?= $instansi['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus instansi ini?')">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

  <a href="add.php">Tambah Instansi</a>
  <a href="logout.php">Logout</a>
</body>

</html>