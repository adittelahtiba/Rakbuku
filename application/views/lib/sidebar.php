
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar">
        <div class="logopanel">
          <h1><a href="dashboard.html">&nbsp;</a></h1>
        </div>
        <div class="sidebar-inner">
          <div class="sidebar-top big-img">
            <div class="user-image">
              <img src="<?php echo base_url('')?>assets/bootstrap/images/avatars/avatar7_big@2x.png" class="img-responsive img-circle">
            </div>
            <h4><?php echo $this->session->userdata('username'); ?></h4>
          </div>
          <div class="menu-title">
            
          </div>
          <ul class="nav nav-sidebar">
            <?php if ($this->session->userdata('is_admin')!==FALSE) {?>
              
              <li class="tm nav-active <?php echo $this->uri->segment(2)==='dashboard' ? 'active' : '' ; ?>"><a href="<?php echo site_url('admins/dashboard')?>"><i class="icon-home"></i><span>Dashboard</span></a></li>

              <?php if ($this->session->userdata('role')==1) { ?>
              
                <li class="tm nav-active <?php echo $this->uri->segment(1)==='admins' ? 'active' : '' ; ?>"><a href="<?php echo site_url('admins')?>"><i class="icon-home"></i><span>Admin</span></a></li>
              
              <?php } ?>
              
              <li class="tm nav-active <?php echo $this->uri->segment(1)==='owners' ? 'active' : '' ; ?>"><a href="<?php echo site_url('owners')?>"><i class="icon-home"></i><span>Owners</span></a></li>

              <li class="tm nav-active <?php echo $this->uri->segment(1)==='adverts' ? 'active' : '' ; ?>"><a href="<?php echo site_url('adverts')?>"><i class="icon-home"></i><span>Adverts</span></a></li>
            <?php } ?>
            
            <?php if ($this->session->userdata('is_admin')==FALSE) {?>    
                <li class="tm nav-active <?php echo $this->uri->segment(1)==='dashboard' ? 'active' : '' ; ?>"><a href="<?php echo site_url('dashboard')?>"><i class="icon-home"></i><span>Dashboard</span></a></li>
            <?php } ?>

            <li class="tm nav-active <?php echo $this->uri->segment(1)==='books' ? 'active' : '' ; ?>"><a href="<?php echo site_url('books')?>"><i class="icon-home"></i><span>Books</span></a></li>

           <!--  <li class="tm nav-parent">
              <a href="#"><i class="icon-puzzle"></i><span>Menu 2</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li><a href="submenu1.html">Submenu 1</a></li>
                <li><a href="submenu2.html">Submenu 2</a></li>
                <li><a href="submenu3.html">Submenu 3</a></li>
              </ul>
            </li>
            <li class="tm nav-parent">
              <a href="#"><i class="icon-puzzle"></i><span>Menu 3</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li><a href="submenu1.html">Submenu 1</a></li>
                <li><a href="submenu2.html">Submenu 2</a></li>
                <li><a href="submenu3.html">Submenu 3</a></li>
              </ul>
            </li>
            <li class="tm nav-parent">
              <a href="#"><i class="icon-bulb"></i><span>Menu 4</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li><a href="submenu1.html">Submenu 1</a></li>
                <li><a href="submenu2.html">Submenu 2</a></li>
                <li><a href="submenu3.html">Submenu 3</a></li>
              </ul>
            </li>
            <li class="tm nav-parent">
              <a href="#"><i class="icon-screen-desktop"></i><span>Menu 5</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li><a href="submenu1.html">Submenu 1</a></li>
                <li><a href="submenu2.html">Submenu 2</a></li>
                <li><a href="submenu3.html">Submenu 3</a></li>
              </ul>
            </li> -->
          </ul>
          <div class="sidebar-widgets" style=""></div>
          <div class="sidebar-footer clearfix" style="">
            <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen">
            <i class="icon-size-fullscreen"></i></a>
          </div>
        </div>
      </div>
      <!-- END SIDEBAR -->
      