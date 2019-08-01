<?php 
$pageTitle = "change";
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/details.php');
include(ROOT_PATH . 'inc/member_navbar.php');

include(ROOT_PATH . 'inc/menubar.php');
?>


<div class="right_col" role="main">

    <!--/Tabs  -->
    

        <!-- Member Table Panel -->
        <div style="" class="col-md-12 col-sm-12 col-xs-12">
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
                  <h2><i class="fa fa-user"></i> Change Password</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form id="changePassword" class="form-horizontal form-label-left input_mask">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <div id="msg"></div>
                            </div>
                        </div>
                        <input type="text" value="<?php echo $id; ?>" id="id" name="id" hidden>
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            <input type="password" class="form-control has-feedback-left" id="password1" name="password1" placeholder="New Password">
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            <input type="password" class="form-control has-feedback-left" id="password2" name="password2" placeholder="Comfirm Password">
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 modal-footer">
                            <button type="submit" id="send" class="btn btn-primary pull-right">Save Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- / Member Table Panel -->

        
    </div>
    <br />
    


</div>



<script type="text/javascript" src="<?php echo BASE_URL; ?>components/scripts/changePassword.js" ></script>
<?php
include(ROOT_PATH. 'inc/footer.php');
?>