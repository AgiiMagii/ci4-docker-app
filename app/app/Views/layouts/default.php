<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $this->renderSection('title') ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">
  <?= $this->renderSection('headstyles') ?> 
  <?= $this->renderSection('headscripts') ?>
</head>
<body>
  <div class="page-container">
    <header>
      <nav class="navbar">
        <a href="<?= base_url('/') ?>" class="logo">Party Zone</a>
        <ul class="nav-links">
          <li><a href="<?= base_url('/') ?>">Home</a></li>
          <li><a href="<?= base_url('rooms/list') ?>">Venues</a></li>
          <li><a href="<?= base_url('book') ?>">Book Now</a></li>
          <li><a href="<?= base_url('contact') ?>">Contact Us</a></li>
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