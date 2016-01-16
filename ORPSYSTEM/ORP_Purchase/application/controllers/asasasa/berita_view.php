<!DOCTYPE html>
<html>
	<head>    
		<?php echo Modules::run('front_templates/front_templates/head'); ?>
	</head>

    <body id="body">
        <div id="wrapper">
        	<div id="header">
            	
                 <!--top-nav-->
                 <?php echo Modules::run('front_templates/front_templates/top_nav'); ?>         
                 <!--end-top-nav--> 
                 
                 <!-- Logo and Ads Banner
		                ================================================== -->
                 <header>
                    <!--Header-->
                    <?php echo Modules::run('front_templates/front_templates/header'); ?>   
                    <!--End header-->
                    
                    <div class="clear"></div>
                    
                     <!-- Main Menu-->
                     <?php echo Modules::run('front_templates/front_templates/main_menu'); ?> 
                     <!-- Main Menu End-->
                    
                 </header>
                 <div class="clear"></div>
                 <!--end-header--> 
                 
                 <!-- RUNNING TEXT -->
                 <?php echo Modules::run('front_templates/front_templates/running_text'); ?>
                 <!-- RUNNING TEXT END --> 
                 
            </div><!-- / HEADER/-->
            <div class="clear"></div>
            
             <!-- MAIN CONTENTS -->
           <div id="main">
           
           		 <!--  CONTAINER START FROM HERE
   				 ================================================== -->
                 
           		<div id="container">
                
                	 <!--  CONTENTS BEGIN HERE
   				 		================================================== -->
                	
                	<div id="content">
                    
                    <div class="main cont_s12">
                    	
                        <!--  CONTENTS / LEFT CONTENTS
   				 		 ================================================== -->
                        <div class="content col-8">
                            <div class="container">
                              <div class="box boxgrey spnews col-8 breadcrumb">
                                 <div>
                                    <h3 class="spnews"> <a href="<?php echo base_url(); ?>beranda" class="icn_home"></a></h3>
                                 </div>
                                 <div class="titlebx">
                                    <h3>Berita Perizinan</h3>
                                 </div>
                              </div>
                           </div>
                           
						   
						   
                           <section class="post_bx small-1 clearfix">
						     <?php
								foreach($berita as $row){
							  ?>
                              <div class="bx_top clearfix">
                                 <div class="bx-data full">
                                    <div class="bx_date">
                                       <div class="bx_icon"><span class="icn_data"></span></div>
                                       <h3>02, OCT 2012</h3>
                                    </div>
                                    <a href="<?php echo base_url().'berita/view/'.$row['id_berita']?>"
                                       <h3 class="title_big"><?php echo $row['judul'] ?></h3>
                                    </a>
                                 </div>
                                 <div class="clear"></div>
                                 <div class="box bx_data bx_data2">
                                    <h3><span class="icn_user"></span>   Administrator  </h3>
                                 </div>
                              </div>
                              <a href="<?php echo base_url().'berita/view/'.$row['id_berita']?>" class="bx_img">
                                 <img alt="img" class="img thumb big" src="<?php echo $row['gambar']?>" />
                              </a>
                              <div class="post-data clearfix">
                                 <div class="clear"></div>
                                 <p class="post-dec"> <?php echo substr(strip_tags($row['isi_berita']), 0, 300)  ?> .....
								 <a href="<?php echo base_url().'berita/view/'.$row['id_berita']?>" class="orang">Continue reading</a></p>
                              </div>
                              <div class="linebottom"></div>
							   <?php
								}
								?>
                           </section>
                           
                         
                                
                                
                           <div class="bx_paging  clearfix">
                              <ul class="paging-list next-back  right">
                                 <li> <a href="#">PRIVOUS</a> </li>
                                 <li> <a href="#">NEXT</a> </li>
                              </ul>
                           </div>
                           
                           
                           
                           
                        </div>
            			<!--   //////   END LEFT CONTENTS ///   -->
            			
                        <!--  SIDEBARS -->
                        <?php echo Modules::run('front_templates/front_templates/sidebar'); ?>
                        <!--  SIDEBARS END -->
                         
        			 </div> <!--/ main cont_s12 /-->
                
                	</div><!-- /content-->
                
                </div><!-- /container-->
           				
           </div><!--main-->
           
           <div class="clear"></div>
           
           <!-- FOOTER -->
           <?php echo Modules::run('front_templates/front_templates/footer'); ?>
           <!-- FOOTER END --> 
        
    </div><!-- /wrapper/-->
   
    
    
    
    <!-- JavaScript Files
     ================================================== -->
    
    
    <script src="<?php echo base_url(); ?>front_assets/js/styleChanger/core.js"></script> 
    <script src="<?php echo base_url(); ?>front_assets/js/jquery.tweet.js" charset="utf-8"></script>
    
     <!--Flickr-->
    <script src="<?php echo base_url(); ?>front_assets/js/jflickrfeed.min.js"></script>
     
    <!--ticker-->
    <script src="<?php echo base_url(); ?>front_assets/js/jquery.ticker.js"></script>
    
    <!-- Tabs -->
    <script src="<?php echo base_url(); ?>front_assets/js/bootstrap.js"></script>
    
    <!-- Top Menu -->
    <script src="<?php echo base_url(); ?>front_assets/js/superfish.js"></script>
    
    <!-- Big Menu -->
    <script src="<?php echo base_url(); ?>front_assets/js/main-bigmenu.js"></script>
    <script src="<?php echo base_url(); ?>front_assets/js/mediaelement-and-player.js"></script>
    
    <!-- Icon Widget -->
    <script type="text/javascript" src="<?php echo base_url(); ?>front_assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>front_assets/js/functions.js"></script>
    
    <!--Plugin-Rating //-->
    <script src="<?php echo base_url(); ?>front_assets/js/jquery.MetaData.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>front_assets/js/jquery.rating.js" type="text/javascript"></script>
    
    <!--  fancyBox -->
    <script type="text/javascript" src="<?php echo base_url(); ?>front_assets/js/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>front_assets/js/fancybox/helpers/jquery.fancybox-media.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>front_assets/js/function-fancybox.js"></script>
    
    <!-- Tags -->
    <script type="text/javascript" src="<?php echo base_url(); ?>front_assets/js/tinysort.js"></script>
    
    <!-- ChangeColors -->
    <script type="text/javascript" src="<?php echo base_url(); ?>front_assets/js/styleChanger/colorpicker/colorpicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>front_assets/js/styleChanger/changer.js"></script>
    <script src="<?php echo base_url(); ?>front_assets/js/styleChanger/script.js" type="text/javascript"></script>
    
    
    
    <!--[if IE]><script src="<?php echo base_url(); ?>front_assets/js/html5shiv.js"></script> <![endif]-->
    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>front_assets/css/ie7.css" />
    <![endif]-->
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>front_assets/css/ie8.css" />
    <![endif]-->
    
    <!-- This scripts for this Page Only -->
     <!-- sldier 2-->
      <script type="text/javascript" src="<?php echo base_url(); ?>front_assets/js/jquery.eislideshow.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>front_assets/js/jquery.easing2.1.3.js"></script>
      <script type="text/javascript">
         $(function() {
			$('#ei-slider').eislideshow({
			 animation			: 'center',
			 autoplay			: true,
			 slideshow_interval	: 3000,
			 titlesFactor		: 0,
		   });
         });
      </script>
      <script src="<?php echo base_url(); ?>front_assets/js/jquery.flexslider-min.js"></script>
      <script src="<?php echo base_url(); ?>front_assets/js/custom.js"></script>
            <!--accordion	-->
      <script src="<?php echo base_url(); ?>front_assets/js/jquery.ui.widget.js"></script>
      <script src="<?php echo base_url(); ?>front_assets/js/jquery.ui.accordion.js"></script>
      <script>
         $(function() {
         	$( ".accordion" ).accordion({
         		//event:"mouseover"
         	});
         });
      </script>
      <!--End accordion-->
      <!-- javascript files ================================================== -->
      <script src="<?php echo base_url(); ?>front_assets/js/configuration.js"></script>
     <!-- javascript files ================================================== -->
    
    </body>
</html>
