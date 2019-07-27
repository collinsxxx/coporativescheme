<?php 
$pageTitle = "profile";
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/member_navbar.php');

include(ROOT_PATH . 'inc/menubar.php');
include(ROOT_PATH . 'inc/details.php');
?>


<div class="right_col" role="main">

    <!--/Tabs  -->
    <div style="padding: 0 10% 0 10%" class="row">
        <!-- Calendar Panel-->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div style="box-shadow:
                /* The top layer shadow */
                    0 1px 1px rgba(0,0,0,0.15),
                        /* The second layer */
                    0 10px 0 -5px #eee,
                        /* The second layer shadow */
                    0 10px 1px -4px rgba(0,0,0,0.15),
                        /* The third layer */
                    0 20px 0 -10px #eee,
                        /* The third layer shadow */
                    0 20px 1px -9px rgba(0,0,0,0.15);" class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-user"></i> Profile Photo</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- menu profile quick info -->
                    <div class=" clearfix">
                        <div id="profileImageContent" class="profile_pick">
                            
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                </div>
            </div>
        </div>
        <!-- / Calendar Panel -->

        <!-- Member Table Panel -->
        <div style="" class="col-md-8 col-sm-6 col-xs-12">
            <div style="box-shadow:
                /* The top layer shadow */
                    0 1px 1px rgba(0,0,0,0.15),
                        /* The second layer */
                    0 10px 0 -5px #eee,
                        /* The second layer shadow */
                    0 10px 1px -4px rgba(0,0,0,0.15),
                        /* The third layer */
                    0 20px 0 -10px #eee,
                        /* The third layer shadow */
                    0 20px 1px -9px rgba(0,0,0,0.15);" class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-user"></i> Profile Details</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form id="updateProfile" class="form-horizontal form-label-left input_mask">
                        

                        <div id="profileContent">
                            
                        </div>
                        
                        <div  id="label_image" class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback" >
                            <label for="img_file" class="btn btn-primary " ><i class="fa fa-upload"> </i> Upload Photo</label>
                            <input style="display:none" type="file" id="img_file" name="img_file" >
                        </div>
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <span id="msg">
                            </span>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 modal-footer">
                            <button type="button" id="editButton" class="btn btn-primary pull-right">Edit Profile</button>
                            <button type="submit" id="send" class="btn btn-primary pull-right">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- / Member Table Panel -->

        
    </div>
    <br />
    


</div>



<script type="text/javascript" src="<?php echo BASE_URL; ?>components/scripts/individualProfile.js" ></script>
<?php
include(ROOT_PATH. 'inc/footer.php');
?>