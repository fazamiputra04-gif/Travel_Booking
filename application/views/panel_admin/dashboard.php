<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #2c3e50;
            color: white;
            padding: 15px 20px;
            text-align: center;
        }
        nav {
            background-color: #34495e;
            padding: 10px;
        }
        nav a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .content {
            padding: 30px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li a {
            color: #2980b9;
            text-decoration: none;
        }
        ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header>
    <h1>Selamat Datang di Dashboard Admin</h1>
</header>

<nav>
    <a href="<?= site_url('panel_admin') ?>">🏠 Dashboard</a>
    <a href="<?= site_url('user') ?>">👥 Kelola User</a>
    <a href="<?= site_url('transaction') ?>">💳 Data Transaksi</a>
    <a href="<?= site_url('paket') ?>">📦 Kelola Wisata</a>
    <a href="<?= site_url('laporan') ?>">📄 Laporan</a>
</nav>

<div class="content">
    <div class="card">
        <p>Halo, <strong><?= isset($user['username']) ? $user['username'] : $user['email']; ?></strong>!</p>

        <hr>
        <ul>
            <li><a href="<?= site_url('panel_admin/edit_password') ?>">🔑 Ganti Password</a></li>
            <li><a href="<?= site_url('auth/logout') ?>">🚪 Logout</a></li>
        </ul>
    </div>
</div>

</body>
</html>
