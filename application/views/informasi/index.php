<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data <?= $title; ?></h1>
</div>

<?php

$model_alternatif = new AlternatifModel();
$model_sub_alternatif = new SubAlternatifModel();
$model_bobot_alternatif = new BobotAlternatifModel();
$model_guru = new GuruModel();



?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if ($this->session->userdata('id_role') == 3) : ?>
                    <?php
                    $data_user = $model_guru->whereUser($this->session->userdata('id_user'));

                    ?>
                    <div class="text-center">
                        <?php if ($data_user['status'] == 'PROGRESS') : ?>
                            <h3>Status Terakhir : <?= $data_user['status']; ?></h3>
                        <?php else : ?>
                            <h3>Status : <?= $data_user['status']; ?></h3>
                            <h4><?= $data_user['catatan']; ?></h4>
                        <?php endif; ?>
                    </div>
                <?php else : ?>

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
                                <th>Dokumen</th>
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
                                        <p>Ijazah : <a target="_blank" href="<?= base_url(); ?>assets/uploads/lampiran/<?= $d['lampiran_ijazah']; ?>">Lihat </a></p>
                                        <p>KTP : <a target="_blank" href="<?= base_url(); ?>assets/uploads/lampiran/<?= $d['lampiran_ktp']; ?>">Lihat </a></p>
                                        <p>Sertifikat : <a target="_blank" href="<?= base_url(); ?>assets/uploads/lampiran/<?= $d['lampiran_sertifikat']; ?>">Lihat </a></p>
                                        <p>Pengalaman : <a target="_blank" href="<?= base_url(); ?>assets/uploads/lampiran/<?= $d['lampiran_pengalaman']; ?>">Lihat </a></p>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm mb-2" href="<?= base_url($link . '/' . $d['id_guru'] . '/verifikasi'); ?>">Verifikasi</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>