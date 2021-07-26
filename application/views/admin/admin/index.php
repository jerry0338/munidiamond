<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/tables/datatable/datatables.min.css">
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
                     <li class="breadcrumb-item"><a href="#">Settings</a>
                     </li>
                     <li class="breadcrumb-item active">Admin List
                     </li>
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <div class="content-body">
         <!-- Base style - compact table -->
         <section id="compact-style">
            <div class="row">
               <div class="col-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Admin List</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                           <ul class="list-inline mb-0">
                              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                           <table class="table table-striped table-bordered compact" id="adminList">
                              <thead>
                                 <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                 </tr>
                              </thead>
                              <tfoot>
                                 <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                 </tr>
                              </tfoot>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Base style - compact table -->
      </div>
   </div>
</div>

<script>
   var adminList = "<?php echo site_url("admin/admin/adminList") ?>";
   var csrfName = "<?= $this->security->get_csrf_token_name(); ?>"; // Value specified in $config['csrf_token_name']
   var csrfHash = "<?= $this->security->get_csrf_hash(); ?>"; // CSRF hash
</script>
<script src="<?= base_url() ?>assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?= base_url()?>assets/js/scripts/pages/admin.min.js"></script>
<!-- DataTables -->

<!-- <script>
   //------------------------------------------------------------------
   function filter_data()
   {
   $('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');
   $.post('<?=base_url('admin/admin/filterdata')?>',$('.filterdata').serialize(),function(){
    $('.data_container').load('<?=base_url('admin/admin/list_data')?>');
   });
   }
   //------------------------------------------------------------------
   function load_records()
   {
   $('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');
   $('.data_container').load('<?=base_url('admin/admin/list_data')?>');
   }
   load_records();
   
   //---------------------------------------------------------------------
   $("body").on("change",".tgl_checkbox",function(){
   $.post('<?=base_url("admin/admin/change_status")?>',
   {
       '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
    id : $(this).data('id'),
    status : $(this).is(':checked')==true?1:0
   },
   function(data){
    $.notify("Status Changed Successfully", "success");
   });
   });
   </script> -->