<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

<div class="container p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="<?= base_url('/docs') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
        <h2>Edit Document Type</h2>
    </div>
    <hr>
    <div class="content bg-white p-4 rounded shadow-sm">
        <!-- Display Success Message -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- Display Validation Errors -->
        <?php if (isset($validation) && $validation->getErrors()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($validation->getErrors() as $error): ?>
                        <li><?= esc($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Form for Editing Document Type -->
        <form action="<?= base_url('/tenders/docs_edit/' . $doc_type['id']) ?>" method="post">
            <?= csrf_field(); ?>
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $doc_type['name']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
