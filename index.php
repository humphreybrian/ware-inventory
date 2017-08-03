<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<!-- login page div-->
<div class="login-page col-md-6 col-md-offset-3" >
<div class="text-center col-md-10 col-md-offset-1">
    <div class="kqlogo" align="center"><img src="assets/images/kqofficial.png" class="img-responsive"/></div>

       <div welcome_msg><h1><strong><font face="verdana">Welcome to Tracking System</h1>
       <p>Sign in to start your session</p></font></strong> </div>
  </div>
  <div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth.php" class="clearfix">
        <div class="form-group">
              <label for="username" class="control-label">Username</label>
              <input type="name" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="Password" class="control-label">Password</label>
            <input type="password" name= "password" class="form-control" placeholder="password">
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-danger  btn-block">Login</button>
        </div>
    </form>
  </div>
</div><!-- end of  login-page div-->
<?php include_once('layouts/footer.php'); ?>
