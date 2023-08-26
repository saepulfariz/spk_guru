<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola User</h1>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                Edit User
            </div>
            <div class="card-body">
                <form action="<?= base_url('user/' . $user['id']); ?>" method="post">
                    <input type='hidden' name='_method' value='PUT' />
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" disabled placeholder="Username" value="<?= $user['username']; ?>">
                    </div>
                    <?= form_error('username', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <?= form_error('password', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" required placeholder="nama_lengkap">
                    </div>
                    <?= form_error('nama_lengkap', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <div class="form-group">
                        <label for="email">Role</label>
                        <select name="id_role" id="id_role" required class="form-control">
                            <?php foreach ($role as $d) : ?>
                                <?php if ($d['id'] == $user['id_role']) : ?>
                                    <option selected value="<?= $d['id']; ?>"><?= $d['nama_role']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $d['id']; ?>"><?= $d['nama_role']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url('user'); ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>