<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola User</h1>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                New User
            </div>
            <div class="card-body">
                <form action="<?= base_url('user'); ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                    </div>
                    <?= form_error('username', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <?= form_error('password', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama lengkap" value="<?= set_value('nama_lengkap'); ?>">
                    </div>
                    <?= form_error('nama_lengkap', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <?= form_error('email', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <div class="form-group">
                        <label for="email">Role</label>
                        <select name="id_role" id="id_role" class="form-control">
                            <?php foreach ($role as $d) : ?>
                                <option value="<?= $d['id']; ?>"><?= $d['nama_role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?= form_error('id_role', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url('user'); ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>