<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ORP Project Login</title>


        <!-- ========== Css Files ========== -->
        <link href="<?php echo base_url() ?>front_assets/css/root.css" rel="stylesheet">
        
    </head>
    <body style=" background-image:url('<?php echo base_url()?>front_assets/img/inventory_management.jpg'); background-size: 100%">


        <div class="login-form">
            <div class="footer-links row">
                <div class="col-xs-12" style="text-shadow: 1px 1px #333; color:#fff; font-size: larger;">Already Have Account Please <a href="<?php echo base_url() ?>index.php/login" style="text-shadow: 1px 1px #333; color:#fff; font-size: x-large;"><i class="fa fa-sign-in"></i> Login</a></div>
            </div>
            <form action="<?php echo base_url() ?>index.php/register/proses/" method="POST">

                <div class="top">
                    <h1>Register</h1>
                    <h4>ORP System Platform</h4>
                    <h3>BIZON.ID</h3>
                </div>
                <div class="form-area">
                    <div class="group">
                        <input type="text" name="email" class="form-control" placeholder="E-mail" required>
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="group">
                        <input type="text" name="namalengkap" class="form-control" placeholder="Full Name">
                        <i class="fa fa-user"></i>
                    </div>
                    
                    <div class="group">
                        <input type="text" name="nama_refstore" class="form-control" placeholder="Retail Name">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <i class="fa fa-key"></i>
                    </div>
                    <div class="group">
                        <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                        <i class="fa fa-key"></i>
                    </div>
                    <button type="submit" class="btn btn-default btn-block">REGISTER NOW</button>
                </div>
                
                
            </form>

            <script>
                var password = document.getElementById("password");
                var confirm_password = document.getElementById("confirm_password");

                function validatePassword() {
                    if (password.value != confirm_password.value) {
                        confirm_password.setCustomValidity("Passwords Don't Match");
                    } else {
                        confirm_password.setCustomValidity('');
                    }
                }

                password.onchange = validatePassword;
                confirm_password.onkeyup = validatePassword;
            </script>


        </div>

    </body>
</html>