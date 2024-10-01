<!-- /app/Views/pages/detailed_qr_codes.php -->
<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

<div class="container p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="<?= base_url('/home') ?>" class="btn btn-primary">
            <i class="fas fa-home"></i> Home
        </a>
        <h2 class="text-center flex-grow-1" style="font-size: 1.5rem;">Detailed QR Codes</h2>
        <a href="<?= base_url('/generate-d-qr-code') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Detailed QR Code
        </a>
    </div>
    <hr>
    <?= $this->include('partials/messages'); ?>
    
    <div class="content bg-white p-2 rounded shadow-sm">
        <?php if (!empty($qrCodes)): ?>
            <table class="table table-hover table-striped table-bordered" style="font-size: 0.9rem;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th>QR</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($qrCodes as $index => $qrCode): ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= esc($qrCode['name']); ?></td>
                        <td><?= esc($qrCode['details']); ?></td>
                        <td><img src="<?= esc($qrCode['qr_code_image']); ?>" alt="QR Code" style="width: 50px;"></td>
                        <td><?= esc($qrCode['created_at']); ?></td>
                        <td class="d-flex justify-content-around">
                            <a href="<?= esc($qrCode['qr_code_image']); ?>" download class="btn btn-primary btn-sm mx-2" title="Download">
                                <i class="fas fa-download"></i>
                            </a>
                            <a href="<?= esc($qrCode['qr_code_image']); ?>" class="btn btn-secondary btn-sm mx-2" title="Zoom" target="_blank">
                                <i class="fas fa-search-plus"></i>
                            </a>
                            <a href="<?= base_url('detailed-qr-codes/edit/' . $qrCode['id']); ?>" class="btn btn-primary btn-sm mx-2" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No detailed QR codes generated yet.</p>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection(); ?>
