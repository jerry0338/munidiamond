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
                                  <img class="img-lg" src="<?= base_url()?>assets/images/logo/<?= $this->general_settings['logo']; ?>" alt="mn logo">
                              </div>
                              <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>We will send you a link to reset password.</span></h6>
                          </div>
                          <div class="card-content">
                              <div class="card-body">
                                    <?php $this->load->view('admin/includes/_messages.php') ?>
                                    <?php echo form_open(base_url('admin/auth/forgot_password'), 'class="login-form" '); ?>
                                      <fieldset class="form-group position-relative has-icon-left">
                                          <input type="email" class="form-control form-control-lg input-lg" name="email" placeholder="Your Email Address" required>
                                          <div class="form-control-position">
                                              <i class="ft-mail"></i>
                                          </div>
                                      </fieldset>
                                      <input type="submit" class="btn btn-outline-info box-shadow-3 btn-block" value="Recover Password" name="submit">
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
          





