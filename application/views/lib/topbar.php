        <!-- BEGIN TOPBAR -->
        <div class="topbar">
          <div class="header-left" style="display: block;">       <div class="topnav">
         <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
         
       </div>
</div>
          <div class="header-right">
            <ul class="header-menu nav navbar-nav">
              
              
              <!-- BEGIN USER DROPDOWN -->
              <li class="dropdown" id="user-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <img src="<?php echo base_url('')?>assets/bootstrap/images/avatars/avatar7_big@2x.png" alt="user image">
                <span class="username">Hi, <?php echo $this->session->userdata('username'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="<?= site_url($this->session->userdata('is_admin') ? 'admins' .'/update/'.$this->session->userdata('id') : 'owners'.'/update/'.$this->session->userdata('id')) ?>"><i class="icon-user"></i><span>Profile</span></a>
                  </li>
                  <?php if (!$this->session->userdata('is_admin')) { ?>
                    <li>
                      <a href="<?= site_url('stores/update/'.$this->session->userdata('stores_id')) ?>"><i class="icon-settings"></i><span>Pengaturan Toko</span></a>
                    </li>
                  <?php } ?>
                  <li>
                    <a href="<?= site_url('welcome/logout') ?>"><i class="icon-logout"></i><span>Logout</span></a>
                  </li>
                </ul>
              </li>
              <!-- END USER DROPDOWN -->
              <!-- CHAT BAR ICON -->
              
            </ul>
          </div>
          <!-- header-right -->
        </div>
        <!-- END TOPBAR -->
       