<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?= $this->renderSection('title') ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">
  <?= $this->renderSection('headstyles') ?>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/lv.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <?= $this->renderSection('headscripts') ?>
</head>

<body>
  <div class="page-container">
    <header>
      <nav class="navbar">
        <a href="<?= session()->get('logged_in') ? base_url('auth/profile') : base_url('/') ?>" class="logo">
          <?php if (session()->get('logged_in')): ?>
            Sveiki, <?= esc(session()->get('fullName')) ?>
          <?php else: ?>
            Party Zone
          <?php endif; ?>
        </a>
        <ul class="nav-links">
          <li><a href="<?= base_url('/') ?>">Sākums</a></li>
          <li><a href="<?= base_url('rooms/list') ?>">Telpas</a></li>
          <li><a href="<?= base_url('book') ?>">Rezervēt</a></li>
          <li><a href="<?= base_url('contact') ?>">Kontakti</a></li>
          <?php if (session()->get('logged_in')): ?>
            <!-- Lietotājs ir ielogojies -->
            <?php if (session()->get('role') === 'admin'): ?>
              <li><a href="<?= base_url('admin/panel') ?>">Admin Panelis</a></li>
            <?php endif; ?>
            <li><a href="<?= base_url('auth/profile') ?>">Profils</a></li>
            <li><a href="<?= base_url('auth/logout') ?>">Iziet</a></li>
          <?php else: ?>
            <!-- Viesis -->
            <li><a href="<?= base_url('auth/login') ?>">Pieteikties</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>

    <main class="content">
      <?= $this->renderSection('content') ?>
    </main>

    <footer>
      <p>&copy; <?= date('Y') ?> Party Zone. All rights reserved.</p>
    </footer>
  </div>
  <?= $this->renderSection('scripts') ?>
</body>

</html>