<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">

        <!-- Side navbar -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar vh-100">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link active" href="<?= site_url('admin/rooms') ?>">
                            Telpas
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="<?= site_url('admin/themes') ?>">
                            Tēmas
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="<?= site_url('admin/users') ?>">
                            Lietotāji
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="<?= site_url('admin/settings') ?>">
                            Iestatījumi
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Galvenā satura zona -->
        <main class="col-md-10 ms-sm-auto px-4">
            <div class="pt-3">
                <h1>Admin panelis</h1>
                <p>Šeit tiks parādīti dažādi statistikas dati, pārskati un funkcionalitāte, ko admins var pārvaldīt.</p>
                <p>Katrs navigācijas links aizved uz savu atsevišķu view, kur varēs labot, dzēst vai pievienot datus.</p>
            </div>
        </main>

    </div>
</div>

<style>
/* Sidebar stils */
.sidebar {
    background-color: #f8f9fa;
    padding-top: 1rem;
    border-right: 1px solid #dee2e6;
}

.nav-link {
    color: #333;
    font-weight: 500;
}

.nav-link.active {
    color: #007bff;
}
</style>

<?= $this->endSection() ?>