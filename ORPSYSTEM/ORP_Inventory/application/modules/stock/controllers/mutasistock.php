<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Mutasistock extends MX_Controller {

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
        $this->load->view('mutasistock_view'); 
    }
    
    function cetakPDF($tanggal_dari, $tanggal_sampai, $idRefBarang1 = 0) {

         ini_set('memory_limit', '512M');


         $this->output->enable_profiler(FALSE);

         $this->load->library('TCPDF');

         $stock = new stock_model();
         $store = $this->orm->refstore->where('idrefstore', $_SESSION['user']['idrefstore'])->fetch();
        
         $image_store = ($store['image_file']==""OR$store['image_file']==NULL)?"./front_assets/img/bizon_inventory.jpg":"./uploads/stores/".$store['image_file'];
       

         if ($idRefBarang1 != 0) {
             $data = $stock->_loadMutasiStock($tanggal_dari, $tanggal_sampai, $idRefBarang1);
         }
         else {
             $data = $stock->_loadMutasiStock($tanggal_dari, $tanggal_sampai);
         }


        // print_r(json_encode($data)); exit;
         // create new PDF document
         $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
         // set document information

         $pdf->SetCreator(WEB_TITLE);
         $pdf->SetAuthor($this->session->userdata('username'));
         $pdf->SetTitle("Laporan Surat Jalan");
         $pdf->SetSubject('Laporan Surat Jalan');

         $pdf->tanggal_dari = $tanggal_dari;
         $pdf->tanggal_sampai = $tanggal_sampai;

         // set header and footer fonts
         $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
         $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

         // set default monospaced font
         $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

         //set margins
         $pdf->SetMargins(5, 10, 5);
         $pdf->SetHeaderMargin(5);
         $pdf->SetFooterMargin(5);

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
       
         // use the font
         $pdf->SetFont("Times", '', 11, '', false);

         // Add a page
         // This method has several options, check the source code documentation for more information.
         $pdf->AddPage('L');
         // Set some content to print


         
         $html = '	
<body> ';

         $no = 1;


         $html .= '
             <table><tr><td>
<h3>Daftar Delivery Order - '.$store['nama'].'</h3>
</td><td style="text-align:right">
<img src="'.$image_store.'" width="150"><br/></td></tr></table>
             <table width="100%">
  <tr>
    <td width="100%"  style="text-align: center; vertical-align:text-top;"><h2>LAPORAN MUTASI STOCK</h2>
    <p><b>PERIODE : ' . Tanggal::formatDate(Tanggal::sqlDate($tanggal_dari)) . ' s/d ' . Tanggal::formatDate(Tanggal::sqlDate($tanggal_sampai)) . '</b></p>
    </td>
  </tr> 
 
  </table>
  <table cellpadding="5" cellspacing="1" class="border" border="1" width="100%">
  <tr style="text-align:center"><td width="70">No</td><td width="400">Nama Barang</td><td width="90">Stock Awal</td><td width="90">Barang Masuk</td><td width="90">Barang Keluar</td><td width="90">Saldo</td><td width="100">Satuan</td></tr>
  ';


         if (!empty($data)) {
             foreach ($data as $row) {

                 $idrefbarang = $row['idrefbarang'];

                 $row['jumlahKirim'] = $stock->_getJumlahKirim($idrefbarang, $tanggal_dari, $tanggal_sampai);
                 $row['jumlahTerima'] = $stock->_getJumlahTerima($idrefbarang, $tanggal_dari, $tanggal_sampai);

                 // $saw = $master->_getSaldoAwalBarang($idBarang, $tanggal_dari, $tanggal_sampai, $row['idTransaksiBarang']);
                 $kirim = ($row['jumlahKirim'] == null) ? 0 : $row['jumlahKirim'];
                 $terima = ($row['jumlahTerima'] == null) ? 0 : $row['jumlahTerima'];

                
                 

                 $saldo = $row['stockawal'];

                 $saldo = $saldo + $terima;
                 $saldo = $saldo - $kirim;


                 $html .= '<tr>'
                         . '<td class="border" style="text-align: center;" > ' . $no . ' </td>'
                         . '<td class="border"  style="text-align: left;"> ' . $row['namabarang'] . '</td>'
                         . '<td class="border" style="text-align: right;"> ' . $row['stockawal'] . ' </td>'
                         . '<td class="border" style="text-align: right;"> ' . $terima . ' </td>'
                         . '<td class="border" style="text-align: right;"> ' . $kirim . '</td>'
                         . '<td class="border" style="text-align: right;"> ' . $saldo . '</td>'
                         . '<td class="border" style="text-align: right;"> ' . $row['namasatuan'] . '</td></tr>';
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

         $pdf->Output("Laporan Mutasi Stock $tanggal_dari _ $tanggal_sampai.pdf", 'I');

         //============================================================+
         // END OF FILE
         //============================================================+
     }
   
        
    
  
}
