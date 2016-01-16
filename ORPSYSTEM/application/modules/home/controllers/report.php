<?php

class Report extends MX_Controller
{
    function __construct()
    {
        parent:: __construct();
        $this->checkLogin();
        Account::_valLogin();
        
        $this->orm->debug = true;
    }
    
    	public function index()
	{ 
            $this->load->model('profile_model');
            $this->load->model('dashboard_model');
            $this->output->enable_profiler(false);
          
            $profile = new profile_model();
            
            $data = array(); 
            $data['profile'] = $profile->_getProfileUser();  
            $data['lastlogs'] = $profile->_getLastLogs(); 
            $data['menu'] = 'report';
            
            //print_r($data['lastlogs']); exit;
            $this->load->view('report_view',$data);
	}
        
        
        
        public function proses() {
            $idrefjenisreport = $this->input->post('idrefjenisreport',TRUE);
            $dari = Tanggal::fieldDateSlashFromWest($this->input->post('datedari',TRUE));
            $sampai = Tanggal::fieldDateSlashFromWest($this->input->post('datesampai',TRUE));
            $format = $this->input->post('format');
            
            
            if($idrefjenisreport==1&&$format=='pdf') {
                echo '<META HTTP-EQUIV="refresh" CONTENT="0; '
                . 'URL='.  base_url().'ORP_inventory/index.php/transaksi/pengadaan/cetakDaftar/'.$dari.'/'.$sampai.'">';
            }
            
            
             if($idrefjenisreport==1&&$format=='excel') {
                echo '<META HTTP-EQUIV="refresh" CONTENT="0; '
                . 'URL='.  base_url().'ORP_inventory/index.php/transaksi/pengadaan/cetakDaftarExcel/'.$dari.'/'.$sampai.'">';
            }
            
             if($idrefjenisreport==2&&$format=='pdf') {
                echo '<META HTTP-EQUIV="refresh" CONTENT="0; '
                . 'URL='.  base_url().'ORP_inventory/index.php/transaksi/deliveryorder/cetakDaftar/'.$dari.'/'.$sampai.'">';
            }
            
            
             if($idrefjenisreport==2&&$format=='excel') {
                echo '<META HTTP-EQUIV="refresh" CONTENT="0; '
                . 'URL='.  base_url().'ORP_inventory/index.php/transaksi/deliveryorder/cetakDaftarExcel/'.$dari.'/'.$sampai.'">';
            }
            
            
            if($idrefjenisreport==3&&$format=='pdf') {
                echo '<META HTTP-EQUIV="refresh" CONTENT="0; '
                . 'URL='.  base_url().'ORP_inventory/index.php/stock/mutasistock/cetakPDF/'.$dari.'/'.$sampai.'/0">';
            }
            
            
             if($idrefjenisreport==3&&$format=='excel') {
                echo '<META HTTP-EQUIV="refresh" CONTENT="0; '
                . 'URL='.  base_url().'ORP_inventory/index.php/stock/mutasistock/cetakExcel/'.$dari.'/'.$sampai.'/0">';
            }
            if($idrefjenisreport==4&&$format=='pdf') {
                echo '<META HTTP-EQUIV="refresh" CONTENT="0; '
                . 'URL='.  base_url().'ORP_inventory/index.php/stock/stockcontrol/cetakPDF/'.$dari.'/'.$sampai.'/0">';
            }
            
            
             if($idrefjenisreport==4&&$format=='excel') {
                echo '<META HTTP-EQUIV="refresh" CONTENT="0; '
                . 'URL='.  base_url().'ORP_inventory/index.php/stock/stockcontrol/cetakPDF/'.$dari.'/'.$sampai.'/0">';
            }
            
             if($idrefjenisreport==5&&$format=='pdf') {
                echo '<META HTTP-EQUIV="refresh" CONTENT="0; '
                . 'URL='.  base_url().'ORP_Sales/index.php/quotation/quotation/cetakDaftar/'.$dari.'/'.$sampai.'/">';
            }
            
            
             if($idrefjenisreport==5&&$format=='excel') {
                echo '<META HTTP-EQUIV="refresh" CONTENT="0; '
                . 'URL='.  base_url().'ORP_Sales/index.php/quotation/quotation/cetakDaftar/'.$dari.'/'.$sampai.'/">';
             }
            
            
            
            
        }
        
        

}

?>