<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola <?= $title; ?></h1>
</div>
<?php

$model_sub_alternatif = new SubAlternatifModel();
$model_bobot_alternatif = new BobotAlternatifModel();

?>
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                Edit <?= $title; ?>
            </div>
            <div class="card-body">
                <form action="<?= base_url($link . '/' . $data['id']); ?>" method="post">
                    <input type='hidden' name='_method' value='PUT' />
                    <div class="form-group">
                        <label for="id_guru">Guru</label>
                        <select name="id_guru" id="id_guru" disabled required class="form-control">
                            <?php foreach ($guru as $d) : ?>
                                <?php if ($d['id'] == $data['id_guru']) : ?>
                                    <option selected value="<?= $d['id']; ?>"><?= $d['nik']; ?> | <?= $d['nama']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $d['id']; ?>"><?= $d['nik']; ?> | <?= $d['nama']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?= form_error('id_guru', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <?php $a = 0;
                    foreach ($alternatif as $d) : ?>
                        <input type="hidden" name="alternatif[<?= $a; ?>]" value="<?= $d['id']; ?>">
                        <div class="form-group">
                            <label for="sub_alternatif"><?= $d['nama_alternatif']; ?></label>
                            <?php

                            $sub_alternatif = $model_sub_alternatif->where('id_alternatif', $d['id'], 'all');
                            $dt = $model_bobot_alternatif->whereAlternatif($data['id_guru'], $d['id']);
                            $id_sub_alternatif = $dt['id_sub_alternatif'];
                            ?>

                            <select name="sub_alternatif[<?= $a; ?>]" id="sub_alternatif" class="form-control">
                                <?php foreach ($sub_alternatif as $ds) : ?>
                                    <?php if ($ds['id'] == $id_sub_alternatif) : ?>
                                        <option selected value="<?= $ds['id']; ?>"><?= $ds['keterangan']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $ds['id']; ?>"><?= $ds['keterangan']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php $a++;
                    endforeach; ?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>