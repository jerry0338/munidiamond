<!-- Content Wrapper. Contains page content -->
  <div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/'); ?>">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/profile'); ?>">Profile</a>
              </li>
              <li class="breadcrumb-item active">View Document
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
      <!-- Basic form layout section start -->
          <section id="horizontal-form-layouts">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <h4 class="card-title" id="horz-layout-colored-controls"><?= $admin['username']; ?> Document View</h4>
                      <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                          <!-- For Messages -->

                            <?php echo form_open(base_url('admin/profile/change_password'), 'class="form form-horizontal"' )?> 
                              <div class="form-body">
                                <h4 class="form-section"><i class="fa fa-key"></i> Password Setting</h4>
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-md-3 label-control" for="firstname">Old Password</label>
                                        <div class="col-md-9">
                                            <input type="text" id="firstname" class="form-control border-info" placeholder="First Name" name="firstname" value="<?= $admin['firstname']; ?>">
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-md-3 label-control" for="firstname">New Password</label>
                                        <div class="col-md-9">
                                            <input type="text" id="firstname" class="form-control border-info" placeholder="First Name" name="firstname" value="<?= $admin['firstname']; ?>">
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-md-3 label-control" for="firstname">Confirm Password</label>
                                        <div class="col-md-9">
                                            <input type="text" id="firstname" class="form-control border-info" placeholder="First Name" name="firstname" value="<?= $admin['firstname']; ?>">
                                          </div>
                                      </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-actions right">
                                <div class="row">
                                  <div class="col-md-6">
                                    <input type="submit" name="submit" value="Update Profile" class="btn btn-info btn-glow">
                                  </div>
                                </div>
                              </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </section>
          <!-- // Basic form layout section end -->
    </div>
  </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
