<?php

if(Session::exists('home')) {
    echo '<p>'. Session::flash('home') .'</p>';
  }

  $user = new Admin();

  if($user->isLoggedIn()) {
      $token        = $user->data()->token_id;
      $id               = $user->data()->id;
      $username = $user->data()->username;

  } else {
    Redirect::to(404);
  }

  $surname = selectNetorDebt("registration_table", "surname", "token_id",$token);
  $othername = selectNetorDebt("registration_table", "othername", "token_id",$token);

  $fullname = $surname." ".$othername;

 
?>

<input type="text" name="token_id" id="token_id" value="<?php echo $token;?>" hidden>