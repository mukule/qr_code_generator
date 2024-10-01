<!-- /app/Views/pages/edit_detailed_qr_code.php -->
<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

<div class="container p-3">
    <h2><?= esc($title); ?></h2>
    <hr>
    <?= $this->include('partials/messages'); ?>
    <div class="content bg-white p-4 rounded shadow-sm">
        <form action="<?= base_url('/detailed-qr-codes/edit/' . esc($data['id'])); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter name for QR Code" value="<?= esc($data['name'] ?? '') ?>" required>
                <?= \Config\Services::validation()->getError('name'); ?>
            </div>

            <div class="form-group mb-3">
                <label for="details">Details</label>
                <textarea id="details" name="details" class="form-control" placeholder="Enter details for QR Code" required><?= esc($data['details'] ?? '') ?></textarea>
                <?= \Config\Services::validation()->getError('details'); ?>
            </div>

            

            <button type="submit" class="btn btn-primary">Re-Generate</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
