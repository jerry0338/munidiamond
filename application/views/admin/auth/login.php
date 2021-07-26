<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/forms/icheck/icheck.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/forms/icheck/custom.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/pages/login-register.min.css">
<!-- ////////////////////////////////////////////////////////////////////////////--->
<div class="app-content container center-layout mt-2">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-md-4 col-10 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header border-0">
                            <div class="card-title text-center">
                                <div class="p-1"><img class="img-lg" src="<?= base_url()?>assets/images/logo/<?= $this->general_settings['logo']; ?>" alt="mn logo"></div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Login with Muni Diamond</span></h6>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <?php $this->load->view('admin/includes/_messages.php') ?>
        
                                  <?php echo form_open(base_url('admin/auth/login'), 'class="form-horizontal form-simple" '); ?>
                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                        <input type="text" class="form-control form-control-lg input-lg" name="username" placeholder="Your Username" value="<?=  (isset($username)) ? $username : '' ?>" required>
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" class="form-control form-control-lg input-lg" name="password" placeholder="Enter Password" value="<?=  (isset($password)) ? $password : '' ?>" required>
                                        <div class="form-control-position">
                                            <i class="fa fa-key"></i>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-12 text-center text-md-left">
                                            <fieldset>
                                                <input type="checkbox" name="remember_me" id="remember_me" class="chk-remember" >
                                                <label for="remember_me"> Remember Me</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" value="Login" class="btn btn-info btn-glow btn-block">
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="">
                                <p class="float-sm-right text-center m-0"><a href="<?= base_url('admin/auth/forgot_password'); ?>" class="card-link">Recover password</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
  </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
          