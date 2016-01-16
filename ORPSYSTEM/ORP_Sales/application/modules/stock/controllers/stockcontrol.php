<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Stockcontrol extends MX_Controller {

    function __construct() {
        parent:: __construct();
        $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        // $this->load->helper('pdf_helper');
        $this->load->model('stock_model');
        $this->orm->debug = true;
    }
    
    
    public function index() {
        Account::_valLogin();
        $this->load->view('stockcontrol_view'); 
    }
    
    
    function cetakPDF() {

         ini_set('memory_limit', '512M');


         $this->output->enable_profiler(FALSE);
         $this->load->library('TCPDF');

         $stock = new stock_model();
        
         $store = $this->orm->refstore->where('idrefstore', $_SESSION['user']['idrefstore'])->fetch();
        
         $image_store = ($store['image_file']==""OR$store['image_file']==NULL)?"./front_assets/img/bizon_inventory.jpg":"./uploads/stores/".$store['image_file'];
       
         //print_r(json_encode($data)); exit;
         // create new PDF document
         $pdf = new PDFLaporanRekapitulasi(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
         // set document information

         $pdf->SetCreator(WEB_TITLE);
         $pdf->SetAuthor($this->session->userdata('email'));
         $pdf->SetTitle("Laporan Stock Control");
         $pdf->SetSubject('Laporan Stock Control');

         $pdf->namaStore = $store['nama'];
         $pdf->image = $image_store;

         // set header and footer fonts
         $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
         $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

         // set default monospaced font
         $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

         //set margins
         $pdf->SetMargins(5, 45, 5);
         $pdf->SetHeaderMargin(10);
         $pdf->SetFooterMargin(10);

         //set auto page breaks
         $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

         //set image scale factor
         $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

         // ---------------------------------------------------------
         // set default font subsetting mode
         $pdf->setFontSubsetting(true);

         // Set font
         // dejavusans is a UTF-8 Unicode font, if you only need to
         // print standard ASCII chars, you can use core fonts like
         // helvetica or times to reduce file size.
         $fontname = $pdf->addTTFfont('./Tahoma.ttf', 'TrueTypeUnicode', '', 96);

         // use the font
         $pdf->SetFont($fontname, '', 10, '', false);

         // Add a page
         // This method has several options, check the source code documentation for more information.
         $pdf->AddPage('L');
         // Set some content to print

         $html = '
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

table.border {
	border-width: 1px;
	border-spacing: 2px;
	border-style: outset;
	border-color: gray;
	border-collapse: separate;
	background-color: white;
        border:0.5px solid #000;
}

table.border th {
	border-width: 1px;
	padding: 1px;
	border-style: outset;
	border-color: gray;
	background-color: white;
	-moz-border-radius: ;
        border:0.5px solid #000;
}

table.border td {
	border-width: 0px;
	padding: 3px 3px3px 3px;
	border-style: inline;
	border-color: gray;
	background-color: white;
	-moz-border-radius: ;
        padding-left : 3px;
        padding-right : 3px;
}

table.border tr {
	border-width: 1px;
	padding: 1px;
	border-style: outset;
	border-color: gray;
	background-color: white;
	-moz-border-radius: ;
}
</style>
	
<body> ';


$html .= '<table class="border" width="100%">
                            <thead>
                                <tr>
                                    <th width="35"><b>No</b></th>
                                    <th><b>Kode Barang</b></th>
                                    <th width="280"><b>Nama Barang</b></th>
                                    <th><b>Jenis Barang</b></th>
                                    <th width="80"><b>Stock Awal</b></th>
                                    <th width="80"><b>Stock</b></th>
                                    <th><b>Gudang</b></th>
                                </tr>
                            </thead>
                            <tbody>'; 
                              
                                $no = 1;
                                foreach ($this->orm->refbarang->where('idrefstore',$_SESSION['user']['idrefstore'])->order('kodebarang ASC') as $row) {
                                  $refjenisbarang = $this->orm->refjenisbarang->where('idrefjenisbarang',$row['idrefjenisbarang'])->fetch();
                                   
                                $html .=   '<tr>
                                        <td width="35">'.$no.'</td>
                                        <td>'.$row['kodebarang'].'</td>
                                        <td width="280">'.$row['namabarang'].'</td>
                                        <td>'.$refjenisbarang['jenisbarang'].'</td>
                                        <td width="80">'.$row['stockawal'].'</td>
                                        <td width="80">'.$row['stock'].'</td>
                                        <td>'.$row->refgudang['namagudang'].'</td>
                                    </tr>';
                                  
                                    $no++;
                               } 
                                
                   $html  .='</tbody>      
                        </table>';
         
  $html .='</body>';       
//print_r($html); exit;
         // Print text using writeHTMLCell()

         $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
         // ---------------------------------------------------------
         // Close and output PDF document
         // This method has several options, check the source code documentation for more information.

         $pdf->Output("Laporan Stock Control.pdf", 'I');

         //============================================================+
         // END OF FILE
         //============================================================+         
     }
   
        
    
  
}



class PDFLaporanRekapitulasi extends TCPDF {

     var $namaStore;
     var $image;

     //Page header
     public function Header() {
         //$fontname = $this->addTTFfont('./Tahoma.ttf', 'TrueTypeUnicode', '', 96);

         // use the font
         $this->SetFont('times', '', 10, '', false);
         $html = '<table width="100%">
  <tr>
    <td width="50%"  style="text-align: left; vertical-align:text-top;"><h2> <img src="'.$this->image.'" width="150">
  </h2><h2>'.$this->namaStore.' - Stock Control</h2>
   
    </td>
    <td width="5%"   style="text-align: left; vertical-align:text-top;">&nbsp;</td>
    <td width="35%"   style="text-align: left; vertical-align:text-top;">     
    <table>
    <tr><td width="30%" style="text-align: right;"> Tanggal</td><td width="10%"> : </td><td width="60%"> ' . date('d-m-Y') . '</td></tr>
    <tr><td width="30%"  style="text-align: right;"> Jam</td><td width="10%"> : </td><td width="60%"> ' . date('H:i') . '</td></tr>
    <tr><td width="30%" style="text-align: right;"> Halaman</td><td width="10%"> : </td><td width="60%"> ' . $this->PageNo() . '</td></tr>
    </table>
</td>
  </tr> 
 
  </table>
<hr>
   
';
         $this->writeHTML($html, true, 0, true, true);
     }

     // Page footer
     public function Footer() {
         $fontname = $this->addTTFfont('./Tahoma.ttf', 'TrueTypeUnicode', '', 96);

         // use the font
         $this->SetFont($fontname, '', 10, '', false);
         $html = '<div style="text-align: right;"> Hal ' . $this->PageNo() . '</div>';
         $this->writeHTML($html, true, 0, true, true);
     }

 }
