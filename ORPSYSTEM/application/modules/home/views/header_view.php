<!doctype html>
<!--[if lt IE 7]>
<html class="no-js ie6 oldie" lang=en>
   <![endif]--> <!--[if IE 7]>
   <html class="no-js ie7 oldie" lang=en>
      <![endif]--> <!--[if IE 8]>
      <html class="no-js ie8 oldie" lang=en>
         <![endif]--> <!--[if gt IE 8]><!--> 
<html class=no-js lang=en>
    <!--<![endif]--> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <meta charset=utf-8>
        <link rel=dns-prefetch href="http://fonts.googleapis.com">
        <meta http-equiv=X-UA-Compatible content="IE=edge,chrome=1">
        <title>Dashboard - <?php echo $profile['user']['namalengkap'] . '@' . $profile['store']['nama']; ?></title>
        <meta name=description content="">
        <meta name=author content="">
        <meta name=viewport content="width=device-width,initial-scale=1">
        <link rel=stylesheet href='<?php echo base_url() ?>front_assets/dashboard/css/1105b53.css'>
        <link rel=stylesheet href="<?php echo base_url() ?>front_assets/dashboard/css/sidebar.css">
        <script src="<?php echo base_url() ?>front_assets/dashboard/js/libs/modernizr-2.0.6.min.js"></script> 
    </head>
    <body>
        <div id=height-wrapper>
            <header>

                <div id=header_toolbar> 
                    <div class=container_12>
                        <h2 class=grid_8><marque style="color:#fff">BIZON's Control Panel</marque></h2>
                        <div class=grid_4>
                            <div class=toolbar_large>
                                <div class=toolbutton>
                                    <div class=toolicon> <img src="<?php echo base_url() ?>front_assets/dashboard/img/icons/16x16/user.png" width=16 height=16 alt=user> </div>
                                    <div class=toolmenu>
                                        <div class=toolcaption> Anda Login Sebagai <span><?php echo $profile['user']['namalengkap'] ?></span> @ <?php echo $profile['store']['nama'] ?> </div>
                                        <div class="dropdown">
                                            <ul>
                                                <li> <a href="<?php echo site_url('config/setting') ?>">Settings</a> </li>
                                                <li> <a href="<?php echo site_url('login/login/logout') ?>">Logout</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=toolbar_large>
                                <div class=toolbutton>
                                    <div class=toolicon> <img src="<?php echo base_url() ?>front_assets/dashboard/img/icons/25x25/dark/locked-2.png" width=16 height=16 alt=user> </div>
                                    <div class=toolmenu>
                                        <div class=toolcaption>
                                            <a href="<?php echo site_url('login/login/logout') ?>" style="color:white;"> Logout </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                </div>

                <nav id=header_main>
                    <div class='kol1'> 
                        <h1 style='color: #fff;'>
<?php if ($profile['store']['image_file'] != null or $profile['store']['image_file'] != '') { ?>
                                <img src='<?php echo base_url('uploads/accounts/' . $profile['store']['image_file']) ?>' width="110px"/>
                            <?php } ?>
                            :: <?php echo $profile['store']['nama'] ?> ::
                        </h1>
                    </div> 
                    <div class='kol2'> 
                        <img src='<?php echo base_url('front_assets/img/bizon.png') ?>' width="110px"/>
                    </div> 
                </nav>
            </header>