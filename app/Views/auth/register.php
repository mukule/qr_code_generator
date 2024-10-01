<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

<div class="container p-3">
    <h2>Create Staff</h2>
    <hr>
    <div class="content bg-white p-4 rounded shadow-sm mx-auto">
        <!-- Display success message -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Display validation errors -->
        <?php if (isset($validation) && $validation->getErrors()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($validation->getErrors() as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/register') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="form-group mb-3">
                <input type="text" name="username" id="username" placeholder="Enter username" class="form-control" value="<?= esc($data['username'] ?? '') ?>" required>
            </div>
            
            <div class="form-group mb-3">
                <input type="email" name="email" id="email" placeholder="Enter email" class="form-control" value="<?= esc($data['email'] ?? '') ?>" required>
            </div>
            
            <div class="form-group mb-3">
                <input type="text" name="full_name" id="full_name" placeholder="Enter full name" class="form-control" value="<?= esc($data['full_name'] ?? '') ?>" required>
            </div>

            <div class="form-group mb-3">
                <select name="access_lvl" id="access_lvl" class="form-control" required>
                    <?php foreach ($access_levels as $level => $label): ?>
                        <option value="<?= esc($level) ?>" <?= (isset($data['access_lvl']) && $data['access_lvl'] == $level) ? 'selected' : '' ?>>
                            <?= esc($label) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group mb-3">
                <input type="password" name="password" id="password" placeholder="Enter password" class="form-control" required>
            </div>
            
            <div class="form-group mb-3">
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
