<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola <?= $title; ?></h1>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                New <?= $title; ?>
            </div>
            <div class="card-body">
                <form action="<?= base_url($link); ?>" method="post">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="nik" value="<?= set_value('nik'); ?>">
                    </div>
                    <?= form_error('nik', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?= set_value('nama'); ?>">
                    </div>
                    <?= form_error('nama', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                            <?php foreach ($jk as $d) : ?>
                                <option value="<?= $d; ?>"><?= $d; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?= form_error('jk', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select name="agama" id="agama" class="form-control">
                            <?php foreach ($agama as $d) : ?>
                                <option value="<?= $d; ?>"><?= $d; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?= form_error('agama', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <div class="form-group">
                        <label for="pendidikan">Pendidikan</label>
                        <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="pendidikan" value="<?= set_value('pendidikan'); ?>">
                    </div>
                    <?= form_error('pendidikan', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="tempat">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat" name="tempat" placeholder="tempat" value="<?= set_value('tempat'); ?>">
                            </div>
                            <?= form_error('tempat', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="ttl">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="ttl" name="ttl" placeholder="ttl" value="<?= set_value('ttl'); ?>">
                            </div>
                            <?= form_error('ttl', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="<?= set_value('alamat'); ?>">
                    </div>
                    <?= form_error('alamat', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>