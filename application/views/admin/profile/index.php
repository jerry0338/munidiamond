  <div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/'); ?>">Home</a>
              </li>
              <li class="breadcrumb-item active">Profile
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
                      <h4 class="card-title" id="horz-layout-colored-controls"><?= $admin['username']; ?> Profile Details</h4>
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

                            <?php echo form_open(base_url('admin/profile'), 'class="form form-horizontal"' )?> 
                              <div class="form-body">
                                <h4 class="form-section"><i class="fa fa-eye"></i> Basic Details</h4>
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-md-3 label-control" for="firstname">Fist Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control border-info" name="firstname" id="firstname" placeholder="First Name" value="<?= $admin['firstname']; ?>">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-md-3 label-control" for="lastname">Last Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control border-info" name="lastname" id="lastname" placeholder="Last Name" value="<?= $admin['lastname']; ?>">
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-md-3 label-control" for="dob">Date of Birth</label>
                                      <div class="col-md-9">
                                          <input type="date" class="form-control border-info" id="dob" name="dob" value="<?= $admin['dob']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-md-3 label-control" for="blood_group">Blood Group</label>
                                      <div class="col-md-9">
                                        <select class="form-control border-info" id="blood_group" name="blood_group">
                                          <option value="">Select Blood Group</option>
                                          <option value="O+">O+</option>
                                          <option value="O-">O-</option>
                                          <option value="A+">A+</option>
                                          <option value="A-">A-</option>
                                          <option value="B+">B+</option>
                                          <option value="B-">B-</option>
                                          <option value="AB+">AB+</option>
                                          <option value="AB-">AB-</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">                                  
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-md-3 label-control" for="marital_status">Marital Status</label>
                                      <div class="col-md-9">
                                        <select id="projectinput6" name="marital_status" id="marital_status" class="form-control border-info">
                                          <option value="">Select Marital Status</option>
                                          <option value="single">Single</option>
                                          <option value="married">Married</option>
                                          <option value="widowed">Widowed</option>
                                          <option value="separated">Separated</option>
                                          <option value="divorced">Divorced</option>
                                          </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-md-3 label-control" for="profile_pic">Profile Pic</label>
                                      <div class="col-md-6">
                                        <input type="file" class="form-control border-info" id="profile_pic" name="profile_pic">
                                      </div>
                                      <div class="col-md-3">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <h4 class="form-section"><i class="ft-mail"></i> Contact Info & Bio</h4>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-md-3 label-control" for="email">Email</label>
                                      <div class="col-md-9">
                                        <input type="email" class="form-control border-info" id="email" name="email" placeholder="email" value="<?= $admin['email']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row"> 
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-md-3 label-control" for="mobile_no">Contact Number</label>
                                      <div class="col-md-9">
                                        <input type="tel" class="form-control border-info" id="mobile_no" name="mobile_no" placeholder="Contact Number" value="<?= $admin['mobile_no']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">    
                                    <div class="form-group row">
                                      <label class="col-md-3 label-control" for="alt_mobileno">Alt-Contact Number</label>
                                      <div class="col-md-9">
                                        <input type="tel" class="form-control border-info" id="alt_mobileno" name="alt_mobileno" placeholder="Contact Number" value="<?= $admin['alt_mobileno']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <h4 class="form-section"><i class="ft-home"></i> Address Proof</h4>
                                <div class="row"> 
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-md-3 label-control" for="permanent_address">Permanent Address</label>
                                      <div class="col-md-9">
                                        <textarea rows="5" class="form-control border-info" name="permanent_address" id="permanent_address" placeholder="Enter Permanent Address"><?= $admin['permanent_address']; ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">    
                                    <div class="form-group row">
                                      <label class="col-md-3 label-control" for="residential_address">Residential Address</label>
                                      <div class="col-md-9">
                                        <textarea rows="5" class="form-control border-info" name="residential_address" id="residential_address" placeholder="Enter Residential Address"><?= $admin['residential_address']; ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <h4 class="form-section"><i class="ft-user"></i> Emergency Contact</h4>
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-md-3 label-control" for="emerg_name">Emergency Name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="emerg_name" class="form-control border-info" placeholder="Emergency Name" name="emerg_name" value="<?= $admin['emerg_name']; ?>">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-md-3 label-control" for="emerg_relation">Emergency Realtion</label>
                                        <div class="col-md-9">
                                          <select name="emerg_relation" id="emerg_relation" class="form-control border-info">
                                            <option value="">Select Emergency Realtion</option>
                                            <option value="parent">Parent</option>
                                            <option value="child">Child</option>
                                            <option value="spouse">Spouse</option>
                                            <option value="sibling">Sibling</option>
                                            <option value="parent's sibling">Parent's Sibling</option>
                                            <option value="sibling's child">Sibling's Child</option>
                                            <option value="aunt's/uncle's child">Aunt's/Uncle's Child</option>
                                            <option value="other">Other</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-md-3 label-control" for="emerg_mobileno">Emergency Moblie No</label>
                                      <div class="col-md-9">
                                          <input type="text" id="emerg_mobileno" class="form-control border-info" placeholder="Emergency Mobile No" name="emerg_mobileno" value="<?= $admin['emerg_mobileno']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-md-3 label-control" for="emerg_address">Emergency Address</label>
                                      <div class="col-md-9">
                                       <textarea rows="5" class="form-control border-info" name="emerg_address" id="emerg_address" placeholder="Enter Emergency Address"><?= $admin['emerg_address']; ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-actions right">
                                  <button type="button" class="btn btn-warning btn-glow mr-1"><i class="ft-x"></i> Cancel</button>
                                  <input type="submit" name="submit" value="Update Profile" class="btn btn-info btn-glow">
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