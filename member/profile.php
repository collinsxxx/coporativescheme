<?php 
$pageTitle = "profile";
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/member_navbar.php');

include(ROOT_PATH . 'inc/menubar.php');
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
                  <h2><i class="fa fa-envelope"></i> Profile Photo</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- menu profile quick info -->
                    <div class=" clearfix">
                        <div class="profile_pick">
                            <img src="<?php echo BASE_URL;?>assets/build/images/img.jpg" alt="..." class="img-circle profile_img">
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
                  <h2><i class="fa fa-group"></i> Profile Details</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left input_mask">
                        <div id="contents">
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <h2>Personal Details</h2>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="surname" name="surname" placeholder="SurName">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control" id="othername" name="othername" placeholder="Other Name">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <textarea class="form-control" rows="3" id="address" name="address" placeholder="Home Address"></textarea>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="phonoNo" name="phonoNo" placeholder="Mobile Number">
                                <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
                                <span class="fa fa-at form-control-feedback right" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="location" name="location" placeholder="Location">
                                <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control" id="contribution" name="contribution" readonly="readonly" placeholder="Contribution Amount">
                                <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <div  id="label_image" class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback" >
                                <label for="img_file" class="btn btn-primary" ><i class="fa fa-upload"> </i> Upload Photo</label>
                                    <input style="display:none" type="file" id="img_file" name="img_file" >
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <!-- <label class="bmd-label-floating">Job Role</label> -->
                                    <input type="hidden" id="img_show" name="img_show" class="form-control" value="no-image.png">
                                </div>
                            </div>

                            <div style="margin-bottom: 2%" class="clearfix"></div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <h2>Next of Kin Details</h2>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="fullname" name="fullname" placeholder="Full Name">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control" id="nxtPhoneNo" name="nxtPhoneNo" placeholder="Mobile Number">
                                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <textarea class="form-control" rows="3" id="address" name="address" placeholder="Home Address"></textarea>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <h2>Bank Details</h2>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Account Number">
                                <span class="fa fa-qrcode form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control" id="bankname" name="bankname" placeholder="Bank Name">
                                <span class="fa fa-bank form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
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



<script type="text/javascript" src="<?php echo BASE_URL; ?>components/scripts/loading.js" ></script>
<?php
include(ROOT_PATH. 'inc/footer.php');
?>