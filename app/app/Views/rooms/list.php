<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>
Party Venues
<?= $this->endSection() ?>

<?= $this->section('headstyles') ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<?= $this->endSection() ?>

<?= $this->section('headscripts') ?>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/lv.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1>Available Party Venues</h1>
    <p>Here are the available party venues for your selected date and time:</p>
    
     <?php if (isset($rooms) && !empty($rooms)): ?>
        <ul class="venue-list">
            <?php foreach ($rooms as $room): ?>
                <li class="venue-item">
                    <h2><?= esc($room['Name']) ?></h2>
                    <p><?= esc($room['Description']) ?></p>
                    <p><strong>Capacity:</strong> <?= esc($room['Capacity']) ?> guests</p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No venues are available for the selected date and time. Please try different options.</p>
    <?php endif; ?>
<?= $this->endSection() ?>