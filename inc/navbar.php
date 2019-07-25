<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>COPORATIVE FUND</span> </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pick">
                <img src="<?php echo BASE_URL;?>assets/build/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div style="text-align: center; margin-top:5%" class="profile_inf">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li class="<?php if($pageTitle == "home"){ echo "active";} ?>"><a href="<?php echo BASE_URL;?>admin/index.php"><i class="fa fa-dashboard "></i> Dashboard </a>
                  </li>
                  <li class="<?php if($pageTitle == "contributions" || $pageTitle == "requests"){ echo "active";} ?>"><a><i class="fa fa-info-circle"></i> Options <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo BASE_URL;?>admin/requests.php">View loan Request</a></li>
                      <li><a href="<?php echo BASE_URL;?>admin/contributions.php">View Contribution</a></li>
                      <li><a href="#">Analysis</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>