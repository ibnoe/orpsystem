<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Stockcard extends MX_Controller {

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
        $this->load->view('stockcard_view'); 
    }
    
    
    function cetakPDF($tanggal_dari, $tanggal_sampai, $idRefBarang = 0) {

         ini_set('memory_limit', '512M');


         $this->output->enable_profiler(FALSE);

         $this->load->library('TCPDF');

         $stock = new stock_model();
        
         $store = $this->orm->refstore->where('idrefstore', $_SESSION['user']['idrefstore'])->fetch();
        
         $image_store = ($store['image_file']==""OR$store['image_file']==NULL)?"./front_assets/img/bizon_inventory.jpg":"./uploads/stores/".$store['image_file'];
       
         $data = $stock->_loadMutasi($tanggal_dari, $tanggal_sampai, $idRefBarang);
         $barang = $this->orm->refbarang->where('idrefbarang',$idRefBarang)->fetch();
         //print_r(json_encode($data)); exit;
         // create new PDF document
         $pdf = new PDFLaporanRekapitulasi(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
         // set document information

         $pdf->SetCreator(WEB_TITLE);
         $pdf->SetAuthor($this->session->userdata('email'));
         $pdf->SetTitle("Laporan Surat Jalan");
         $pdf->SetSubject('Laporan Surat Jalan');

         $pdf->tanggal_dari = $tanggal_dari;
         $pdf->tanggal_sampai = $tanggal_sampai;
         $pdf->namaBarang = $barang['namabarang'];
         $pdf->jenisBarang = $barang->refjenisbarang['jenisbarang'];
         $pdf->namaStore = $store['nama'];
         $pdf->image = $image_store;

         // set header and footer fonts
         $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
         $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

         // set default monospaced font
         $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

         //set margins
         $pdf->SetMargins(5, 68, 5);
         $pdf->SetHeaderMargin(15);
         $pdf->SetFooterMargin(25);

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



         $html .= ' 
  <table cellpadding="0" cellspacing="0" class="border">
  <tr class="border">
  <th width="80" class="border" style="text-align: center;"><b>Tanggal</b></th>
  <th width="300" class="border" style="text-align: center;" ><b>Keterangan</b></th>
  <th class="border" style="text-align: center; "><b>No. DO </b></th>
  <th class="border" style="text-align: center; "><b>No. BPB</b></th>
  <th width="80" class="border" style="text-align: center; "><b>JUMLAH</b></th>
  <th width="80" class="border" style="text-align: center; "><b>SISA</b></th></tr>
';
         $no = 1;

         
         
         if (!empty($data)) {
             
             $tgl_stock_awal = strtotime ( '-1 day' , strtotime($data[0]['tanggaltransaksi']) ) ;
             $html .= '<tr>'
                         . '<td style="text-align: center;"> ' . Tanggal::fieldDate(date('Y-m-d',$tgl_stock_awal)) . ' </td>'
                         . '<td style="text-align: left;"> </td>'
                         . '<td style="text-align: left;"> </td>'
                         . '<td style="text-align: left;"> </td>'
                         . '<td style="text-align: right;"> </td>'
                         . '<td style="text-align: right;"> ' . number_format($data[0]['stockawalkirim'],0,',','.') . '</td></tr>';
             
             
             foreach ($data as $row) {

                 $keterangan = '';

                 if ($row['transaksi'] == 'KIRIM') {
                     $keterangan = 'Dikirim Ke ' . $row['namapelanggan'];
                 }
                 elseif ($row['transaksi'] == 'TERIMA') {
                     $keterangan = 'Diterima Dari ' . $row['namasupplier'];
                 }

                 $saw = $stock->_getSaldoAwalBarang($idRefBarang, null, null, $row['idtransaksibarang']);
                 $kirim = ($row['jumlahkirim'] == null) ? 0 : $row['jumlahkirim'];
                 $terima = ($row['jumlahterima'] == null) ? 0 : $row['jumlahterima'];


                 $saldo = $saw;

                 $saldo = $saldo + $terima;
                 $saldo = $saldo - $kirim;
                 
                 if($kirim==0)  { $kirim = null; }
                 if($terima==0)  { $terima = null; }
                 
                 $html .= '<tr>'
                         . '<td style="text-align: center;"> ' . Tanggal::fieldDate($row['tanggaltransaksi']) . ' </td>'
                         . '<td style="text-align: left;"> ' . $keterangan . '</td>'
                         . '<td style="text-align: left;"> ' . $row['nomordo'] . '</td>'
                         . '<td style="text-align: left;"> ' . $row['nomorpengadaan'] . '</td>'
                         . '<td style="text-align: right;"> ' . $kirim . $terima . '</td>'
                         . '<td style="text-align: right;"> ' . $saldo . '</td></tr>';

                 $no++;
             }
         }



         $html .=
                 '</table>';

         $html .= '<br/> <br/> <br/> <hr/> <div style="text-align: center"> Akhir Laporan </div> </body>';


//print_r($html); exit;
         // Print text using writeHTMLCell()

         $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

         // ---------------------------------------------------------
         // Close and output PDF document
         // This method has several options, check the source code documentation for more information.

         $pdf->Output("Kartu Stock $tanggal_dari _ $tanggal_sampai _ {$barang['namabarang']}.pdf", 'I');

         //============================================================+
         // END OF FILE
         //============================================================+

         
     }
   
        
    
  
}



class PDFLaporanRekapitulasi extends TCPDF {

     var $tanggal_dari;
     var $tanggal_sampai;
     var $namaBarang;
     var $jenisBarang;
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
  </h2><h2>'.$this->namaStore.' - KARTU STOCK</h2>
    <p> 
    
    PERIODE : ' . $this->tanggal_dari . ' s/d ' . $this->tanggal_sampai . '</p>
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
    <table>
     <tr><td width="120">NAMA BARANG </td><td width="30"> : </td><td>' . $this->namaBarang . '</td></tr>
     <tr><td width="120">JENIS BARANG </td><td width="30"> : </td><td>' . $this->jenisBarang . '</td></tr>
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
