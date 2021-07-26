<div class="form-background"> 

  <div class="login-box">

    <div class="login-logo">

      <h2><a href="<?= base_url('admin'); ?>"><?= $this->general_settings['application_name']; ?></a></h2>

    </div>

    <!-- /.login-logo -->

    <div class="card">

      <div class="card-body login-card-body">

        <p class="login-box-msg"><?= trans('reset_password') ?></p>



        <?php $this->load->view('admin/includes/_messages.php') ?>

        

         <?php echo form_open(base_url('admin/auth/reset_password/'.$reset_code), 'class="login-form" '); ?>

          <div class="form-group has-feedback">

            <input type="password" name="password" id="password" class="form-control" placeholder="<?= trans('password') ?>" >

          </div>

          <div class="form-group has-feedback">

            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="<?= trans('confirm') ?>" >

          </div>

          <div class="row">

            <!-- /.col -->

            <div class="col-12">

              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="<?= trans('reset') ?>">

            </div>

            <!-- /.col -->

          </div>

        <?php echo form_close(); ?>



        <p class="mt-3"><a href="<?= base_url('admin/auth/login'); ?>"><?= trans('you_remember_password') ?> </a></p>



      </div>

      <!-- /.login-card-body -->

    </div>

  </div>

  <!-- /.login-box -->

</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content container center-layout mt-2">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
          <section class="flexbox-container">
              <div class="col-12 d-flex align-items-center justify-content-center">
                  <div class="col-md-4 col-10 box-shadow-2 p-0">
                      <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                          <div class="card-header border-0 pb-0">
                              <div class="card-title text-center">
                                  <img class="img-lg" src="<?= base_url()?>assets/images/logo/logo.png" alt="mn logo">
                              </div>
                              <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Reset password.</span></h6>
                          </div>
                          <div class="card-content">
                              <div class="card-body">
                                    <?php $this->load->view('admin/includes/_messages.php') ?>
                                    <?php echo form_open(base_url('admin/auth/reset_password/'.$reset_code), 'class="login-form" '); ?>
                                      <fieldset class="form-group position-relative has-icon-left">
                                          <input type="password" class="form-control form-control-lg input-lg" name="password" placeholder="Enter Password" required>
                                          <div class="form-control-position">
                                              <i class="fa fa-key"></i>
                                          </div>
                                      </fieldset>
                                      <fieldset class="form-group position-relative has-icon-left">
                                          <input type="password" class="form-control form-control-lg input-lg" name="confirm_password" placeholder="Enter Confirm Password" required>
                                          <div class="form-control-position">
                                              <i class="fa fa-key"></i>
                                          </div>
                                      </fieldset>
                                      <input type="submit" class="btn btn-outline-info box-shadow-3 btn-block" value="Reset password" name="submit">
                                  <?php echo form_close(); ?>
                              </div>
                          </div>
                          <div class="card-footer border-0">
                              <p class="float-sm-right text-center">You remember Password ? <a href="<?= base_url('admin/auth/login'); ?>" class="card-link">Login</a></p>
                          </div>
                      </div>
                  </div>
              </div>
          </section>

      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
          







