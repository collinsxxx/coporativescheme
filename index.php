<?php 
ini_set('display_errors', 1);
require_once($_SERVER["DOCUMENT_ROOT"]."/fundscheme/constant/config.php");

require_once(ROOT_PATH . 'core/init.php');

include(ROOT_PATH . 'inc/loginHeader.php');

?>
    <div class="login_wrapper">
        <div class="animate form login_for">
          <section class="login_content col-md-12" >
                   
            <form id="loginUser" class="form-horizontal form-label-left input_mask">
              <h2 style="margin-top:25%; font-size:200%;">COPORATIVE FUND SCHEME</h2>
              <div>
                <div id="msg" >
			          </div> 
                <input type="text" class="form-control" id="username" name="username"  placeholder="Username" />
              </div>
              <div>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
              </div>
              <div>
                <button type="submit" id="send" class="btn btn-dark btn-block dropdown-toggle"> LOGIN </button>
              </div>
                <br />
                <div id="msg2" >
			          </div> 
              </div>
            </form>
            <div class="row ">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
              <div class="pull- upper" style="margin-top:0.6%;">
                Coporative Fund Scheme by <a href="https://colorlib.com">Collins Benson </a>
              </div>
            </div>
          </div>
          </section>
        </div>
    </div>
    </div>
  </body>
</html>



<script type="text/javascript" src="<?php echo BASE_URL; ?>components/scripts/logging.js" ></script>