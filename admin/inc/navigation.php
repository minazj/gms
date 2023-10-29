
<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
        <!-- Brand Logo -->
        <a href="/gms/admin" class="brand-link bg-gradient-navy text-sm">
        <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 1.5rem;height: 1.5rem;max-height: unset">
        <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix"></div>
                <!-- Sidebar Menu -->
                <!--center>
                  <img src="<?php //echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 10rem;height: 10rem;max-height: unset">
                </center-->
                <nav class="mt-4">
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                    <br>
                    <li class="nav-item dropdown">
                      <span>
                        <img style="margin-right: 100px; margin-left: 95px; opacity: .8;width: 7rem;height: 7rem;max-height: unset" src="<?php echo validate_image($_settings->userdata('avatar')) ?>" class="img-circle elevation-2 user-img" alt="User Image">
                      </span>
                      <br><br><br><br><br>
                       <div style="font-size: 16px; color: #c2c7d0;display: flex; flex-direction: column;align-items: center;">
                         <span  class="ml-3"><?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?></span>
                        
                         <!--style="margin-left: 35px;"-->
                         <a href="/gms/admin/?page=user/list"><span class="fa fa-user"></span> My Account</a>
                       </div>
                    </li>
                    <br>

                    <li style="font-size: 16px; " class="nav-item dropdown">
                      <a href="./" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Main Page
                        </p>
                      </a>
                    </li> 

                    <?php if($_settings->userdata('type') == 1): ?>

                    <!--<li class="nav-item dropdown">
                      <a href="<?php //echo base_url ?>admin/?page=reservations" class="nav-link nav-reservations">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                          Reservation List
                        </p>
                      </a>
                    </li>-->

                    <!-- APPLICATION -->
                    
                    <li style="font-size: 16px; " class="nav-header">Application</li>

                    <li style="font-size: 16px; " class="nav-item dropdown">
                      <a href="/gms/admin/?page=victimApp" class="nav-link nav-victimApp">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                          Victim Application List
                        </p>
                      </a>
                    </li>

                    <li style="font-size: 16px; " class="nav-item dropdown">
                      <a href="/gms/admin/?page=donatorApp" class="nav-link nav-donatorApp">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                          Donator Application List
                        </p>
                      </a>
                    </li>

                    <!-- GOODS-->
                    <li style="font-size: 16px; " class="nav-header">Goods</li>

                   <!-- <li class="nav-item dropdown">
                      <a href="<?php //echo base_url ?>admin/?page=goodsList" class="nav-link nav-goodsList">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                          Goods List
                        </p>
                      </a>
                    </li>-->
                   <!-- <li class="nav-item dropdown">
                      <a href="<?php //echo base_url ?>admin/?page=goods" class="nav-link nav-goods">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                          Goods List
                        </p>
                      </a>-->
                    </li>

                    <li style="font-size: 16px; " class="nav-item dropdown">
                      <a href="/gms/admin/?page=goodsAvailable" class="nav-link nav-goodsAvailable">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                          Goods Available List
                        </p>
                      </a>
                    </li>

                    <li style="font-size: 16px;" class="nav-item dropdown">
                      <a href="/gms/admin/?page=goodsNeeded" class="nav-link nav-goodsNeeded">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                          Goods Needed List
                        </p>
                      </a>
                    </li>

                    <!-- REPORT-->
                    <li style="font-size: 16px; " class="nav-header">Report</li>

                   <!-- <li class="nav-item dropdown">
                      <a href="<?php //echo base_url ?>admin/?page=goodsList" class="nav-link nav-goodsList">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                          Goods List
                        </p>
                      </a>
                    </li>-->
                   <!-- <li class="nav-item dropdown">
                      <a href="<?php //echo base_url ?>admin/?page=goods" class="nav-link nav-goods">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                          Goods List
                        </p>
                      </a>-->
                    </li>

                    <li style="font-size: 16px; " class="nav-item dropdown">
                      <a href="/gms/admin/?page=goodsAvailableReport" class="nav-link nav-goodsAvailableReport">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                          Goods Available Report
                        </p>
                      </a>
                    </li>

                    <li style="font-size: 16px; " class="nav-item dropdown">
                      <a href="/gms/admin/?page=goodsNeededReport" class="nav-link nav-goodsNeededReport">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                          Goods Needed Report
                        </p>
                      </a>
                    </li>

                    <!-- MAINTENANCE -->

                    <li style="font-size: 16px; " class="nav-header">Maintenance</li>

                    <li style="font-size: 16px; " class="nav-item dropdown">
                      <a href="/gms/admin/?page=user" class="nav-link nav-user">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                          User List
                        </p>
                      </a>
                    </li>

                    <!--li class="nav-item dropdown">
                      <a href="<?php //echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                          Settings
                        </p>
                      </a>
                    </li-->
                    <?php endif; ?>
                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
      <script>
    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      page = page.replace(/\//g,'_');
      console.log(page)

      if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
        if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
          $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

      }
      $('.nav-link.active').addClass('bg-gradient-navy')
    })
  </script>
  