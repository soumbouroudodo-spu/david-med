<?php
require 'config_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $matricule = $_POST['matricule'];
  $password = $_POST['password'];

  $stmt = $pdo->prepare("SELECT * FROM users WHERE matricule = ?");
  $stmt->execute([$matricule]);
  $user = $stmt->fetch();

  if ($user && password_verify($password, $user['password'])) {

    $_SESSION['user'] = $user;

    switch ($user['role_code']) {

      case 'super_admin':
        header("Location: super_admin.html");
        break;

      case 'admin_billetterie':
        header("Location: admin_billetterie.html");
        break;

      case 'employe_billetterie':
        header("Location: employe_billetterie.html");
        break;

      case 'admin_maintenance':
        header("Location: admin_maintenance.html");
        break;

      case 'employe_maintenance':
        header("Location: employe_maintenance.html");
        break;

      case 'admin_exploitation':
        header("Location: admin_exploitation.html");
        break;

      case 'employe_exploitation':
        header("Location: employe_exploitation.html");
        break;

      case 'admin_securite':
        header("Location: admin_securite.html");
        break;

      case 'employe_securite':
        header("Location: employe_securite.html");
        break;

      case 'admin_rh':
        header("Location: admin_rh.html");
        break;

      case 'employe_rh':
        header("Location: employe_rh.html");
        break;
    }
    exit;
  } else {
    echo "❌ Matricule ou mot de passe incorrect";
  }
}
