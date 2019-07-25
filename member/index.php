<?php 
$pageTitle = "home";
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/member_navbar.php');

include(ROOT_PATH . 'inc/menubar.php');
?>


<div class="right_col" role="main">
<?php include(ROOT_PATH . 'inc/member_tubes.php')?>

    <!--/Tabs  -->
    <div class="row">
        <!-- Member Table Panel -->
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <h2><i class="fa fa-list"></i> Monthly Contribution List</h2>
                        </div>
                    
                        <!-- <div class="col-md-4">
                            <ul class="nav navbar-right panel_toolbox">
                                <span style="font-size:150%; color:#34495E"> <i class="fa fa-money"></i> Outstanding Payment : N 30,000 </span>     
                            </ul>
                        </div> -->
                    </div>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table">
                        <thead style="text-align: center">
                                <tr>
                                    <th style="text-align: center">#</th>
                                    <th style="text-align: center">DATE</th>
                                    <th style="text-align: center">UNIQUE ID</th>
                                    <th style="text-align: center">AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>12/12/12</td>
                                    <td>NAL44156</td>
                                    <td>30,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="btn-group pull-right">
                          <button class="btn btn-default" type="button">5</button>
                          <button class="btn btn-default" type="button">6</button>
                          <button class="btn btn-default" type="button">7</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Member Table Panel -->

        
    </div>
    <br />

    <div class="row">
        <!-- Annoucement panel -->
        <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-list"></i> Loan Request List </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#add-announcement">New Loan Request </button>     
                    </ul>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead style="text-align: center">
                                <tr>
                                    <th style="text-align: center">#</th>
                                    <th style="text-align: center">DATE</th>
                                    <th style="text-align: center">UNIQUE ID</th>
                                    <th style="text-align: center">AMOUNT</th>
                                    <th style="text-align: center">REFUND DATE</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>12/12/12</td>
                                    <td>NAL44156</td>
                                    <td>30,000</td>
                                    <td>12/12/12</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="btn-group pull-right">
                        <button class="btn btn-default" type="button">5</button>
                        <button class="btn btn-default" type="button">6</button>
                        <button class="btn btn-default" type="button">7</button>
                </div>
            </div>
        </div>
        <!-- / Annoucement panel  -->

        <!-- Calendar Panel-->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-envelope"></i> Announcement</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <button type="button" class="btn btn-default " data-toggle="modal" data-target="#add-member" > Compose Mail</button>     
                    </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="messages" style="margin-left:-8.5%">
                        <li>
                            <div class="message_date">
                                <h3 class="date text-info">24</h3>
                                <p class="month">May</p>
                            </div>
                            <div class="message_wrapper">
                                <h4 class="heading">Desmond Davison</h4>
                                <p class="url">
                                    <button class="btn btn-default btn-sm"><i class="fa fa-view"></i> Read </button>
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="message_date">
                                <h3 class="date text-info">24</h3>
                                <p class="month">May</p>
                            </div>
                            <div class="message_wrapper">
                                <h4 class="heading">Desmond Davison</h4>
                                <p class="url">
                                <button class="btn btn-default btn-sm"><i class="fa fa-view"></i> Read </button>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="btn-group pull-right">
                        <button class="btn btn-default" type="button">5</button>
                        <button class="btn btn-default" type="button">6</button>
                        <button class="btn btn-default" type="button">7</button>
                </div>
            </div>
        </div>
        <!-- / Calendar Panel -->
    </div>

    <div id="add-member" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add Member</h4>
                </div>
                <div class="modal-body">
                <form class="form-horizontal form-label-left input_mask">
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
                            <select class="select2_single form-control" id="location" name="location" tabindex="-1">
                                    <option value=""> ~ Select Location ~ </option>
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control" id="contribution" name="contribution" placeholder="Contribution Amount">
                            <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                        </div>

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
                            <select class="select2_single form-control" id="bankname" name="bankname" tabindex="-1">
                                <option value=""> ~ Select Bank Name ~ </option>
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                                <option value="OR">Oregon</option>
                          </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                </form>

                </div>
            </div>
        </div>
    </div>

    <div id="add-announcement" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Announcement</h4>
                </div>
                <div class="modal-body">
                <form class="form-horizontal form-label-left input_mask">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <h2>New Annoucement</h2>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" id="subject" name="subject" placeholder="Subject">
                            <span class="fa fa-newspaper-o form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" hidden>
                            <input type="text" class="form-control" id="date" name="date" value="<?php echo date("d");?>">
                            <input type="text" class="form-control" id="month" name="month" value="<?php echo date("M");?>">
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <textarea class="form-control" rows="3" id="message" name="message" placeholder="Message fa fa-user"></textarea>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    


</div>



<script type="text/javascript" src="<?php echo BASE_URL; ?>components/scripts/loading.js" ></script>
<?php
include(ROOT_PATH. 'inc/footer.php');
?>