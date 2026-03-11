<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>
Pasākumu telpas
<?= $this->endSection() ?>

<?= $this->section('headstyles') ?>
<?= $this->endSection() ?>

<?= $this->section('headscripts') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Pieejamās pasākumu telpas</h1>

<div class="date-filter">
    <input type="text" placeholder="Datums no" id="startDate" name="startDate"
        value="<?= esc($criteria['date_from'] ?? '') ?>">
    <input type="text" placeholder="līdz" id="endDate" name="endDate"
        value="<?= esc($criteria['date_to'] ?? '') ?>">
</div>

<?php if (isset($rooms) && !empty($rooms)): ?>

    <div class="venue-list">

        <?php foreach ($rooms as $room): ?>

            <div class="venue-card">

                <div class="venue-header" onclick="toggleAccordion(this)">
                    <h2><?= esc($room['Name']) ?></h2>
                    <p class="venue-address"><?= esc($room['Description']) ?></p>

                    <p class="venue-capacity">
                        👥 <?= esc($room['Capacity']) ?>
                    </p>

                    <?php if ($room['Picture']): ?>
                        <div class="venue-image">
                            <img src="<?= base_url($room['Picture']) ?>">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="venue-accordion">
                    <form method="post">

                        <label>Personu skaits</label>
                        <input type="number" name="persons" min="1" max="<?= esc($room['Capacity']) ?>">

                        <label>Datums no</label>
                        <input type="date" name="date_from">

                        <label>Datums līdz</label>
                        <input type="date" name="date_to">

                        <button type="submit">Rezervēt</button>

                    </form>
                </div>

            </div>

        <?php endforeach; ?>

    </div>

<?php else: ?>

    <p>Nav pieejamu telpu izvēlētajā datumā un laikā.</p>

<?php endif; ?>

<script>
    function toggleAccordion(header) {
        let card = header.parentElement;
        let accordion = card.querySelector(".venue-accordion");

        document.querySelectorAll(".venue-accordion").forEach(a => {
            if (a !== accordion) {
                a.style.display = "none";
            }
        });

        if (accordion.style.display === "block") {
            accordion.style.display = "none";
        } else {
            accordion.style.display = "block";
        }
    }
</script>
<script>
    flatpickr("#startDate", {
        locale: "lv",
        dateFormat: "d.m.Y",
    });

    flatpickr("#endDate", {
        locale: "lv",
        dateFormat: "d.m.Y",
    });
</script>
<style>
    .date-filter {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .date-filter input {
        padding: 8px;
        width: 150px;
    }

    .venue-header {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .venue-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .venue-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        cursor: pointer;
        background: #fff;
        transition: 0.2s;

        display: flex;
        flex-direction: column;
        transition: transform 0.3s;
    }

    .venue-image {
        width: 100%;
        height: 220px;
        overflow: hidden;
        border-radius: 6px;
        margin-top: auto;
        /* tas piespiež bildi uz apakšu */
    }

    .venue-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;

    }

    .venue-card:hover {
        transform: scale(1.05);
        /* viegls zoom hover */
    }

    .venue-header h2 {
        margin-top: 0;
    }

    .venue-address {
        color: #777;
        margin-bottom: 8px;
    }

    .venue-capacity {
        font-weight: 500;
        margin-bottom: 8px;
    }

    .venue-accordion {
        display: none;
        margin-top: 15px;
        border-top: 1px solid #eee;
        padding-top: 15px;
    }

    .venue-accordion input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
    }

    button {
        padding: 10px 15px;
        background: #2e7d32;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background: #1b5e20;
    }
</style>

<?= $this->endSection() ?>