<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>
Sākums
<?= $this->endSection() ?>

<?= $this->section('headstyles') ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<?= $this->endSection() ?>

<?= $this->section('headscripts') ?>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/lv.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1>Welcome to Party Zone!</h1>
    <p>Discover the best party venues in town and book your next unforgettable event with us.</p>
    
    <div class="booking-form">
        <h2>Book Your Party Now</h2>
        <form action="<?= base_url('/book') ?>" method="post">
        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="date">Party Date:</label>
            <input type="text" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="guests">Number of Guests:</label>
            <input type="number" id="guests" name="guests" required>
        </div>
        <button type="submit">Book Now</button>
    </form>
<?= $this->endSection() ?>