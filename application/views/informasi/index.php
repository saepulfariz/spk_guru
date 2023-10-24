<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data <?= $title; ?></h1>
</div>

<?php

$model_alternatif = new AlternatifModel();
$model_sub_alternatif = new SubAlternatifModel();
$model_bobot_alternatif = new BobotAlternatifModel();

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table w-100" id="table2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <?php foreach ($alternatif as $d) : ?>
                                <th><?= $d['nama_alternatif']; ?></th>
                            <?php endforeach; ?>
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
                                <?php foreach ($alternatif as $dal) : ?>
                                    <?php
                                    $dt = $model_bobot_alternatif->whereAlternatif($d['id_guru'], $dal['id']);
                                    $nama_sub = '';
                                    if ($dt) {
                                        $id_sub_alternatif = $dt['id_sub_alternatif'];
                                        $nama_sub = $model_sub_alternatif->find($id_sub_alternatif);
                                        $nama_sub = $nama_sub['keterangan'];
                                    }
                                    ?>
                                    <td><?= $nama_sub; ?></td>
                                <?php endforeach; ?>
                                <td><?= $d['status']; ?></td>
                                <td>
                                    <a class="btn btn-info btn-sm mb-2" href="<?= base_url($link . '/' . $d['id_guru'] . ''); ?>">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>