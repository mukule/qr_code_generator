<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>

<div class="container p-0 mt-2">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Users</h2>
        <a href="<?= base_url('/register') ?>" class="btn btn-primary" 
           <?= session()->get('access_lvl') != 1 ? 'disabled' : '' ?>>
            <i class="fas fa-plus"></i> Add User
        </a>
    </div>
    <hr>
    <?= $this->include('partials/messages'); ?>
    <div class="content bg-white p-3 rounded shadow-sm">
        <?php if (empty($users)): ?>
            <p class="text-center">No staff members found.</p>
        <?php else: ?>
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Access Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['id']); ?></td>
                        <td><?= esc($user['username']); ?></td>
                        <td><?= esc($user['full_name']); ?></td>
                        <td><?= esc($user['email']); ?></td>
                        <td>
                            <?php
                            switch ($user['access_lvl']) {
                                case 1:
                                    echo 'Admin';
                                    break;
                                case 2:
                                    echo 'Staff';
                                    break;
                                default:
                                    echo 'N/A';
                                    break;
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?= base_url('/updateStaffStatus/' . $user['id']); ?>" class="btn btn-sm <?= $user['active'] ? 'btn-primary' : 'btn-secondary'; ?>" 
                               <?= session()->get('access_lvl') != 1 ? 'disabled' : '' ?>>
                                <?= $user['active'] ? 'Deactivate' : 'Activate'; ?>
                            </a>
                            <a href="<?= base_url('/editStaff/' . $user['id']); ?>" class="btn btn-sm btn-secondary" 
                               <?= session()->get('access_lvl') != 1 ? 'disabled' : '' ?>>
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection(); ?>
