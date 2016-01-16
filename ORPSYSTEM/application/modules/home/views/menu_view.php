<style>
    .menu_bold {
        font-weight: bolder;
        color: #36c;
    }
    
</style>

<aside>
    <div id=sidebar_top>
        <div class=userinfo>
            <div class=info>
                <?php
                $profile_image = base_url() . 'front_assets/dashboard/img/sprites/userinfo/avatar.png';
                if ($profile['user']['image_file'] != '' OR $profile['user']['image_file'] != null) {
                    $profile_image = base_url() . 'uploads/accounts/' . $profile['user']['image_file'];
                }
                ?>
                <div class=avatar> <img src="<?php echo $profile_image; ?>" width=80 height=80 alt=""> </div>
                <a href="#"><?php echo $profile['user']['namalengkap'] ?></a> 
            </div>
            <ul class=links>
                <li> <a <?php echo ($menu=='dashboard')?'class="menu_bold"':''; ?> href="<?php echo site_url('home/dashboard') ?>">Dashboard</a> </li>
                <li> <a <?php echo ($menu=='report')?'class="menu_bold"':''; ?> href="<?php echo site_url('home/report') ?>"> Laporan </a> </li>
                <li> <a <?php echo ($menu=='setting')?'class="menu_bold"':''; ?> href="<?php echo site_url('home/setting') ?>">Setting </a> </li>
                <li>Last Login : <h3><?php echo Tanggal::formatDateTime($lastlogs['logstime']) ?> </h3> </li>
            </ul>
            <div class=clear></div>
        </div>
    </div>
</aside>