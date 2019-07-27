<?php 
$pageTitle = "home";
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/navbar.php');

include(ROOT_PATH . 'inc/menubar.php');
?>


<div class="right_col" role="main">
<?php include(ROOT_PATH . 'inc/tubes.php')?>

    <!--/Tabs  -->
    <div class="row">
        <!-- Member Table Panel -->
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-group"></i> Members Table</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <button type="button" class="btn btn-dark " data-toggle="modal" data-target="#add-member" >Add Member</button>     
                    </ul>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead style="text-align: center">
                                <tr>
                                    <th style="text-align: center" hidden>#</th>
                                    <th style="text-align: center">UNIQUE ID</th>
                                    <th style="text-align: center">SURNAME</th>
                                    <th style="text-align: center">OTHER NAME</th>
                                    <th style="text-align: center">LOCATION</th>
                                    <th style="text-align: center">REG. DATE</th>
                                    <th style="text-align: center">MONTHLY CON.</th>
                                    <th style="text-align: center">STATUES</th>
                                    <th style="text-align: center">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody id="membersContent" class="text-center">
                                <!-- <tr>
                                    <th scope="row">1</th>
                                    <td>NAL44156</td>
                                    <td>BENSON</td>
                                    <td>COLLINS</td>
                                    <td>LAGOS</td>
                                    <td>12/12/12</td>
                                    <td>30,000</td>
                                    <td>
                                        <button style="background-color:white" class="btn"><i style="color:green; font-size:140%" class="fa fa-toggle-on"></i></button>
                                        <button style="background-color:white" class="btn"><i style="color:green; font-size:140%" class="fa fa-toggle-off"></i></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View </button>
                                        <button class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit </button>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                        <div id="nofill"></div>
                    </div>
                    <div class="btn-group pull-right" id="pagination">
                    </div>
                </div>
            </div>
        </div>
        <!-- / Member Table Panel -->

        
    </div>
    <br />

    <div class="row">
        <!-- Annoucement panel -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-bullhorn"></i> Annoucement </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#add-announcement">Add Annoucement </button>     
                    </ul>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" id="announcement_content">
                    
                    
                </div>
                <div class="btn-group pull-right" id="announcement_pagination">
                </div>
            </div>
        </div>
        <!-- / Annoucement panel  -->
        

         <!-- Loan Request Panel -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                <h2><i class="fa fa-list"></i> Pending Loan Request</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="list-unstyled  scroll-view" id="pendingList">
                        <li id="nolist"></li>
                    </ul>
                    
                </div>
                <div class="btn-group pull-right" id="pendingList_pagination">
                </div>
            </div>
        </div>
        <!-- /Loan Request Panel -->
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
                <form id="createUser" class="form-horizontal form-label-left input_mask">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <h2>Personal Details</h2>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            <input type="text" class="form-control has-feedback-left" id="surname" name="surname" placeholder="SurName">
                            
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            <input type="text" class="form-control" id="othername" name="othername" placeholder="Other Name">
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedbacsubk">
                        <textarea class="form-control" rows="3" id="homeAddress" name="homeAddress" placeholder="Home Address"></textarea>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                            <input type="text" class="form-control has-feedback-left" id="mobileNumber" name="mobileNumber" placeholder="Mobile Number">
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <span class="fa fa-at form-control-feedback right" aria-hidden="true"></span>
                            <input type="text" class="form-control" id="emailAddress" name="emailAddress" placeholder="Email Address">
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="select2_single form-control" id="sex" name="sex" tabindex="-1">
                            </select>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="select2_single form-control" id="location" name="location" tabindex="-1">
                            </select>
                        </div>                  

                        <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
                            <span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
                            <input type="text" class="form-control" id="contributionAmount" name="contributionAmount" placeholder="Contribution Amount">
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <h2>Next of Kin Details</h2>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            <input type="text" class="form-control has-feedback-left" id="nxtKinName" name="nxtKinName" placeholder="Full Name">
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                            <input type="text" class="form-control" id="nxtKinNumber" name="nxtKinNumber" placeholder="Mobile Number">
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="select2_single form-control" id="nxtKinSex" name="nxtKinSex" tabindex="-1">
                            </select>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="select2_single form-control" id="nxtKinRelationship" name="nxtKinRelationship" tabindex="-1">
                            </select>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <textarea class="form-control" rows="3" id="nxtKinAddress" name="nxtKinAddress" placeholder="Home Address"></textarea>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <h2>Bank Details</h2>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <span class="fa fa-qrcode form-control-feedback left" aria-hidden="true"></span>
                            <input type="text" class="form-control has-feedback-left" id="bankAccountNumber" name="bankAccountNumber" placeholder="Account Number">
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="select2_single form-control" id="bankName" name="bankName" tabindex="-1">
                          </select>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 modal-footer">
                            <button type="button" id="swal" class="btn btn-default" daa-dismiss="modal">Close</button>
                            <button type="submit" id="send" class="btn btn-primary">Create Member</button>
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
                <form id="create_announcement" class="form-horizontal form-label-left input_mask">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <h2>New Annoucement</h2>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <span class="fa fa-newspaper-o form-control-feedback left" aria-hidden="true"></span>
                            <input type="text" class="form-control has-feedback-left" id="subject" name="subject" placeholder="Subject">
                            
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" hidden>
                            <input type="text" class="form-control" id="announcementDay" name="announcementDay" value="<?php echo date("d");?>">
                            <input type="text" class="form-control" id="announcementMonth" name="announcementMonth" value="<?php echo date("M");?>">
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <textarea class="form-control" rows="3" id="message" name="message" placeholder="Type in your announcement"></textarea>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <select class="select2_single form-control" id="announcer" name="announcer" tabindex="-1">
                            </select>
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button id="send_announcement" type="submit" class="btn btn-primary">Send Announcement</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- View Section modal -->
    <div id="view-members" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Announcement</h4>
                </div>
                <div class="modal-body" id="view_profile">
                    <!-- <input type="text" name="view" id="view"> -->
                    
                </div>
            </div>
        </div>
    </div>
    


</div>



<script type="text/javascript" src="<?php echo BASE_URL; ?>components/scripts/loading.js" ></script>
<?php
include(ROOT_PATH. 'inc/footer.php');
?>