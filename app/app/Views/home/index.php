<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>
Sākums
<?= $this->endSection() ?>

<?= $this->section('headstyles') ?>

<?= $this->endSection() ?>

<?= $this->section('headscripts') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mt-4">

    <h1>Laipni lūgti telpu zonā!</h1>
    <p>Atklājiet labākās telpas pilsētā un rezervējiet savu nākamo neaizmirstamo pasākumu ar mums.</p>

    <!-- Carousel -->
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://picsum.photos/800/400?random=1" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/800/400?random=2" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/800/400?random=3" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <form class="filter-bar" method="get" action="<?= site_url('/rooms/search') ?>">

        <div>
            <label for="startDateTime">Sākums</label>
            <input
                type="text"
                name="startDateTime"
                id="startDateTime"
                class="form-control"
                placeholder="Izvēlieties sākuma datumu un laiku"
                value="<?= esc($criteria['startDateTime'] ?? '') ?>">
        </div>

        <div>
            <label for="endDateTime">Beigas</label>
            <input
                type="text"
                name="endDateTime"
                id="endDateTime"
                class="form-control"
                placeholder="Izvēlieties beigu datumu un laiku"
                value="<?= esc($criteria['endDateTime'] ?? '') ?>">
        </div>

        <div>
            <label for="guests">Cilvēku skaits</label>
            <input
                type="number"
                name="Capacity"
                id="guests"
                class="form-control"
                min="1"
                placeholder="0"
                value="<?= esc($criteria['Capacity'] ?? '') ?>">
        </div>

        <div class="search-btn">
            <button class="btn btn-primary">Meklēt telpas</button>
        </div>

    </form>


    <!-- Tabs -->
    <ul class="nav nav-tabs mt-5" id="infoTabs">

        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#rules">Noteikumi</button>
        </li>

        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#custom">Individuālie risinājumi</button>
        </li>

        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#corporate">Abonements / Korporatīvie pasākumi</button>
        </li>

    </ul>

    <div class="tab-content p-4 border rounded border-top-0">

        <div class="tab-pane fade show active" id="rules">
            <p>Šeit ir galvenie noteikumi, kas jāievēro, rezervējot telpu.</p>
        </div>

        <div class="tab-pane fade" id="custom">
            <p>Individuāli risinājumi pasākumiem pēc klienta vēlmēm.</p>
        </div>

        <div class="tab-pane fade" id="corporate">
            <p>Abonementi uzņēmumiem: konferences, korporatīvie pasākumi u.c.</p>
        </div>

    </div>

</div>


<style>
    .carousel {
        max-width: 700px;
        margin: auto;
    }

    .carousel-inner {
        height: 350px;
    }

    .carousel-item img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .carousel-control-prev {
        left: -70px;
    }

    .carousel-control-next {
        right: -70px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: invert(1);
    }

    .filter-bar {
        display: flex;
        gap: 1rem;
        margin: 2rem 0;
        flex-wrap: wrap;
        align-items: flex-end;
    }

    .filter-bar div {
        display: flex;
        flex-direction: column;
        min-width: 180px;
    }

    .filter-bar label {
        margin-bottom: 5px;
        font-weight: 600;
    }

    .search-btn {
        justify-content: flex-end;
    }
</style>


<script>
    flatpickr("#startDateTime", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
        locale: "lv"
    });

    flatpickr("#endDateTime", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        time_24hr: true,
        locale: "lv"
    });
</script>

<?= $this->endSection() ?>