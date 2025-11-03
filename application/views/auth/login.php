<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
  <div class="login-box">
    <h2>Login</h2>

    <?php if ($this->session->flashdata('error')): ?>
      <div style="color:red;"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <?= form_open('auth/login') ?>
      <div>
        <label>Nama atau Email</label><br>
        <input type="text" name="nama" value="<?= set_value('nama') ?>">
        <?= form_error('nama') ?>
      </div>
      <div>
        <label>Password</label><br>
        <input type="password" name="password">
        <?= form_error('password') ?>
      </div>
      <div>
        <button type="submit">Masuk</button>
      </div>
    <?= form_close() ?>
  </div>
</body>
</html>
