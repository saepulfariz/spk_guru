<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola <?= $title; ?></h1>
</div>

<div class="row">
    <div class="col-12">
        <a href="<?= base_url($link . '/new'); ?>" class="btn btn-primary btn-sm mb-2">Tambah</a>
        <div class="card">
            <div class="card-body">
                <table class="table w-100" id="table2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Pendidikan</th>
                            <th>Tempat, Tanggal lahir</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $a = 1;
                        foreach ($data as $d) : ?>
                            <tr>
                                <td><?= $a++; ?></td>
                                <td><?= $d['nik']; ?></td>
                                <td><?= $d['nama']; ?></td>
                                <td><?= $d['jk']; ?></td>
                                <td><?= $d['agama']; ?></td>
                                <td><?= $d['pendidikan']; ?></td>
                                <td><?= $d['ttl']; ?></td>
                                <td><?= $d['alamat']; ?></td>
                                <td><?= $d['status']; ?></td>
                                <td>
                                    <a class="btn btn-info btn-sm mb-2" href="<?= base_url($link . '/' . $d['id'] . '/verifikasi'); ?>">Verifikasi</a>
                                    <a class="btn btn-warning btn-sm mb-2" href="<?= base_url($link . '/' . $d['id'] . '/edit'); ?>">Edit</a>
                                    <a class="btn btn-danger btn-sm mb-2 del-tombol" href="<?= base_url($link . '/' . $d['id'] . '/delete'); ?>">Delete</a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>