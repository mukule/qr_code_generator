<!-- /app/Views/pages/create_qr.php -->
<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

<div class="container p-3">
    <h2><?= esc($title); ?></h2>
    <hr>
    <?= $this->include('partials/messages'); ?>
    <div class="content bg-white p-4 rounded shadow-sm">
        <form action="<?= base_url('/generate-qr-code'); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="form-group mb-3">
                <label for="link">Link</label>
                <input type="url" id="link" name="link" class="form-control" placeholder="Enter link to Generate Qr Code" value="<?= esc($data['link'] ?? '') ?>" required>
                <?= \Config\Services::validation()->getError('link'); ?>
            </div>

            <button type="submit" class="btn btn-primary">Generate QR Code</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
