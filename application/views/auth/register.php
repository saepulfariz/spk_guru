<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-6 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Register GURU!</h1>
                </div>
                <form class="user" action="<?= base_url(); ?>auth/proses_register" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="username" placeholder="Enter Username..." value="<?php echo set_value('username'); ?>">
                    <?= form_error('username', '<div class="ml-2 text-danger">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="nama_lengkap" placeholder="Enter Nama Lengkap..." value="<?php echo set_value('nama_lengkap'); ?>">
                    <?= form_error('nama_lengkap', '<div class="ml-2 text-danger">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    <?= form_error('password', '<div class="ml-2 text-danger">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password_confirm" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password Confirm">
                    <?= form_error('password_confirm', '<div class="ml-2 text-danger">', '</div>'); ?>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                  <hr>
                  <div class="text-center">
                    <a class="" href="<?= base_url('auth'); ?>">Login account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>