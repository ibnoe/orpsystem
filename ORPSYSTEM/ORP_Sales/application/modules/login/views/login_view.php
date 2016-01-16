<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ORP Project Login</title>


  <!-- ========== Css Files ========== -->
  <link href="<?php echo base_url()?>front_assets/css/root.css" rel="stylesheet">
  
  </head>
  <body class="login" style=" background-image:url('<?php echo base_url()?>front_assets/img/inventory_management.jpg'); background-size: 100%">

    <div class="login-form">
         
      <form action="<?php echo base_url ();?>index.php/login/process" method="post">
          
        <div class="top">
          <h4>BIZON.ID - PURCHASE SYSTEM</h4>
          <h2>LOGIN</h2>
        </div>
        <div class="form-area">
          <div class="group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            <i class="fa fa-file"></i>
          </div>
          <div class="group">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            <i class="fa fa-key"></i>
          </div>
          <button type="submit" class="btn btn-default btn-block">LOGIN</button>
        </div>
          <div class="footer-links row">
             <div class="col-xs-12 text-right"> <a href="<?php echo base_url() ?>" style="text-shadow: 1px 1px #ddd; font-size: larger;">Back To Register</a> | <a href="#" style="text-shadow: 1px 1px #ddd; font-size: larger;"><i class="fa fa-lock"></i> Forgot password</a> </div>        
       
      </div>
      </form>
     
    </div>
</body>
</html>