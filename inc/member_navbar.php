<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a class="site_title"> <span>COPORATIVE FUND</span> </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div style="text-align: center; margin-top:5%" class="profile_inf">
                <span>Welcome,</span>
                <h2><?php echo $fullname;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li class="<?php if($pageTitle == "home"){ echo "active";} ?>">
                  <a href="<?php echo BASE_URL;?>pages/account/index.php"><i class="fa fa-dashboard "></i> Dashboard </a>
                  </li>
                  <li class="<?php if($pageTitle == "profile"){ echo "active";} ?>">
                    <a href="<?php echo BASE_URL;?>pages/account/profile.php"><i class="fa fa-user"></i> Profile </a>
                  </li>
                  <li class="<?php if($pageTitle == "change"){ echo "active";} ?>">
                    <a href="<?php echo BASE_URL;?>pages/account/changepassword.php"><i class="fa fa-user"></i> Change Password </a>
                  </li>
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        

