<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola <?= $title; ?></h1>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                Verifikasi
            </div>
            <div class="card-body">
                <form action="<?= base_url($link . '/' . $data['id']); ?>/verifikasi" method="post">
                    <input type='hidden' name='_method' value='PUT' />

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" disabled value="<?= $data['nama']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" required class="form-control">
                            <?php foreach ($status as $d) : ?>
                                <?php if ($d == $data['status']) : ?>
                                    <option selected value="<?= $d; ?>"><?= $d; ?></option>
                                <?php else : ?>
                                    <option value="<?= $d; ?>"><?= $d; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea type="text" class="form-control" id="catatan" name="catatan" placeholder="catatan"><?= $data['catatan']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url($link); ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>