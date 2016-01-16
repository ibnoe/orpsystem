<?php
$dashboard = new dashboard_model();
$this->load->view('header_view');
?>
<div role="main" class=container_12 id=content-wrapper>
    <?php $this->load->view('menu_view'); ?>                
    <div id=main_content>
        <h2 class=grid_12>Laporan</h2>
        <div class=clean></div>
        <div class=clear></div>
        <div class=grid_14>
            <div id=shortcuts-steps class="box tabbed">
                <div class=header>
                    <h3>
                        Menu Laporan
                    </h3>
                </div>
                <div class=content>



                    <form class=validate novalidate action="<?php echo site_url('home/report/proses'); ?>" method=post target="_blank">

                        <div class=content>
                            <div class=_100>
                                <p>
                                    <label>
                                        Jenis Laporan
                                    </label>
                                    <select class=required name='idrefjenisreport'>
                                        <?php foreach($this->orm->refjenisreport() as $row) { ?>
                                        <option value="<?php echo $row['idrefjenisreport']?>"> 
                                            <?php echo $row['jenisreport']; ?>
                                        </option>
                                        <?php } ?>    
                                    </select>
                                </p>
                            </div>

                            <div class="section _50">
                                <label for=datedari>
                                    Dari Tanggal
                                </label>
                                <div>
                                    <input id=datedari name='datedari' type=date class=required data-date-relative=now>
                                </div>
                            </div>

                            <div class="section _50">
                                <label for=datesampai>
                                    Sampai Tanggal
                                </label>
                                <div>
                                    <input id=datesampai name='datesampai' type=date class=required data-date-relative=now>
                                </div>
                            </div>
                            <div class="section _50">
                                <label for=date>
                                    format
                                </label>
                                <div>
                                    <select name='format'>
                                        <option value='pdf'>PDF</option>
                                        <option value='excel'>Excel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="section _50">
                                <div>
                                    <strong>
                                        *Klik Tombol Proses Dibawah Kanan 
                                    </strong>    
                                </div>
                            </div>
                        </div>

                        <div class=actions>
                            <div class=actions-left>
                                <input type='reset' value='RESET' />
                            </div>

                            <div class=actions-right>
                                <input type='submit' value=':: PROSES ::' />
                            </div>

                        </div>


<!--                        <div class=grid_14>

                            <div class=box>

                                <div class=header>

                                    <img src="img/icons/16x16/graph.png" alt="" width=16 height=16>

                                    <h3>
                                        Charts
                                    </h3>

                                    <ul>

                                        <li>
                                            <a href="#lines">
                                                Lines
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#area">
                                                Area
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#pie">
                                                Pie
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#bar">
                                                Bar
                                            </a>
                                        </li>

                                    </ul>

                                </div>

                                <div class=content>

                                    <div class="graph medium tab-content" id=lines>
                                    </div>

                                    <div class="graph medium tab-content" id=area>
                                    </div>

                                    <div class="graph medium tab-content" id=pie>
                                    </div>

                                    <div class="graph medium tab-content" id=bar>
                                    </div>

                                </div>

                            </div>

                        </div>-->

                    </form>


                </div>
            </div>
        </div>




    </div>

    <div class="push clear"></div>
</div>

<?php $this->load->view('footer_view'); ?>    