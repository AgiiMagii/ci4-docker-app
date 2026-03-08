<?= $this->extend('layouts/default') ?>
<?= $this->section('content') ?>

<div class="container vh-100 d-flex justify-content-center align-items-center">

    <div class="card shadow p-4" style="width:400px; position:relative;">

        <a href="javascript:history.back()"
            class="btn-close position-absolute top-0 end-0 m-3"></a>

        <h3 class="text-center mb-4">Reģistrēties</h3>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('auth/register') ?>">
            <div class="mb-3">
                <label class="form-label">Vārds</label>
                <input
                    type="text"
                    name="Name"
                    class="form-control"
                    placeholder="ievadiet vārdu"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Uzvārds</label>
                <input
                    type="text"
                    name="Surname"
                    class="form-control"
                    placeholder="ievadiet uzvārdu"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">E-pasts</label>
                <input
                    type="email"
                    name="Email"
                    class="form-control"
                    placeholder="ievadiet e-pastu"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Telefona numurs</label>
                <input
                    type="text"
                    name="Phone"
                    class="form-control"
                    placeholder="ievadiet telefona numuru"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Parole</label>
                <input
                    type="password"
                    name="Password"
                    class="form-control"
                    placeholder="ievadiet paroli"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Apstiprināt paroli</label>
                <input
                    type="password"
                    name="confirmPassword"
                    class="form-control"
                    placeholder="apstipriniet paroli"
                    required>
            </div>

            <button class="btn btn-primary w-100">
                Reģistrēties
            </button>

        </form>

        <div class="d-flex justify-content-center gap-3 mt-3">
            <a href="<?= base_url('auth/login') ?>">Pieteikties</a>
        </div>

    </div>

</div>

<?= $this->endSection() ?>