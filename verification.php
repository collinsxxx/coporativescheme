<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/header.php');

if (isset($_GET["tokenId"])) {

    $Number = $_GET["tokenId"];

}else{
    $Number="1";
}
    $select = selectField("login_table","token_id","token_id",$Number);

    if($Number == $select){

?>

        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-">Verification</h1>
                <h3>Please type in your verification code sent to your Email Account</h3>
                <div class="mid_center">
                <form id="verificationForm">
                  <div class="col-xs-12 form-group pull-right topsearch">
                    <div class="inpu-group">
                    <div id="msg"> </div>
                        <input type="text" class="form-control" id="token_id" name="token_id" value="<?php echo $Number; ?>">
                      <input type="text" class="form-control" id="verificationCode" name="verificationCode" placeholder="Enter your verification code">
                      <!-- <span class="input-group-btn" style="color:white;"> -->
                              <button id="send" class="btn btn-success" type="submit">Go!</button>
                          <!-- </span> -->
                    </div>
                    <br/>
                    <span id="msg2"></span><br/>
                    <span id="spinner"></span>
                  </div>
                </form>
                </div>
            </div>
          </div>
        </div>


<?php }else {?>


        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-">505</h1>
                <h3>Verification Error</h3>
                <div class="mid_center">
                <h3 class=""><div id="msg" class="alert alert-warning"> Sorry Something Went Wrong </div></h3>
                </div>
            </div>
          </div>
        </div>

        
        
<?php } ?>

<script type="text/javascript" src="<?php echo BASE_URL; ?>components/scripts/verification.js" ></script>
