<!-- /app/Views/pages/home.php -->
<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

<div class="container p-3">
    <?= $this->include('partials/messages'); ?>
    
    <div class="jumbotron mt-3">
        <h1 class="display-2">Welcome, <?= session()->get('username'); ?></h1>
        
        <?php
        $accessLevel = session()->get('access_lvl');
        if ($accessLevel == 1): ?>
            <p class="card-title">You are an Admin.</p>
        <?php else: ?>
            <p class="card-title">You have a standard user role.</p>
        <?php endif; ?>

        <hr class="my-4">
    </div>

    <div class="content bg-white p-4 rounded shadow-sm">
        <div class="row justify-content-center">
            <div class="col-md-3 mb-4">
                <a href="<?= base_url('/staffs') ?>" class="text-decoration-none">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-3x mb-3"></i>
                            <h5 class="card-title">Users</h5>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-3 mb-4">
                <a href="<?= base_url('/generated-qr-codes') ?>" class="text-decoration-none">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-qrcode fa-3x mb-3"></i>
                            <h5 class="card-title">QR Codes</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mb-4">
                <a href="<?= base_url('/generated-detailed-qr-codes') ?>" class="text-decoration-none">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-file-alt fa-3x mb-3"></i>
                            <h5 class="card-title">Detailed QR Codes</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 mb-4">
                <a href="<?= base_url('/version') ?>" class="text-decoration-none">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas <?= $version['level'] == 1 ? 'fa-check-circle' : 'fa-exclamation-circle'; ?> fa-3x mb-3"></i>
                            <h5 class="card-title">
                                <?= $version['level'] == 1 ? 'Upgraded' : 'Upgrade Needed'; ?>
                            </h5>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>
