<?php

class Pengadaan extends MX_Controller {

    function __construct() {
        parent:: __construct();
        $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        // $this->load->helper('pdf_helper');
       Account::_valLogin(); 
       
        $this->orm->debug = true;
        $this->load->model('transaksi_model');
        
    }

    public function index() {
 
        if (isset($_SESSION['message'])) {
            Message::_modal($_SESSION['message']['title'], $_SESSION['message']['content'], $_SESSION['message']['icon']);
        }

        $data = array();
        $data['link'] = site_url('/') . "Pengadaan";

        $data['pengadaan'] = $this->orm->pengadaan->where('idrefstore',$_SESSION['user']['idrefstore'])->order('tanggalpengadaan DESC, nomorpengadaan DESC');
        //$data['pengadaan'] = $this->orm->pengadaan->where('idpengadaan',$_SESSION['user']['idrefstore']);
        $this->load->view('pengadaan_view', $data);
    }

    public function add() {
 
        $this->output->enable_profiler(FALSE);

        $data = array();
        //$pelanggan = new Pelanggan_model;               
        //$barang = new Barang_model;               
        //$deliveryOrder = new pengadaan_model;               
        //$data['pelanggan'] = $pelanggan->_loadAll();
        //$data['barang'] = $barang->_loadAll();
        //$data['auto'] = $deliveryOrder->_getAutoNumber();
        //print_r($data); exit;

        $this->load->view('pengadaan_add_view', $data);
    }

    public function edit($idpengadaan) {
 

        if (isset($_SESSION['message'])) {
            Message::_modal($_SESSION['message']['title'], $_SESSION['message']['content'], $_SESSION['message']['icon']);
        }

        $data = array();
        $data['link'] = site_url('/') . "pengadaan";
        $data['pengadaan'] = $this->orm->pengadaan->where('idpengadaan', $idpengadaan)->fetch();


        $this->load->view('pengadaan_edit_view', $data);
    }

    public function proses($idpengadaan = null) {
         
        $setting_model = new Setting_model;
        $transaksi_model = new Transaksi_model();
        
        $this->orm->debug=true;
               
        $data = array();
        $data['idpengadaan'] = ($idpengadaan == null) ? $setting_model->_getMaxId('idpengadaan','pengadaan') : $idpengadaan;
        $data['nomorpengadaan'] = $this->input->post('nomorpengadaan', true);
        $data['tanggalpengadaan'] = Tanggal::sqlDate($this->input->post('tanggalpengadaan', true));
        $data['nomorreff'] = $this->input->post('nomorreff', true);
        $data['idsupplier'] = $this->input->post('idsupplier', true);
        $data['insertby'] = $_SESSION['user']['email'];
        $data['idrefstore'] = $_SESSION['user']['idrefstore'];
        $data['flag_app'] = "WEB";
           

        if ($idpengadaan == null) {
            $idpengadaan = $data['idpengadaan'];
            $pengadaan = $this->orm->pengadaan();
            $ress = $pengadaan->insert($data);
            Message::_set((isset($ress['idpengadaan']) ? TRUE : FALSE), 'Tambah Data Barang Berhasil', 'Tambah Data Barang Gagal');
            $redirect = 'transaksi/pengadaan';
            
        } else {
            $pengadaan = $this->orm->pengadaan->where('idpengadaan', $idpengadaan);
            $ress = $pengadaan->update($data);
            Message::_set(($idpengadaan != null ? TRUE : FALSE), 'Edit Data Barang Berhasil', 'Edit Data Barang Gagal');
            $redirect = 'transaksi/pengadaan/edit/' . $idpengadaan;
        }
        
                $this->orm->pengadaandetail->where('idpengadaan',$idpengadaan)->delete();
                $this->orm->transaksibarang->where('idpengadaan',$idpengadaan)->delete();
        
            $idRefBarang = $this->input->post('idrefbarang');
            $idRefGudang = $this->input->post('idrefgudang');
            $jumlahBarang = $this->input->post('jumlahbarang');
            $keterangan = $this->input->post('keterangan');
            
            foreach($idRefBarang as $key=>$value) {
                $dataDetilBarang = array();
                $dataDetilBarang['idpengadaandetail'] = $setting_model->_getMaxId('idpengadaandetail','pengadaandetail');
                $dataDetilBarang['idpengadaan'] = $idpengadaan;
                $dataDetilBarang['idrefbarang'] = $idRefBarang[$key];
                $dataDetilBarang['idrefgudang'] = $idRefGudang[$key];
                $dataDetilBarang['jumlahbarang'] = $jumlahBarang[$key];
                $dataDetilBarang['keterangan'] = $keterangan[$key];
                
                if($dataDetilBarang['idrefbarang']!=0) {
                    $result = $this->orm->pengadaandetail->insert($dataDetilBarang);
                
                
                $idPengadaanDetail = $result['idpengadaandetail'];
                
                $dataTransaksiBarang = array();
                $dataTransaksiBarang['idtransaksibarang'] = $setting_model->_getMaxId('idtransaksibarang','transaksibarang');
                $dataTransaksiBarang['transaksi'] = 'TERIMA';
                $dataTransaksiBarang['tanggaltransaksi'] = Tanggal::sqlDate($this->input->post('tanggalpengadaan'));
                $dataTransaksiBarang['idpengadaandetail'] = $idPengadaanDetail;
                $dataTransaksiBarang['iddeliveryorderdetail'] = 0;
                $dataTransaksiBarang['idpengadaan'] = $idpengadaan;
                
                $this->orm->transaksibarang->insert($dataTransaksiBarang);
                }

            }
            
            $transaksi_model->proccessBarangMasuk($idpengadaan);
            
            redirect($redirect);
    }

    public function delete($idpengadaan = null) {
 
        if ($idpengadaan != null) {
            $pengadaan = $this->orm->pengadaan->where('idpengadaan', $idpengadaan);
            $pengadaan->delete();
            $pengadaandetail = $this->orm->pengadaandetail->where('idpengadaan', $idpengadaan);
            $pengadaandetail->delete();
            Message::_set(TRUE, 'Hapus Data Pengadaan Berhasil', 'Hapus Data Pengadaan Gagal');
        }

        redirect('transaksi/pengadaan');
    }
    
    public function cetakDaftar($dari,$sampai,$idrefstore = null) {

        $dari = Tanggal::sqlDate($dari);
        $sampai = Tanggal::sqlDate($sampai);
        
        //check from WEB
        if ($idrefstore == null) {
            $store = $this->orm->refstore->where('idrefstore', $_SESSION['user']['idrefstore'])->fetch();
            $data = $this->orm->pengadaan->where('idrefstore = ? AND tanggalpengadaan between ? AND ? ', $_SESSION['user']['idrefstore'],$dari,$sampai)->order('tanggalPengadaan DESC');
            $email = $_SESSION['user']['email'];
        }//from mobile
        else{
            $store = $this->orm->refstore->where('idrefstore', $idrefstore)->fetch();
            $data = $this->orm->pengadaan->where('idrefstore = ? AND tanggalpengadaan between ? AND ?', $idrefstore,$dari,$sampai)->order('tanggalPengadaan DESC');
            $email = $this->input->post('email');
        }
		
          $image_store = ($store['image_file']==""OR$store['image_file']==NULL)?"./front_assets/img/bizon_inventory.jpg":"./uploads/stores/".$store['image_file'];
      
        
        ini_set('memory_limit', '512M');

        $this->load->library('TCPDF');

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
        // set document information

        $pdf->SetCreator(WEB_TITLE);
        $pdf->SetAuthor($email);
        $pdf->SetTitle("Pengadaan - " . $store['nama']);
        $pdf->SetSubject($store['nama']);



        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        //set margins
        $pdf->SetMargins(5, 10, 5);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        //set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        //set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, 80);

        //set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, 80);

        //set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // ---------------------------------------------------------
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        // use the font
        $pdf->SetFont('times', '', 10, '', false);

        // Add a page
        $pdf->AddPage('L');
        // Set some content to print

        $html = '
            
<style>
body {
letter-spacing:5px;
}      
</style> 
	<style type="text/css">
.rotate-text
 {

/* Safari */
-webkit-transform: rotate(-90deg);

/* Firefox */
-moz-transform: rotate(-90deg);

/* IE */
-ms-transform: rotate(-90deg);

/* Opera */
-o-transform: rotate(-90deg);

/* Internet Explorer */
filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);

}
.border-table{
	border:0.5px solid #000;
		
}

table {
padding-top:2px;
}

</style>
	
<body>
<table><tr><td>
<h3>Daftar Pengadaan - '.$store['nama'].'</h3>
    '.'<h4> Periode '.Tanggal::formatDate($dari).' s.d '.Tanggal::formatDate($sampai).' </h4>
</td><td style="text-align:right">
<img src="'.$image_store.'" width="150"><br/></td></tr></table>
  <table border="1">
 <tr><th style="text-align: center;" width="60"> No </th><th width="200" style="text-align: center;"> Nomor Pengadaan </th><th style="text-align: center;" width="180"> Tanggal Pengadaan </th><td style="text-align: center; "width="300"> Supplier </td></tr>
';
        $no = 1;

        foreach ($data as $row) {
            $html .= "<tr><td>" . $no . "</td><td>" . $row['nomorpengadaan'] . "</td><td>" . Tanggal::formatDate($row['tanggalpengadaan']) . "</td><td>" . $row->supplier['namasupplier'] . "</td></tr>";

            $no++;
        }

        $html .=
                '</table>
</body>';
//print_r($html); exit;
// Print text using writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
//$pdf->writeHTML($html, true, 0, true, true);
// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.

        $pdf->Output("Daftar Delivery Order", 'I');

//============================================================+
// END OF FILE
//============================================================+
    }
    

    
    public function cetak($idpengadaan,$idrefstore = null) {

        $data = $this->orm->pengadaan->where('idpengadaan', $idpengadaan)->fetch();
        
        if(count($this->orm->pengadaan->where('idpengadaan', $idpengadaan))==0) {
            echo "<h3>Data Tidak Tersedia</h3>"; exit;
        }
		
		//check from web
        if($idrefstore==null){
            $email = $_SESSION['user']['email'];
            $idrefstore = $_SESSION['user']['idrefstore'];
        }else{//from mobile
            $email = $this->input->post('email');
        }
        
        ini_set('memory_limit', '512M');

        $this->load->library('TCPDF');

        // create new PDF document
        $pdf = new PDFpengadaan(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
        // set document information

        $pdf->SetCreator(WEB_TITLE);
        $pdf->SetAuthor($email);
        $pdf->SetTitle("Pengadaan - " . $data['nomorpengadaan']);
        $pdf->SetSubject($data['nomorpengadaan']);


        $pdf->tanggalpengadaan = $data['tanggalpengadaan'];
        $pdf->namasupplier = $data->supplier['namasupplier'];
        $pdf->oleh = $email;
         $pdf->store = $this->orm->refstore->where('idrefstore', $idrefstore)->fetch();

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        //set margins
        $pdf->SetMargins(5, 63, 5);
        $pdf->SetHeaderMargin(14);
        $pdf->SetFooterMargin(80);

        //set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, 80);

        //set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, 80);

        //set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // ---------------------------------------------------------
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        // use the font
        $pdf->SetFont('times', '', 10, '', false);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $resolution = array(310, 210);
        $pdf->AddPage('L', $resolution);
        // Set some content to print

        $html = '
            
<style>
body {
letter-spacing:5px;
}      
</style> 
	<style type="text/css">
.rotate-text
 {

/* Safari */
-webkit-transform: rotate(-90deg);

/* Firefox */
-moz-transform: rotate(-90deg);

/* IE */
-ms-transform: rotate(-90deg);

/* Opera */
-o-transform: rotate(-90deg);

/* Internet Explorer */
filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);

}
.border-table{
	border:0.5px solid #000;
		
}

table {
padding-top:2px;
}

</style>
	
<body>

  <table border="1">
 <tr><th style="text-align: center;" width="60"> No </th><th width="180" style="text-align: center;"> Nama Barang </th><th style="text-align: center;" width="100"> Jumlah </th><td style="text-align: center; "width="500"> Keterangan </td></tr>
';
        $no = 1;

        foreach ($this->orm->pengadaandetail->where('idpengadaan', $idpengadaan) as $row) {
            $html .= "<tr><td>".$no."</td><td>".$row->refbarang['namabarang']."</td><td>".$row['jumlahbarang']."</td><td>".$row['keterangan']."</td></tr>";
            
            $no++;
        }

        $html .=
                '</table>
</body>';
//print_r($html); exit;
// Print text using writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
//$pdf->writeHTML($html, true, 0, true, true);
// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.

        $pdf->Output("Pengadaan - " . $data['nomorpengadaan'], 'I');

//============================================================+
// END OF FILE
//============================================================+
    }
    
}

class PDFpengadaan extends TCPDF {

    var $nomorpengadaan;
    var $tanggalpengadaan;
    var $namasupplier;
    var $oleh;
    var $store;

//Page header
    public function Header() {
  
           $store = $this->store;
        
        $image_store = ($store['image_file']==""OR$store['image_file']==NULL)?"./front_assets/img/bizon_inventory.jpg":"./uploads/stores/".$store['image_file'];
      
        
        $html = '
<style>
    table {
        letter-spacing:5px;
        padding-top:1px;
    }      
</style>      
<table><tr><td>
<h3>Pengadaan Barang - '.$store['nama'].'</h3>
</td><td style="text-align:right">
<img src="'.$image_store.'" width="150"><br/></td></tr></table>
<table width="100%">
    <tr>
        <td colspan="6" width="99%"><br/></td>
    </tr>
    <tr>
        <td colspan="2" rowspan="2" style="text-align: left; vertical-align:text-top;"><h2></h2></td>
        <td colspan="2" rowspan="2" style="text-align: left; vertical-align:text-top;"></td>
        <td colspan="1" rowspan="1"  style="text-align: left; vertical-align:text-top;"></td>
        <td colspan="1" rowspan="1"  style="text-align: left; vertical-align:text-top;"> ' . $this->nomorpengadaan . '</td>
    </tr>
    <tr>
        <td colspan="1" rowspan="1"  style="text-align: left; vertical-align:text-top;"></td>
        <td colspan="1" rowspan="1"  style="text-align: left; vertical-align:text-top;"> ' . Tanggal::fieldDate($this->tanggalpengadaan) . '</td>
    </tr>
    <tr>
        <td colspan="2" rowspan="1"  style="text-align: left; vertical-align:text-top;"> ' . $this->namasupplier . '</td>
    </tr>
    

</table>



';
        $this->writeHTML($html, true, 0, true, true);
    }

// Page footer
    public function Footer() {

    
        $html = "
<style>
    table {
        letter-spacing:5px;
    }      
</style>                 

<table width='100%'>"
                . "<tr>"
                . '<td style="text-align: center;"></td>'
                . '<td></td>'
                . '<td style="text-align: center;"></td>'
                . '<td></td>'
                . '<td width="120" style="text-align: center;"></td>'
                . '<td></td>'
                . '<td style="text-align: center;"></td>'
                . '<td></td>'
                . '</tr>';
        $html .= '<tr>'
                . '<td style="text-align: left;"><br/><br/><br/><br/></td>'
                . '<td></td>'
                . '<td style="text-align: left;"><br/><br/><br/><br/></td>'
                . '<td></td>'
                . '<td width="120" style="text-align: left;"><br/><br/><br/><br/></td>'
                . '<td></td>'
                . '<td  style="text-align: left;"><br/><br/><br/><br/></td>'
                . '<td></td>'
                . '</tr>';
        $html .= '<tr>'
                . '<td style="text-align: left;"></td>'
                . '<td></td>'
                . '<td style="text-align: left;"></td>'
                . '<td></td>'
                . '<td width="100" style="text-align: left;"><b>&nbsp;&nbsp;&nbsp;&nbsp;<u> </u></b></td>'
                . '<td></td>'
                . '<td width="250" style="text-align: left;"> <b><u>' . $this->oleh . '</u></b> </td>'
                . '<td></td>'
                . '</tr>'
                . '</table>';
        $html .= '<div style="text-align: right;"></div>';
        $this->writeHTML($html, true, 0, true, true);
    }

}

?>