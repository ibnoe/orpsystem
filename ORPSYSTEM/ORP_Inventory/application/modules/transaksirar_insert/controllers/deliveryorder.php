<?php

class deliveryorder extends MX_Controller {

    function __construct() {
        parent:: __construct();
        $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");

       
        $this->orm->debug = true;
    }

	public function index() {
		Account::_valLogin();
        if (isset($_SESSION['message'])) {
            Message::_modal($_SESSION['message']['title'], $_SESSION['message']['content'], $_SESSION['message']['icon']);
        }

        if (isset($_SESSION['message'])) {
            Message::_modal($_SESSION['message']['title'], $_SESSION['message']['content'], $_SESSION['message']['icon']);
        }

        $data['link'] = site_url('/') . "transaksirar_insert/deliveryorder/list_data";
        $this->load->view('default', $data);
    }
	
	public function list_data(){
		Account::_valLogin();
        if (isset($_SESSION['message'])) {
            Message::_modal($_SESSION['message']['title'], $_SESSION['message']['content'], $_SESSION['message']['icon']);
        }

		$data['link'] = site_url('/') . "transaksirar_insert/deliveryorder/list_data";
		 $data['deliveryorder'] = $this->orm->deliveryorder->where('idrefstore',$_SESSION['user']['idrefstore'])->order('tanggaldo DESC, nomordo DESC');
        //$data['deliveryorder'] = $this->orm->deliveryorder->where('iddeliveryorder',$_SESSION['user']['idrefstore'])
		$this->load->view('delivery_order_list', $data);       
	}
    public function edit() {
		Account::_valLogin();
		$iddeliveryorder = $this->input->post('id', true);
		$data['link'] = site_url('/') . "transaksirar_insert/deliveryorder/list_data";
		$data['deliveryorder'] = $this->orm->deliveryorder->where('iddeliveryorder', $iddeliveryorder)->fetch();
		$data['deliveryorder_detail'] = $this->orm->deliveryorderdetail->where('iddeliveryorder',$iddeliveryorder)->order('iddeliveryorderdetail DESC');
        
		$this->load->view('delivery_order_edit', $data);
    }
	
	public function add() {
		Account::_valLogin();
		$data['link'] = site_url('/') . "transaksirar_insert/deliveryorder/list_data";
		$this->load->view('delivery_order_add', $data);
    }

    public function save() {
		$iddeliveryorder = null;
		Account::_valLogin();
        $setting_model = new Setting_model;
        $this->orm->debug = true;

        $data = array();
        $data['iddeliveryorder'] = ($iddeliveryorder == null) ? $setting_model->_getMaxId('iddeliveryorder', 'deliveryorder') : $iddeliveryorder;
        $data['nomordo'] = $this->input->post('nomordo', true);
        @$data['tanggaldo'] = $this->input->post('tanggaldo', true);
        $data['disetujui'] = $this->input->post('disetujui', true);
        $data['idpelanggan'] = $this->input->post('idpelanggan', true);

        $data['status'] = 'PROSES';
        $data['insertby'] = $_SESSION['user']['email'];
        $data['idrefstore'] = $_SESSION['user']['idrefstore'];
        $data['flag_app'] = "WEB";

    
            $iddeliveryorder = $data['iddeliveryorder'];
            $deliveryorder = $this->orm->deliveryorder();
            $ress = $deliveryorder->insert($data);
      
		
       // $this->orm->deliveryorderdetail->where('iddeliveryorder', $iddeliveryorder)->delete();
        //$this->orm->transaksibarang->where('iddeliveryorder', $iddeliveryorder)->delete();

        $idRefBarang = $this->input->post('idrefbarang');
        $jumlahBarang = $this->input->post('jumlahbarang');
        $keterangan = $this->input->post('keterangan');
        $idpackaging = $this->input->post('idpackaging');
        $expired_date = $this->input->post('expired_date', true);
       
        foreach ($idRefBarang as $key => $value) {
            $dataDetilBarang = array();
            $dataDetilBarang['iddeliveryorderdetail'] = $setting_model->_getMaxId('iddeliveryorderdetail', 'deliveryorderdetail');
            $dataDetilBarang['iddeliveryorder'] = $iddeliveryorder;
            $dataDetilBarang['idrefbarang'] = $idRefBarang[$key];
            $dataDetilBarang['idpackaging'] = $idpackaging[$key];
            $dataDetilBarang['expired_date'] = $expired_date[$key];
            $dataDetilBarang['jumlahbarang'] = $jumlahBarang[$key];
            $dataDetilBarang['keterangan'] = $keterangan[$key];

            if ($dataDetilBarang['idrefbarang'] != 0) {
                $result = $this->orm->deliveryorderdetail->insert($dataDetilBarang);
            

            $iddeliveryorderdetail = $result['iddeliveryorderdetail'];

            $dataTransaksiBarang = array();
            $dataTransaksiBarang['idtransaksibarang'] = $setting_model->_getMaxId('idtransaksibarang', 'transaksibarang');
            $dataTransaksiBarang['transaksi'] = 'KIRIM';
            $dataTransaksiBarang['tanggaltransaksi'] = $this->input->post('tanggaldo');
            $dataTransaksiBarang['idpengadaanDetail'] = 0;
            $dataTransaksiBarang['iddeliveryorderdetail'] = $iddeliveryorderdetail;
            $dataTransaksiBarang['iddeliveryorder'] = $iddeliveryorder;

            $this->orm->transaksibarang->insert($dataTransaksiBarang);
            }
        }
        
         $idPackage = $this->input->post('idpackage');
         
         foreach($idPackage as $key=>$row) {
             
             foreach($this->orm->packagedetail->where('idpackage',$row) as $row_detail) {
             
				 $refbarang = $this->orm->refbarang->where('idrefbarang',$row_detail['idrefbarang'])->fetch();
				 
		 
				$dataDetilBarang = array();
				$dataDetilBarang['iddeliveryorderdetail'] = $setting_model->_getMaxId('iddeliveryorderdetail', 'deliveryorderdetail');
				$dataDetilBarang['iddeliveryorder'] = $iddeliveryorder;
				$dataDetilBarang['idrefbarang'] = $refbarang['idrefbarang'];
				$dataDetilBarang['idpackaging'] = $refbarang['idpackaging'];
				$dataDetilBarang['jumlahbarang'] = $row_detail['jumlahbarang'];
				$dataDetilBarang['keterangan'] = $row_detail['keterangan'];

				if ($dataDetilBarang['idrefbarang'] != 0) {
					$result = $this->orm->deliveryorderdetail->insert($dataDetilBarang);
				

					$iddeliveryorderdetail = $result['iddeliveryorderdetail'];

					$dataTransaksiBarang = array();
					$dataTransaksiBarang['idtransaksibarang'] = $setting_model->_getMaxId('idtransaksibarang', 'transaksibarang');
					$dataTransaksiBarang['transaksi'] = 'KIRIM';
					$dataTransaksiBarang['tanggaltransaksi'] = $this->input->post('tanggaldo');
					$dataTransaksiBarang['idpengadaanDetail'] = 0;
					$dataTransaksiBarang['iddeliveryorderdetail'] = $iddeliveryorderdetail;
					$dataTransaksiBarang['iddeliveryorder'] = $iddeliveryorder;

					$this->orm->transaksibarang->insert($dataTransaksiBarang);
				
				}
			}
         }
        
         echo json_encode(array('response' => 'success', 'msg' => 'Tambah DO Berhasil'));	
    }
	
	public function update() {
		Account::_valLogin();
        $setting_model = new Setting_model;
        //$this->orm->debug = true;
		
        $data = array();
        $data['iddeliveryorder'] =  $this->input->post('iddeliveryorder', true);
        $data['nomordo'] = $this->input->post('nomordo', true);
        $data['tanggaldo'] = $this->input->post('tanggaldo', true);
        $data['disetujui'] = $this->input->post('disetujui', true);
        $data['idpelanggan'] = $this->input->post('idpelanggan', true);

        $data['status'] = 'PROSES';
        $data['insertby'] = $_SESSION['user']['email'];
        $data['idrefstore'] = $_SESSION['user']['idrefstore'];
        $data['flag_app'] = "WEB";

		$this->orm->deliveryorderdetail->where('iddeliveryorder',  $data['iddeliveryorder'])->delete();
        $this->orm->deliveryorder->where('iddeliveryorder',  $data['iddeliveryorder'])->delete();

		$iddeliveryorder = $data['iddeliveryorder'];
		$deliveryorder = $this->orm->deliveryorder();
		$ress = $deliveryorder->insert($data);
     
        $idRefBarang = $this->input->post('idrefbarang');
        $jumlahBarang = $this->input->post('jumlahbarang');
        $keterangan = $this->input->post('keterangan');
        $idpackaging = $this->input->post('idpackaging');
        $expired_date = $this->input->post('expired_date', true);
     //  if($idRefBarang){
        foreach ($idRefBarang as $key => $value) {
            $dataDetilBarang = array();
            $dataDetilBarang['iddeliveryorderdetail'] = $setting_model->_getMaxId('iddeliveryorderdetail', 'deliveryorderdetail');
            $dataDetilBarang['iddeliveryorder'] = $iddeliveryorder;
            $dataDetilBarang['idrefbarang'] = $idRefBarang[$key];
            $dataDetilBarang['idpackaging'] = $idpackaging[$key];
            @$dataDetilBarang['expired_date'] = $expired_date[$key];
            $dataDetilBarang['jumlahbarang'] = $jumlahBarang[$key];
            $dataDetilBarang['keterangan'] = $keterangan[$key];

           // if ($dataDetilBarang['idrefbarang'] != 0) {
                $result = $this->orm->deliveryorderdetail->insert($dataDetilBarang);
            

				$iddeliveryorderdetail = $result['iddeliveryorderdetail'];

				$dataTransaksiBarang = array();
				$dataTransaksiBarang['idtransaksibarang'] = $setting_model->_getMaxId('idtransaksibarang', 'transaksibarang');
				$dataTransaksiBarang['transaksi'] = 'KIRIM';
				@$dataTransaksiBarang['tanggaltransaksi'] = $this->input->post('tanggaldo');
				$dataTransaksiBarang['idpengadaanDetail'] = 0;
				$dataTransaksiBarang['iddeliveryorderdetail'] = $iddeliveryorderdetail;
				$dataTransaksiBarang['iddeliveryorder'] = $iddeliveryorder;

				$this->orm->transaksibarang->insert($dataTransaksiBarang);
           // }
       // }
		}
        
         $idPackage = $this->input->post('idpackage');
         
         foreach($idPackage as $key=>$row) {
             
             foreach($this->orm->packagedetail->where('idpackage',$row) as $row_detail) {
             
				 $refbarang = $this->orm->refbarang->where('idrefbarang',$row_detail['idrefbarang'])->fetch();
				 
		 
				$dataDetilBarang = array();
				$dataDetilBarang['iddeliveryorderdetail'] = $setting_model->_getMaxId('iddeliveryorderdetail', 'deliveryorderdetail');
				$dataDetilBarang['iddeliveryorder'] = $iddeliveryorder;
				$dataDetilBarang['idrefbarang'] = $refbarang['idrefbarang'];
				$dataDetilBarang['idpackaging'] = $refbarang['idpackaging'];
				$dataDetilBarang['jumlahbarang'] = $row_detail['jumlahbarang'];
				$dataDetilBarang['keterangan'] = $row_detail['keterangan'];

				if ($dataDetilBarang['idrefbarang'] != 0) {
					$result = $this->orm->deliveryorderdetail->insert($dataDetilBarang);
				

					$iddeliveryorderdetail = $result['iddeliveryorderdetail'];

					$dataTransaksiBarang = array();
					$dataTransaksiBarang['idtransaksibarang'] = $setting_model->_getMaxId('idtransaksibarang', 'transaksibarang');
					$dataTransaksiBarang['transaksi'] = 'KIRIM';
					@$dataTransaksiBarang['tanggaltransaksi'] = $this->input->post('tanggaldo');
					$dataTransaksiBarang['idpengadaanDetail'] = 0;
					$dataTransaksiBarang['iddeliveryorderdetail'] = $iddeliveryorderdetail;
					$dataTransaksiBarang['iddeliveryorder'] = $iddeliveryorder;

					$this->orm->transaksibarang->insert($dataTransaksiBarang);
				
				}
			}
         }
        
         echo json_encode(array('response' => 'success', 'msg' => 'Update DO Berhasil'));	
    }


    public function delete() {
		
		Account::_valLogin();
		$iddeliveryorder = $this->input->post('id', true);
        if ($iddeliveryorder != null) {
            $deliveryorder = $this->orm->deliveryorder->where('iddeliveryorder', $iddeliveryorder);
            $deliveryorder->delete();
            $deliveryorderdetail = $this->orm->deliveryorderdetail->where('iddeliveryorder', $iddeliveryorder);
            $ress = $deliveryorderdetail->delete();
            if($ress){
				echo json_encode(array('response' => 'success', 'msg' => 'Delete Data DO Berhasil'));		
			}else{
				echo json_encode(array('response' => 'failed', 'msg' => 'Delete Data DO Gagal'));		
			}
        }
    }

    public function cetakDaftar($idrefstore = null) {
        ini_set('memory_limit', '512M');

        //akses dari web
        if ($idrefstore == null) {
        $store = $this->orm->refstore->where('idrefstore', $_SESSION['user']['idrefstore'])->fetch();
        $data = $this->orm->deliveryorder->where('idrefstore', $_SESSION['user']['idrefstore'])->order('tanggaldo DESC');
		$email = $_SESSION['user']['email'];
        }
        //akses dari mobile
        else{
            $store = $this->orm->refstore->where('idrefstore',$idrefstore)->fetch();
            $data = $this->orm->deliveryorder->where('idrefstore', $idrefstore)->order('tanggaldo DESC');
			$email = $this->input->post('email');
        }
        $image_store = ($store['image_file']==""OR$store['image_file']==NULL)?"./front_assets/img/bizon_inventory.jpg":"./uploads/stores/".$store['image_file'];
        
        $this->load->library('TCPDF');

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
        // set document information

        $pdf->SetCreator(WEB_TITLE);
        $pdf->SetAuthor($email);
        $pdf->SetTitle("Delivery Order - " . $store['nama']);
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
<h3>Daftar Delivery Order - '.$store['nama'].'</h3>
</td><td style="text-align:right">
<img src="'.$image_store.'" width="150"><br/></td></tr></table>

  <table border="1">
 <tr><th style="text-align: center;" width="60"> No </th><th width="200" style="text-align: center;"> Nomor DO </th><th style="text-align: center;" width="140"> Tanggal DO </th><td style="text-align: center; "width="210"> Pelanggan </td><td style="text-align: center; "width="150"> Status </td><td style="text-align: center; "width="200"> Disetujui Oleh </td></tr>
';
        $no = 1;

        foreach ($data as $row) {
            $html .= "<tr><td>" . $no . "</td><td>" . $row['nomordo'] . "</td><td>" . Tanggal::formatDate($row['tanggaldo']) . "</td><td>" . $row->pelanggan['namapelanggan'] . "</td><td>" . $row['status'] . "</td><td>" . $row['disetujui'] . "</td></tr>";

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

    public function cetak($iddeliveryorder,$idrefstore = null) {

        $data = $this->orm->deliveryorder->where('iddeliveryorder', $iddeliveryorder)->fetch();

        if (count($this->orm->deliveryorder->where('iddeliveryorder', $iddeliveryorder)) == 0) {
            echo "<h3>Data Tidak Tersedia</h3>";
            exit;
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
        $pdf = new PDFDeliveryOrder(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
        // set document information

        $pdf->SetCreator(WEB_TITLE);
        $pdf->SetAuthor($email);
        $pdf->SetTitle("Delivery Order - " . $data['nomordo']);
        $pdf->SetSubject($data['nomordo']);

        $pdf->nomorDO = $data['nomordo'];
        $pdf->nomorPO = $data['nomorpo'];
        $pdf->nomorSO = $data['nomorso'];
        $pdf->tanggalDO = $data['tanggaldo'];
        $pdf->namaPelanggan = $data->pelanggan['namapelanggan'];
        $pdf->disetujui = $data['disetujui'];
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

        foreach ($this->orm->deliveryorderdetail->where('iddeliveryorder', $iddeliveryorder) as $row) {
            $html .= "<tr><td>" . $no . "</td><td>" . $row->refbarang['namabarang'] . "</td><td>" . $row['jumlahbarang'] . "</td><td>" . $row['keterangan'] . "</td></tr>";

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

        $pdf->Output("Delivery Order - " . $data['nomordo'], 'I');

//============================================================+
// END OF FILE
//============================================================+
    }

}

class PDFDeliveryOrder extends TCPDF {

    var $nomorDO;
    var $tanggalDO;
    var $nomorPO;
    var $nomorSO;
    var $namaPelanggan;
    var $disetujui;
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
<h3>Delivery Order - '.$store['nama'].'</h3>
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
        <td colspan="1" rowspan="1"  style="text-align: left; vertical-align:text-top;"> ' . $this->nomorDO . '</td>
    </tr>
    <tr>
        <td colspan="1" rowspan="1"  style="text-align: left; vertical-align:text-top;"></td>
        <td colspan="1" rowspan="1"  style="text-align: left; vertical-align:text-top;"> ' . Tanggal::fieldDate($this->tanggalDO) . '</td>
    </tr>
   

</table>

<table width="100%"><tr><td width="68%"></td><td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $this->namaPelanggan . '<br/><br/></td></tr></table> <br/> <br/>


';
        $this->writeHTML($html, true, 0, true, true);
    }

// Page footer
    public function Footer() {

        $this->disetujui = ($this->disetujui == NULL) ? '&nbsp;' : '<div style="text-align: center;">' . $this->disetujui . '</div>';

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
                . '<td width="110" style="text-align: left;"><b><u>' . $this->disetujui . '</u></b></td>'
                . '<td></td>'
                . '<td width="240" style="text-align: left;"><br/>  <b><u>' . $this->oleh . '</u></b> </td>'
                . '<td></td>'
                . '</tr>'
                . '</table>';
        $html .= '<div style="text-align: right;"></div>';
        $this->writeHTML($html, true, 0, true, true);
    }

}

?>