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
        <form action="<?= base_url($link . '/' . $data['id']); ?>" method="post" enctype="multipart/form-data">
          <input type='hidden' name='_method' value='PUT' />
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" placeholder="nik" value="<?= $data['nik']; ?>">
          </div>
          <?= form_error('nik', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?= $data['nama']; ?>">
          </div>
          <?= form_error('nama', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>

          <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control">
              <?php foreach ($jk as $d) : ?>
                <?php if ($data['jk'] == $d) : ?>
                  <option selected value="<?= $d; ?>"><?= $d; ?></option>
                <?php else : ?>
                  <option value="<?= $d; ?>"><?= $d; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
          <?= form_error('jk', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>

          <div class="form-group">
            <label for="agama">Agama</label>
            <select name="agama" id="agama" class="form-control">
              <?php foreach ($agama as $d) : ?>
                <?php if ($data['agama'] == $d) : ?>
                  <option selected value="<?= $d; ?>"><?= $d; ?></option>
                <?php else : ?>
                  <option value="<?= $d; ?>"><?= $d; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
          <?= form_error('agama', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>

          <div class="form-group">
            <label for="pendidikan">Pendidikan</label>
            <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="pendidikan" value="<?= $data['pendidikan']; ?>">
          </div>
          <?= form_error('pendidikan', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>

          <div class="row">
            <div class="col-md-6 mb-2">
              <div class="form-group">
                <label for="tempat">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat" name="tempat" placeholder="tempat" value="<?= explode(',', $data['ttl'])[0]; ?>">
              </div>
              <?= form_error('tempat', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
            </div>
            <div class="col-md-6 mb-2">
              <div class="form-group">
                <label for="ttl">Tanggal Lahir</label>
                <input type="date" class="form-control" id="ttl" name="ttl" placeholder="ttl" value="<?= date('Y-m-d', strtotime(explode(',', $data['ttl'])[1])); ?>">
              </div>
              <?= form_error('ttl', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="alamat">alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="<?= $data['alamat']; ?>">
          </div>
          <?= form_error('alamat', '<div class="ml-2 text-danger mb-2" style="margin-top: -15px">', '</div>'); ?>
          <div class="form-group">
            <label for="lampiran_ijazah">Lampiran Ijazah <a target="_blank" href="<?= base_url(); ?>assets/uploads/lampiran/<?= $data['lampiran_ijazah']; ?>">Lihat </a></label>
            <input type="file" class="form-control" id="lampiran_ijazah" name="lampiran_ijazah" placeholder="lampiran_ijazah">
          </div>

          <div class="form-group">
            <label for="lampiran_ktp">Lampiran KTP <a target="_blank" href="<?= base_url(); ?>assets/uploads/lampiran/<?= $data['lampiran_ktp']; ?>">Lihat </a></label>
            <input type="file" class="form-control" id="lampiran_ktp" name="lampiran_ktp" placeholder="lampiran_ktp">
          </div>

          <div class="form-group">
            <label for="lampiran_sertifikat">Lampiran Sertifikat <a target="_blank" href="<?= base_url(); ?>assets/uploads/lampiran/<?= $data['lampiran_sertifikat']; ?>">Lihat </a></label>
            <input type="file" class="form-control" id="lampiran_sertifikat" name="lampiran_sertifikat" placeholder="lampiran_sertifikat">
          </div>

          <div class="form-group">
            <label for="lampiran_pengalaman">Lampiran Pengalaman Kerja <a target="_blank" href="<?= base_url(); ?>assets/uploads/lampiran/<?= $data['lampiran_pengalaman']; ?>">Lihat </a></label>
            <input type="file" class="form-control" id="lampiran_pengalaman" name="lampiran_pengalaman" placeholder="lampiran_pengalaman">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>