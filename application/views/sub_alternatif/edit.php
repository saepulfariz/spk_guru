<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola <?= $title; ?></h1>
</div>
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
                        <label for="id_alternatif">Alternatif</label>
                        <select name="id_alternatif" id="id_alternatif" required class="form-control">
                            <?php foreach ($alternatif as $d) : ?>
                                <?php if ($d['id'] == $data['id_alternatif']) : ?>
                                    <option selected value="<?= $d['id']; ?>"><?= $d['kode']; ?> <?= $d['nama_alternatif']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $d['id']; ?>"><?= $d['kode']; ?> <?= $d['nama_alternatif']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?= form_error('id_alternatif', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <div class="form-group">
                        <label for="keterangan">keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" value="<?= $data['keterangan']; ?>">
                    </div>
                    <?= form_error('keterangan', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>

                    <div class="form-group">
                        <label for="nilai">nilai</label>
                        <input type="text" class="form-control" id="nilai" name="nilai" placeholder="nilai" value="<?= $data['nilai']; ?>">
                    </div>
                    <?= form_error('nilai', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>