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
                        <label for="kode">kode</label>
                        <input type="text" class="form-control" id="kode" name="kode" placeholder="kode" value="<?= $data['kode']; ?>">
                    </div>
                    <?= form_error('kode', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <div class="form-group">
                        <label for="nama_alternatif">Nama Alternatif</label>
                        <input type="text" class="form-control" id="nama_alternatif" name="nama_alternatif" placeholder="nama_alternatif" value="<?= $data['nama_alternatif']; ?>">
                    </div>
                    <?= form_error('nama_alternatif', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>

                    <div class="form-group">
                        <label for="attribute">Attribute</label>
                        <input type="text" class="form-control" id="attribute" name="attribute" placeholder="attribute" value="<?= $data['attribute']; ?>">
                    </div>
                    <?= form_error('attribute', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>

                    <div class="form-group">
                        <label for="bobot">Bobot</label>
                        <input type="text" class="form-control" id="bobot" name="bobot" placeholder="bobot" value="<?= $data['bobot']; ?>">
                    </div>
                    <?= form_error('bobot', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>