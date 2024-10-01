<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

<div class="container p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="<?= base_url('/procurement_plans') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
        <h2><?= esc($title); ?></h2>
    </div>
    <hr>
    <div class="content bg-white p-4 rounded shadow-sm">
        <?= $this->include('partials/messages'); ?>

        <!-- Display Validation Errors -->
        <?php if (isset($validation) && !empty($validation)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($validation as $error): ?>
                        <li><?= esc($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Form for Editing Procurement Plan -->
        <form action="<?= base_url('/tenders/proc_plans_edit/' . $procurement_plan['id']) ?>" method="post">
            <?= csrf_field(); ?>

            <div class="form-group mb-3">
                <label for="type_of_procurement_plan">Type of Procurement Plan</label>
                <select id="type_of_procurement_plan" name="type_of_procurement_plan" class="form-control" required>
                    <option value="">Select Type of Procurement Plan</option>
                    <option value="Capital" <?= old('type_of_procurement_plan', $procurement_plan['type_of_procurement_plan']) == 'Capital' ? 'selected' : ''; ?>>Capital</option>
                    <option value="Recurrent" <?= old('type_of_procurement_plan', $procurement_plan['type_of_procurement_plan']) == 'Recurrent' ? 'selected' : ''; ?>>Recurrent</option>
                    <option value="Multi year" <?= old('type_of_procurement_plan', $procurement_plan['type_of_procurement_plan']) == 'Multi year' ? 'selected' : ''; ?>>Multi Year</option>
                    <option value="Inventory" <?= old('type_of_procurement_plan', $procurement_plan['type_of_procurement_plan']) == 'Inventory' ? 'selected' : ''; ?>>Inventory</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="goods_desc">Goods Description</label>
                <textarea class="form-control" id="goods_desc" name="goods_desc" required><?= old('goods_desc', $procurement_plan['goods_desc']); ?></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="units">Units</label>
                <select id="units" name="units" class="form-control" required>
                    <option value="">Select Unit</option>
                    <option value="EA" <?= old('units', $procurement_plan['units']) == 'EA' ? 'selected' : ''; ?>>EA</option>
                    <option value="LS" <?= old('units', $procurement_plan['units']) == 'LS' ? 'selected' : ''; ?>>LS</option>
                    <option value="LOT" <?= old('units', $procurement_plan['units']) == 'LOT' ? 'selected' : ''; ?>>LOT</option>
                    <option value="PAC" <?= old('units', $procurement_plan['units']) == 'PAC' ? 'selected' : ''; ?>>PAC</option>
                    <option value="NO" <?= old('units', $procurement_plan['units']) == 'NO' ? 'selected' : ''; ?>>NO</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="<?= old('quantity', $procurement_plan['quantity']); ?>" required>
            </div>

            <div class="form-group mb-3">
                <label for="pro_methods">Procurement Methods</label>
                <select id="pro_methods" name="pro_methods" class="form-control" required>
                    <option value="">Select Procurement Method</option>
                    <option value="OPEN(NATIONAL)" <?= old('pro_methods', $procurement_plan['pro_methods']) == 'OPEN(NATIONAL)' ? 'selected' : ''; ?>>OPEN (NATIONAL)</option>
                    <option value="OPEN(INTERNATIONAL)" <?= old('pro_methods', $procurement_plan['pro_methods']) == 'OPEN(INTERNATIONAL)' ? 'selected' : ''; ?>>OPEN (INTERNATIONAL)</option>
                    <option value="RESTRICTED" <?= old('pro_methods', $procurement_plan['pro_methods']) == 'RESTRICTED' ? 'selected' : ''; ?>>RESTRICTED</option>
                    <option value="RFQ" <?= old('pro_methods', $procurement_plan['pro_methods']) == 'RFQ' ? 'selected' : ''; ?>>RFQ</option>
                    <option value="FRAMEWORK" <?= old('pro_methods', $procurement_plan['pro_methods']) == 'FRAMEWORK' ? 'selected' : ''; ?>>FRAMEWORK</option>
                    <option value="DIRECT" <?= old('pro_methods', $procurement_plan['pro_methods']) == 'DIRECT' ? 'selected' : ''; ?>>DIRECT</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="agpo_category">AGPO Category</label>
                <select id="agpo_category" name="agpo_category" class="form-control" required>
                    <option value="">Select AGPO Category</option>
                    <option value="ALL" <?= old('agpo_category', $procurement_plan['agpo_category']) == 'ALL' ? 'selected' : ''; ?>>ALL</option>
                    <option value="WOMEN" <?= old('agpo_category', $procurement_plan['agpo_category']) == 'WOMEN' ? 'selected' : ''; ?>>WOMEN</option>
                    <option value="YOUTH" <?= old('agpo_category', $procurement_plan['agpo_category']) == 'YOUTH' ? 'selected' : ''; ?>>YOUTH</option>
                    <option value="PWD" <?= old('agpo_category', $procurement_plan['agpo_category']) == 'PWD' ? 'selected' : ''; ?>>PWD</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="section">Section</label>
                <select id="section" name="section" class="form-control" required>
                    <option value="">Select Section</option>
                    <option value="Admin" <?= old('section', $procurement_plan['section']) == 'Admin' ? 'selected' : ''; ?>>Admin</option>
                    <option value="Civil Engineering & Building" <?= old('section', $procurement_plan['section']) == 'Civil Engineering & Building' ? 'selected' : ''; ?>>Civil Engineering & Building</option>
                    <option value="Clinic" <?= old('section', $procurement_plan['section']) == 'Clinic' ? 'selected' : ''; ?>>Clinic</option>
                    <option value="Corporate Communication" <?= old('section', $procurement_plan['section']) == 'Corporate Communication' ? 'selected' : ''; ?>>Corporate Communication</option>
                    <option value="Electrical" <?= old('section', $procurement_plan['section']) == 'Electrical' ? 'selected' : ''; ?>>Electrical</option>
                    <option value="Fleet Maintenance" <?= old('section', $procurement_plan['section']) == 'Fleet Maintenance' ? 'selected' : ''; ?>>Fleet Maintenance</option>
                    <option value="Health Safe & Environment" <?= old('section', $procurement_plan['section']) == 'Health Safe & Environment' ? 'selected' : ''; ?>>Health Safe & Environment</option>
                    <option value="Information Communication & Technology" <?= old('section', $procurement_plan['section']) == 'Information Communication & Technology' ? 'selected' : ''; ?>>Information Communication & Technology</option>
                    <option value="Instrumentation & Control" <?= old('section', $procurement_plan['section']) == 'Instrumentation & Control' ? 'selected' : ''; ?>>Instrumentation & Control</option>
                    <option value="Internal Audit" <?= old('section', $procurement_plan['section']) == 'Internal Audit' ? 'selected' : ''; ?>>Internal Audit</option>
                    <option value="KPRL" <?= old('section', $procurement_plan['section']) == 'KPRL' ? 'selected' : ''; ?>>KPRL</option>
                    <option value="Mechanical" <?= old('section', $procurement_plan['section']) == 'Mechanical' ? 'selected' : ''; ?>>Mechanical</option>
                    <option value="MTCC" <?= old('section', $procurement_plan['section']) == 'MTCC' ? 'selected' : ''; ?>>MTCC</option>
                    <option value="MIOG" <?= old('section', $procurement_plan['section']) == 'MIOG' ? 'selected' : ''; ?>>MIOG</option>
                    <option value="Procurement" <?= old('section', $procurement_plan['section']) == 'Procurement' ? 'selected' : ''; ?>>Procurement</option>
                    <option value="Projects" <?= old('section', $procurement_plan['section']) == 'Projects' ? 'selected' : ''; ?>>Projects</option>
                    <option value="Quality Control" <?= old('section', $procurement_plan['section']) == 'Quality Control' ? 'selected' : ''; ?>>Quality Control</option>
                    <option value="Right of Way" <?= old('section', $procurement_plan['section']) == 'Right of Way' ? 'selected' : ''; ?>>Right of Way</option>
                </select>
            </div>

            <input type="hidden" name="updated_by" value="<?= session()->get('user_id'); ?>">
            <input type="hidden" name="id" value="<?= esc($procurement_plan['id']); ?>">

            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
