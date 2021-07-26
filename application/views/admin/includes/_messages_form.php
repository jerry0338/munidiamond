<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <!--print error messages-->
<?php if ($this->session->flashdata('errors_form')): ?>
    <div class="alert alert-danger alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <?php echo $this->session->flashdata('errors_form'); ?>
    </div>
<?php endif; ?>


    <!--print custom success message-->
<?php if ($this->session->flashdata('success_form')): ?>
    <div class="alert alert-success alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <?php echo $this->session->flashdata('success_form'); ?>
    </div>
<?php endif; ?>






                        