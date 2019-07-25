<?php 
$pageTitle = "contributions";
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
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-stripe">
                            <thead>
                                <tr>
                                <th style="text-align: center" hidden>#</th>
                                <th style="text-align: center">UNIQUE ID</th>
                                <th style="text-align: center">FULLNAME</th>
                                <th style="text-align: center">MONTHLY AMOUNT</th>
                                <th style="text-align: center">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody id="membersContent" class="text-center">
                               
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
        <!-- Contribution List panel -->
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-bullhorn"></i> Monthly Contribution </h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: center">#REF.NO</th>
                                    <th style="text-align: center">DATE</th>
                                    <th style="text-align: center">UNIQUE ID</th>
                                    <th style="text-align: center">FULLNAME</th>
                                    <th style="text-align: center">AMOUNT</th>
                                    <th style="text-align: center">AUTHOR NAME</th>
                                    <th style="text-align: center">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody id="contributionContent" class="text-center">
                              
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
        <!-- /Contribution List Panel -->
    </div>


    <div id="contribution" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Monthly Contribution</h4>
                </div>
                <div class="modal-body">
                <form id="monthly_contribution" class="form-horizontal form-label-left input_mask">

                        <div class="col-md-6 col-sm-6 col-xs-6 form-group has-feedback">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            <input type="text" class="form-control has-feedback-left" id="unique_id" name="unique_id" placeholder="Subject" readonly="read-only">
                        </div>
                        <div class="col-md-6 col-sm-6 col-6-12 form-group has-feedback">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            <input type="text" class="form-control has-feedback-left" id="fullName" name="fullName" placeholder="Subject" readonly="read-only">
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" hidden>
                            <input type="text" class="form-control" id="reg_no" name="reg_no" >
                            <input type="text" class="form-control" id="token_id" name="token_id" >
                            <input type="text" class="form-control" id="authorised_name" name="authorised_name" value="admin">
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                            <input type="text" class="form-control has-feedback-left" id="contributionAmount" name="contributionAmount" placeholder="Contribution Amount">
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 modal-footer">
                            <button id="send" type="submit" class="btn btn-primary">Add Contribution</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    


</div>



<script type="text/javascript" src="<?php echo BASE_URL; ?>components/scripts/contribution.js" ></script>
<?php
include(ROOT_PATH. 'inc/footer.php');
?>