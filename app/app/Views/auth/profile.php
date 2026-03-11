<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <nav class="col-md-4 col-lg-3 p-0 sidebar">

            <div class="list-group list-group-flush pt-3" role="tablist">

                <a class="list-group-item list-group-item-action active"
                    data-bs-toggle="list"
                    href="#info"
                    role="tab">
                    Personīgais info
                </a>

                <a class="list-group-item list-group-item-action"
                    data-bs-toggle="list"
                    href="#change-password"
                    role="tab">
                    Mainīt paroli
                </a>

                <a class="list-group-item list-group-item-action"
                    data-bs-toggle="list"
                    href="#edit-booking"
                    role="tab">
                    Labot rezervāciju
                </a>

                <a class="list-group-item list-group-item-action"
                    data-bs-toggle="list"
                    href="#history"
                    role="tab">
                    Vēsture
                </a>

                <a class="list-group-item list-group-item-action text-danger"
                    data-bs-toggle="list"
                    href="#delete"
                    role="tab">
                    Dzēst profilu
                </a>

            </div>
        </nav>


        <!-- Main content -->
        <main class="col-md-8 col-lg-8 px-4 pt-3">

            <div class="tab-content">

                <!-- PERSONĪGAIS INFO -->
                <div class="tab-pane fade show active profile-section" id="info">

                    <h3>Personīgais info</h3>

                    <form method="post" action="<?= site_url('auth/update') ?>">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label">Vārds</label>
                            <input type="text" class="form-control" name="Name" value="<?= esc($user['Name']) ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Uzvārds</label>
                            <input type="text" class="form-control" name="Surname" value="<?= esc($user['Surname']) ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">E-pasts</label>
                            <input type="email" class="form-control" name="Email" value="<?= esc($user['Email']) ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telefons</label>
                            <input type="text" class="form-control" name="Phone" value="<?= esc($user['Phone']) ?>">
                        </div>

                        <button class="btn btn-primary">Saglabāt</button>

                    </form>

                </div>


                <!-- MAINĪT PAROLI -->
                <div class="tab-pane fade profile-section" id="change-password">

                    <h3>Mainīt paroli</h3>

                    <form method="post" action="<?= site_url('auth/change-password') ?>">

                        <div class="mb-3">
                            <label class="form-label">Pašreizējā parole</label>
                            <input type="password" class="form-control" name="currentPassword">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jaunā parole</label>
                            <input type="password" class="form-control" name="newPassword">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Apstiprināt paroli</label>
                            <input type="password" class="form-control" name="confirmPassword">
                        </div>

                        <button class="btn btn-primary">Mainīt paroli</button>

                    </form>

                </div>


                <!-- REZERVĀCIJAS -->
                <div class="tab-pane fade profile-section" id="edit-booking">

                    <h3>Labot rezervāciju</h3>

                    <p>Šeit nākotnē būs iespēja labot rezervācijas.</p>

                </div>


                <!-- VĒSTURE -->
                <div class="tab-pane fade profile-section" id="history">

                    <h3>Vēsture</h3>

                    <p>Šeit būs redzama rezervāciju un aktivitāšu vēsture.</p>

                </div>


                <!-- DZĒST PROFILU -->
                <div class="tab-pane fade profile-section" id="delete">

                    <h3 class="text-danger">Dzēst profilu</h3>

                    <p><strong>Brīdinājums:</strong> šī darbība būs neatgriezeniska.</p>

                    <form method="post" action="<?= site_url('auth/delete') ?>">
                        <button class="btn btn-danger">Dzēst profilu</button>
                    </form>

                </div>

            </div>
        </main>

    </div>
</div>


<style>
    .sidebar {
        background: #f8f9fa;
        border-right: 1px solid #dee2e6;
        min-height: 100vh;
        position: sticky;
        top: 0;
    }

    .sidebar .list-group-item {
        border: 0;
        border-radius: 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .sidebar .list-group-item.active {
        background: #0d6efd;
        color: white;
    }

    .profile-section {
        background: #fff;
        padding: 20px;
        border-radius: 6px;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.05);
    }
</style>

<?= $this->endSection() ?>