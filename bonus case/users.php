<?php
require_once 'config.php';

// Tambah pengguna baru
function addUser($username, $password)
{
  global $pdo;
  $hash = password_hash($password, PASSWORD_DEFAULT);

  $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
  $stmt->execute([$username, $hash]);
}

// Verifikasi pengguna berdasarkan username dan password
function verifyUser($username, $password)
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT password FROM users WHERE username = ?");
  $stmt->execute([$username]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($row && password_verify($password, $row['password'])) {
    return true;
  }

  return false;
}
