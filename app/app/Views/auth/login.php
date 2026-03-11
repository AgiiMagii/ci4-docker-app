<?= $this->extend('layouts/default') ?>
<?= $this->section('content') ?>

<div class="container vh-100 d-flex justify-content-center align-items-center">

    <div class="card shadow p-4" style="width:400px; position:relative;">

        <a href="javascript:history.back()"
            class="btn-close position-absolute top-0 end-0 m-3"></a>

        <h3 class="text-center mb-4">Pieteikties</h3>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('auth/login') ?>">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">E-pasts</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="ievadiet e-pastu"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Parole</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="ievadiet paroli"
                    required>
            </div>

            <button class="btn btn-primary w-100">
                Pieteikties
            </button>

        </form>

        <div class="d-flex justify-content-center gap-3 mt-3">
            <a href="<?= base_url('auth/forgot-password') ?>">Aizmirsu paroli</a>
            <a href="<?= base_url('auth/register') ?>">Reģistrēties</a>
        </div>

    </div>

</div>

<?= $this->endSection() ?>