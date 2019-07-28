<?php 
$pageTitle = "home";
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');


include(ROOT_PATH . 'inc/details.php');
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
                        <table class="table table-striped">
                        <thead style="text-align: center">
                                <tr>
                                    <th style="text-align: center">#REF.NO</th>
                                    <th style="text-align: center">DATE</th>
                                    <th style="text-align: center">UNIQUE ID</th>
                                    <th style="text-align: center">FULLNAME</th>
                                    <th style="text-align: center">CONT. AMOUNT</th>
                                    <th style="text-align: center">PREV. DEBT</th>
                                </tr>
                            </thead>
                            <tbody id="individualContributionTable" class="text-center">
                                
                            </tbody>
                            
                        </table>
                        <div id="nofill"></div>
                    </div>
                    <div class="btn-group pull-right" id="individualContributionPagination">
                    </div>
                </div>
            </div>
        </div>
        <!-- / Member Table Panel -->

        
    </div>
    <br />

    <div class="row">
        <!-- Loan Request panel -->
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
                                    <th style="text-align: center">#REF.NO</th>
                                    <th style="text-align: center">REQUEST DATE</th>
                                    <th style="text-align: center">UNIQUE ID</th>
                                    <th style="text-align: center">FULLNAME</th>
                                    <th style="text-align: center">AMOUNT</th>
                                    <th style="text-align: center">AMOUNT GIVEN</th>
                                    <th style="text-align: center">REFUND. DATE</th>
                                    <th style="text-align: center">STATUES</th>
                                </tr>
                            </thead>
                            <tbody id="individualLoanRequestTable" class="text-center">
                                
                            </tbody>
                        </table>
                        <div id="nofill2"></div>
                    </div>
                    <div class="btn-group pull-right" id="individualLoanRequestPagination">
                    </div>
                </div>
            </div>
        </div>
        <!-- / Loan Request panel  -->

        <!-- Annoucement Panel-->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-envelope"></i> Announcement</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" id="announcement_content">
                    
                    
                </div>
                <div class="btn-group pull-right" id="announcement_pagination">
                </div>
            </div>
        </div>
        <!-- / Annoucement Panel -->
    </div>


    <div id="add-announcement" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">New Loan Request</h4>
                </div>
                <div class="modal-body">
                <form id="requestForLoan" class="form-horizontal form-label-left input_mask">

                        <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                            <span class="fa fa-qrcode form-control-feedback left" aria-hidden="true"></span>
                            <input type="text" class="form-control has-feedback-left" id="unique_id" name="unique_id" value="<?php echo $username?>" readonly="read-only">
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback" hidden>
                            <input type="text" class="form-control has-feedback-left" id="date" name="date" value="<?php echo date("Y-m-d");?>" readonly="read-only">
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            <input type="text" class="form-control has-feedback-left" id="surname" name="surname" value="<?php echo $surname;?>" readonly="read-only">
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            <input type="text" class="form-control has-feedback-left" id="othername" name="othername" value="<?php echo $othername;?>" readonly="read-only">
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" hidden>
                            <input type="text" class="form-control" id="token_id2" name="token_id2" value="<?php echo $token;?>">
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback">
                            <span class="fa fa-newspaper-o form-control-feedback left" aria-hidden="true"></span>
                            <input type="number" class="form-control has-feedback-left" id="amountRequested" name="amountRequested" placeholder="Loan Amount">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                            <input type="date" class="form-control has-feedback-left" id="refundDate" name="refundDate">
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 modal-footer">
                            <button id="send" type="submit" class="btn btn-primary">Send Request</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    


</div>



<script type="text/javascript" src="<?php echo BASE_URL; ?>components/scripts/memberIndex.js" ></script>
<?php
include(ROOT_PATH. 'inc/footer.php');
?>