<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ganti Pass</h1>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                Ganti Password
            </div>
            <div class="card-body">
                <form action="<?= base_url('gantipass'); ?>" method="post">
                    <div class="form-group">
                        <label for="password_lama">Password Lama</label>
                        <input type="password" class="form-control" id="password_lama" name="password_lama" required placeholder="Password Lama">
                    </div>
                    <div class="form-group">
                        <label for="password_baru">Password Baru</label>
                        <input type="password" class="form-control" id="password_baru" name="password_baru" required placeholder="Password Baru">
                    </div>
                    <div class="form-group">
                        <label for="password_retype">Password Retype</label>
                        <input type="password" class="form-control" id="password_retype" name="password_retype" required placeholder="Password Retype">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>