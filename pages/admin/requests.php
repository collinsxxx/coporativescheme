<?php 
$pageTitle = "requests";
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

include(ROOT_PATH . 'inc/navbar.php');

include(ROOT_PATH . 'inc/menubar.php');
?>


<div class="right_col" role="main">
<?php include(ROOT_PATH . 'inc/tubes.php')?>
    <!--/ Notification Tubes-->

    <!--/Tabs  -->
    <div class="row">
        <!-- Member Table Panel -->
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-group"></i> Request Table</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: center">#REF.NO</th>
                                    <th style="text-align: center">REQUEST DATE</th>
                                    <th style="text-align: center">UNIQUE ID</th>
                                    <th style="text-align: center">FULLNAME</th>
                                    <th style="text-align: center">AMOUNT</th>
                                    <th style="text-align: center">AMOUNT GIVEN</th>
                                    <th style="text-align: center">REFUND. DATE</th>
                                    <th style="text-align: center">STATUES</th>
                                    <th style="text-align: center">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" id="loanRequestTable">
                                
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

        <!-- Debtors Panel -->
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-list"></i> Debtors </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="list-unstyled  scroll-view" id="debtorsList">
                        <li id="nolist"></li>
                    </ul>
                    
                </div>
                <div class="btn-group pull-right" id="debtorsList_pagination">
                </div>
            </div>
        </div>
        <!-- /Debtors Panel -->
    </div>

    <div id="PayMember" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Payment</h4>
                </div>
                <div class="modal-body">
                <form id="pay_member" class="form-horizontal form-label-left input_mask">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <h2>New Payment</h2>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            <input type="text" class="form-control has-feedback-left" id="fullName" name="fullName" placeholder="Subject" readonly="read-only">
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" hidden>
                            <input type="text" class="form-control" id="token_id" name="token_id" >
                            <input type="text" class="form-control" id="id" name="id" >
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                            <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                            <input type="text" class="form-control has-feedback-left" id="amountReceived" name="amountReceived" placeholder="Amount">
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 modal-footer">
                            <button id="send" type="submit" class="btn btn-primary">Pay Member</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    


</div>



<script type="text/javascript" src="<?php echo BASE_URL; ?>components/scripts/request.js" ></script>
<?php
include(ROOT_PATH. 'inc/footer.php');
?>