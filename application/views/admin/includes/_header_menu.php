<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?> 
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
  <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <?php 
          $menu = get_sidebar_menu(); 
          foreach ($menu as $nav):
            $sub_menu = get_sidebar_sub_menu($nav['module_id']);
            $has_submenu = (count($sub_menu) > 0) ? true : false;
            if($this->rbac->check_module_permission($nav['controller_name'])): ?> 

            <li id="<?= ($nav['controller_name']) ?>" class="nav-item <?= ($has_submenu) ? 'dropdown' : '' ?>" data-menu="<?= ($has_submenu) ? 'dropdown' : '' ?>"><a class="<?= ($has_submenu) ? 'dropdown-toggle' : '' ?> nav-link" href="<?= base_url('admin/'.$nav['controller_name']) ?>" data-toggle="<?= ($has_submenu) ? 'dropdown' : '' ?>"><i class="icon-<?= $nav['icon'] ?>"></i><span><?= trans($nav['module_name']) ?></span></a>

              <!-- sub-menu -->
              <?php if($has_submenu): ?>
              <ul class="dropdown-menu">
                <?php foreach($sub_menu as $sub_nav): ?>
                <li data-menu=""><a class="dropdown-item" href="<?= base_url('admin/'.$nav['controller_name'].'/'.$sub_nav['link']); ?>" data-toggle="dropdown"><?= trans($sub_nav['name']) ?></a></li>
                <?php endforeach; ?>
              </ul>
              <?php endif; ?>
              <!-- /sub-menu -->
            </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
  </div>
</div>
<script>
  $("#<?= $cur_tab ?>").addClass('active');
</script>