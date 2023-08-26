<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola User</h1>
</div>

<div class="row">
    <div class="col-12">
        <a href="<?= base_url('user/new'); ?>" class="btn btn-primary btn-sm mb-2">Tambah</a>
        <div class="card">
            <div class="card-body">
                <table class="table w-100" id="table2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $a = 1;
                        foreach ($user as $d) : ?>
                            <tr>
                                <td><?= $a++; ?></td>
                                <td><?= $d['username']; ?></td>
                                <td><?= $d['nama_lengkap']; ?></td>
                                <td><?= $d['nama_role']; ?></td>
                                <td>
                                    <a class="btn btn-warning btn-sm mb-2" href="<?= base_url('user/' . $d['id'] . '/edit'); ?>">Edit</a>
                                    <a class="btn btn-danger btn-sm mb-2 del-tombol" href="<?= base_url('user/' . $d['id'] . '/delete'); ?>">Delete</a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>