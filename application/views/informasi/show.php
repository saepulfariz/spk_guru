<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Detail <?= $title; ?></h1>
</div>

<?php

$model_alternatif = new AlternatifModel();
$model_sub_alternatif = new SubAlternatifModel();
$model_bobot_alternatif = new BobotAlternatifModel();

?>

<div class="row mb-4">
  <div class="col-12">
    <div class="card">
      <div class="card-header font-weight-bold">
        Hasil Analisa
      </div>
      <div class="card-body table-responsive">
        <table class="table w-100 mb-4">
          <thead>
            <tr>
              <th>#</th>
              <?php foreach ($alternatif as $d) : ?>
                <th><?= $d['nama_alternatif']; ?></th>
              <?php endforeach; ?>
            </tr>
          </thead>
          <tbody>
            <?php $a = 1;
            foreach ($data as $d) : ?>
              <tr>
                <td class="text-uppercase"><?= $d['nama']; ?></td>
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
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>


      </div>
    </div>
  </div>
</div>


<div class="row mb-4">
  <div class="col">
    <div class="card">
      <div class="card-header font-weight-bold">
        Hasil Analisa
      </div>
      <div class="card-body table-responsive">
        <table class="table w-100 mb-4">
          <thead>
            <tr>
              <th>#</th>
              <?php foreach ($alternatif as $d) : ?>
                <th><?= $d['kode']; ?></th>
              <?php endforeach; ?>
            </tr>
          </thead>
          <tbody>
            <?php $a = 1;
            foreach ($data as $d) : ?>
              <tr>
                <td class="font-weight-bold"><?= $d['nik']; ?></td>
                <?php foreach ($alternatif as $dal) : ?>
                  <?php
                  $dt = $model_bobot_alternatif->whereAlternatif($d['id_guru'], $dal['id']);
                  $nama_sub = '';
                  if ($dt) {
                    $id_sub_alternatif = $dt['id_sub_alternatif'];
                    $nama_sub = $model_sub_alternatif->find($id_sub_alternatif);
                  }
                  ?>
                  <td><?= ($nama_sub['nilai']);  ?></td>
                <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="row mb-4">
  <div class="col">
    <div class="card">
      <div class="card-header font-weight-bold">
        Normalisasi
      </div>
      <div class="card-body table-responsive">
        <table class="table w-100 mb-4">
          <thead>
            <tr>
              <th>#</th>
              <?php foreach ($alternatif as $d) : ?>
                <th><?= $d['kode']; ?></th>
              <?php endforeach; ?>
            </tr>
          </thead>
          <tbody>
            <?php $a = 1;
            foreach ($data as $d) : ?>
              <tr>
                <td class="font-weight-bold"><?= $d['nik']; ?></td>
                <?php foreach ($alternatif as $dal) : ?>
                  <?php
                  $dt = $model_bobot_alternatif->whereAlternatif($d['id_guru'], $dal['id']);
                  $nama_sub = '';
                  if ($dt) {
                    $id_sub_alternatif = $dt['id_sub_alternatif'];
                    $nama_sub = $model_sub_alternatif->find($id_sub_alternatif);
                  }
                  ?>
                  <td><?= ($nama_sub['nilai'] / 100);  ?></td>
                <?php endforeach; ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="row mb-4">
  <div class="col">
    <div class="card">
      <div class="card-header font-weight-bold">
        Hasil
      </div>
      <div class="card-body table-responsive">
        <table class="table w-100 mb-4">
          <thead>
            <tr>
              <th></th>
              <?php foreach ($alternatif as $d) : ?>
                <th><?= $d['kode']; ?></th>
              <?php endforeach; ?>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="font-weight-bold">BOBOT</td>
              <?php foreach ($alternatif as $dal) : ?>
                <td class="text-primary"><?= $dal['bobot'];  ?></td>
              <?php endforeach; ?>
              <td></td>
            </tr>
            <?php $a = 1;
            foreach ($data as $d) : ?>
              <tr>
                <td class="font-weight-bold text-uppercase"><?= $d['nama']; ?></td>
                <?php $total = 0; ?>
                <?php foreach ($alternatif as $dal) : ?>
                  <?php
                  $dt = $model_bobot_alternatif->whereAlternatif($d['id_guru'], $dal['id']);
                  $nama_sub = '';
                  if ($dt) {
                    $id_sub_alternatif = $dt['id_sub_alternatif'];
                    $nama_sub = $model_sub_alternatif->find($id_sub_alternatif);
                  }
                  ?>
                  <?php $res = ($nama_sub['nilai'] / 100) * $dal['bobot'];
                  $total += $res; ?>
                  <td><?= $res;  ?></td>
                <?php endforeach; ?>
                <th class="text-primary"><?= $total; ?></th>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-5">
    <div class="card">
      <div class="card-header">
        Status
      </div>
      <div class="card-body">
        <form action="<?= base_url($link . '/' . $data[0]['id_guru']); ?>" method="post">
          <input type='hidden' name='_method' value='PUT' />
          <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" readonly value="<?= $data[0]['status']; ?>">
          </div>
          <a href="<?= base_url($link); ?>" class="btn btn-secondary">Back</a>
        </form>
      </div>
    </div>
  </div>
</div>