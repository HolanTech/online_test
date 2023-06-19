<?php
require_once 'config.php';

// Tambah instansi baru
function addInstansi($nama, $alamat, $telepon, $email)
{
  global $pdo;

  $stmt = $pdo->prepare("INSERT INTO instansi (nama, alamat, telepon, email) VALUES (?, ?, ?, ?)");
  $stmt->execute([$nama, $alamat, $telepon, $email]);
}

// Dapatkan daftar instansi
function getInstansiList()
{
  global $pdo;

  $stmt = $pdo->query("SELECT * FROM instansi");
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $result;
}

// Dapatkan instansi berdasarkan ID
function getInstansiById($id)
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM instansi WHERE id = ?");
  $stmt->execute([$id]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  return $row;
}

// Update data instansi
function updateInstansi($id, $nama, $alamat, $telepon, $email)
{
  global $pdo;

  $stmt = $pdo->prepare("UPDATE instansi SET nama = ?, alamat = ?, telepon = ?, email = ? WHERE id = ?");
  $stmt->execute([$nama, $alamat, $telepon, $email, $id]);
}

// Hapus instansi berdasarkan ID
function deleteInstansi($id)
{
  global $pdo;

  $stmt = $pdo->prepare("DELETE FROM instansi WHERE id = ?");
  $stmt->execute([$id]);
}
