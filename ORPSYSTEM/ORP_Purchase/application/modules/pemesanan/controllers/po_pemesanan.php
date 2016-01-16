<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class po_pemesanan extends MX_Controller {

	function __construct() {
        parent:: __construct();
        $this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");

        Account::_valLogin();
        $this->orm->debug = true;
        $this->load->model('quotationsales','',TRUE);
        $this->load->model('quotationsalesdetail','',TRUE);
        $this->load->model('refbarang','',TRUE);
    }

    public function index($cetak = false, $idquotationsales = null) {

    	if (isset($_SESSION['message'])) {
            Message::_modal($_SESSION['message']['title'], $_SESSION['message']['content'], $_SESSION['message']['icon']);
        }

		$data = array();
        $data['link'] = base_url()."index.php/quotation";
        $data['cetak'] = $cetak;
        $data['idquotationsales'] = $idquotationsales;
        $data['quotationsalesdisapproved'] = $this->orm->quotationsales->where('idrefstore', $_SESSION['user']['idrefstore'])->where('idrefstatus', 2)->order('tanggal DESC, nomor DESC');
        $data['quotationsalesapproved'] = $this->orm->quotationsales->where('idrefstore', $_SESSION['user']['idrefstore'])->where('idrefstatus', 4)->order('tanggal DESC, nomor DESC');
        $data['daftarjenispembayaran'] = $this->orm->quotationsales;
		$this->load->view('po_pemesanan_view', $data); 
    }

     public function proses($idquotationsales = null) {
        if ($idquotationsales == null) {
            //do nothing
            $redirect = 'pemesanan/po_pemesanan';
        } else {
            $dataUpdateQuotation = array(
                'idrefstatus' => 4
            );
            $this->quotationsales->update($idquotationsales, $dataUpdateQuotation);
            Message::_set(($idquotationsales != null ? TRUE : FALSE), 'Edit Data Quotation Berhasil', 'Edit Data Quotation Gagal');
            $redirect = 'pemesanan/po_pemesanan';
        }
        redirect($redirect);
    }

    public function prosesapproved($idquotationsales = null) {
        if ($idquotationsales == null) {
            //do nothing
            $redirect = 'pemesanan/po_pemesanan';
        } else {
            $dataUpdateQuotation = array(
                'idrefstatus' => 5
            );
            $this->quotationsales->update($idquotationsales, $dataUpdateQuotation);
            Message::_set(($idquotationsales != null ? TRUE : FALSE), 'Edit Data Quotation Berhasil', 'Edit Data Quotation Gagal');
            $redirect = 'pemesanan/po_pemesanan';
        }
        redirect($redirect);
    }

    public function delete($idquotationsales = null) {
        if ($idquotationsales != null) {
            $quotation = $this->orm->quotationsales->where('idquotationsales', $idquotationsales);
            $quotation->delete();
            $quotationdetail = $this->orm->quotationsalesdetail->where('idquotationsales', $idquotationsales);
            $quotationdetail->delete();
            Message::_set(TRUE, 'Hapus Data Quotation Berhasil', 'Hapus Data Quotation Gagal');
        }
        redirect('pemesanan/po_pemesanan');
    }
    
    public function batal($idquotationsales = null) {
        if ($idquotationsales != null) {
            $dataUpdateQuotation = array(
                'idrefstatus' => 3
            );
            $this->quotationsales->update($idquotationsales, $dataUpdateQuotation);
            Message::_set(TRUE, 'Membatalkan Data Quotation Berhasil', 'Membatalkan Data Quotation Gagal');
        }
        redirect('pemesanan/po_pemesanan');
    }

    public function batalapproved($idquotationsales = null) {
        if ($idquotationsales != null) {
            $dataUpdateQuotation = array(
                'idrefstatus' => 6
            );
            $this->quotationsales->update($idquotationsales, $dataUpdateQuotation);
            Message::_set(TRUE, 'Membatalkan Data Quotation Berhasil', 'Membatalkan Data Quotation Gagal');
        }
        redirect('pemesanan/po_pemesanan');
    }

    public function rollback($idquotationsales = null) {
        if ($idquotationsales != null) {
            $dataUpdateQuotation = array(
                'idrefstatus' => 2
            );
            $this->quotationsales->update($idquotationsales, $dataUpdateQuotation);
            Message::_set(TRUE, 'Mengembalikan Data Quotation Berhasil', 'Mengembalikan Data Quotation Gagal');
        }
        redirect('pemesanan/po_pemesanan');
    }
    
    public function ajaxEdit($idquotationsales = null) {

        if ($idquotationsales != null) {
            $quotationsales = $this->quotationsales->findById($idquotationsales);
            $quotationsalesdetail = $this->quotationsalesdetail->findByQuotationSalesId($idquotationsales);

            $post_data = array();
            foreach ($quotationsales as $rowsales) {
                $post_data2 = 
                array(
                    'idquotationsales' => trim($rowsales->idquotationsales),
                    'nomor' => trim($rowsales->nomor),
                    'tanggal' => trim($rowsales->tanggal),
                    'idpelanggan' => trim($rowsales->idpelanggan),
                    'idrefstore' => trim($rowsales->idrefstore),
                    'status' => trim($rowsales->status),
                    'insertby' => trim($rowsales->insertby),
                    'flag_app' => trim($rowsales->flag_app),
                    'dibuat_oleh' => trim($rowsales->dibuat_oleh),
                    'idrefstatus' => trim($rowsales->idrefstatus),
                    'idrefjenispembayaran' => trim($rowsales->idrefjenispembayaran)
                );
                array_push($post_data, $post_data2);
            }

            $post_data3 = array();
            foreach ($quotationsalesdetail as $rowsalesdetail) {
                $post_data4 = 
                array(
                    'idquotationsales' => trim($rowsalesdetail->idquotationsales),
                    'idrefbarang' => trim($rowsalesdetail->idrefbarang),
                    'jumlahbarang' => trim($rowsalesdetail->jumlahbarang),
                    'keterangan' => trim($rowsalesdetail->keterangan),
                    'idquotationsalesdetail' => trim($rowsalesdetail->idquotationsalesdetail),
                    'hargasatuan' => trim($rowsalesdetail->hargasatuan),
                    'namabarangtext' => trim($rowsalesdetail->namabarangtext)
                );
                array_push($post_data3, $post_data4);
            }

            $data = json_encode(array(
                        'status' => 'SUCCESS',
                        'content' => 
                            array(
                                'sales' => $post_data,
                                'salesdetail' => $post_data3
                            )
                    ));
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output($data);
        } else {
            $data = json_encode(array(
                        'status' => 'FAILED',
                        'content' => 'FAILED'
                    ));
            $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output($data);
        }

    }

    public function cetakDaftar($idrefstore=null) {
        ini_set('memory_limit', '512M');

        //akses dari web
        if ($idrefstore == null) {
            $store = $this->orm->refstore->where('idrefstore', $_SESSION['user']['idrefstore'])->fetch();
            $data = $this->orm->quotationsales->where('idrefstore', $_SESSION['user']['idrefstore'])->order('tanggal DESC');
        }
        //akses dari mobile
        else {
            $store = $this->orm->refstore->where('idrefstore', $idrefstore)->fetch();
            $data = $this->orm->quotationsales->where('idrefstore', $idrefstore)->order('tanggal DESC');
        }
        $image_store = ($store['image_file'] == ""OR$store['image_file'] == NULL) ? "./front_assets/img/bizon_inventory.jpg" : "./uploads/stores/" . $store['image_file'];

        $this->load->library('TCPDF');

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
        // set document information

        $pdf->SetCreator(WEB_TITLE);
        $pdf->SetAuthor($_SESSION['user']['email']);
        $pdf->SetTitle("Quotation - " . $store['nama']);
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
            <table>
                <tr>
                    <td>
                        <h3>Daftar Quotation - ' . $store['nama'] . '</h3>
                    </td>
                    <td style="text-align:right">
                        <img src="' . $image_store . '" width="150"><br/>
                    </td>
                </tr>
            </table>
            <table border="1">
                <tr>
                    <th style="text-align: center;" width="60"> No </th>
                    <th width="200" style="text-align: center;"> Nomor Quotation </th>
                    <th style="text-align: center;" width="140"> Tanggal DO </th>
                    <td style="text-align: center; "width="210"> Pelanggan </td>
                    <td style="text-align: center; "width="150"> Status </td>
                    <td style="text-align: center; "width="200"> Dibuat Oleh </td>
                </tr>
        ';
                $no = 1;
                foreach ($data as $row) {
                    $html .= "<tr><td>" . $no . "</td><td>" . $row['nomor'] . "</td><td>" . Tanggal::formatDate($row['tanggal']) . "</td><td>" . $row->pelanggan['namapelanggan'] . "</td><td>" . $row['status'] . "</td><td>" . $row['dibuat_oleh'] . "</td></tr>";
                    $no++;
                }
                $html .=
            '</table>
        </body>';
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
        //$pdf->writeHTML($html, true, 0, true, true);
        // ---------------------------------------------------------
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.

        $pdf->Output("Daftar Quotation", 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
    }

    public function cetak($idquotationsales = null, $idrefstore = null) {

        if($idquotationsales==null) exit('Data Tidak Tersedia');
        
        $data = $this->orm->quotationsales->where('idquotationsales', $idquotationsales)->fetch();

        if (count($this->orm->quotationsales->where('idquotationsales', $idquotationsales)) == 0) {
            echo "<h3>Data Tidak Tersedia</h3>";
            exit;
        }

        //check from web
        if ($idrefstore == null) {
            $email = $_SESSION['user']['email'];
            $idrefstore = $_SESSION['user']['idrefstore'];
        } else {//from mobile
            $email = $this->input->post('email');
        }

        ini_set('memory_limit', '512M');

        $this->load->library('TCPDF');

        // create new PDF document
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
        // set document information

        $pdf->SetCreator(WEB_TITLE);
        $pdf->SetAuthor($email);
        $pdf->SetTitle("Quotation - " . $data['nomor']);
        $pdf->SetSubject($data['nomor']);

        $pdf->nomor = $data['nomor'];
        $pdf->tanggal = $data['tanggal'];
        $pdf->namaPelanggan = $data->pelanggan['namapelanggan'];
        $pdf->dibuat_oleh = $data['dibuat_oleh'];
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
             <tr><th style="text-align: center;" width="60"> No </th><th width="180" style="text-align: center;"> Nama Barang </th><th style="text-align: center;" width="100"> Jumlah Barang </th><th style="text-align: center;" width="300"> Harga Satuan </th><td style="text-align: center; "width="300"> Keterangan </td></tr>
            ';
        $no = 1;

        foreach ($this->orm->quotationsalesdetail->where('idquotationsales', $idquotationsales) as $row) {
            $html .= "<tr><td>" . $no . "</td><td>" . $row->refbarang['namabarang'] . "</td><td style=\"text-align: right;\">" . $row['jumlahbarang'] . "</td><td style=\"text-align: right;\">" . number_format($row['hargasatuan'],0,',','.') . "</td><td>" . $row['keterangan'] . "</td></tr>";

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

        $pdf->Output("Quotation - " . $data['nomor'], 'I');

//============================================================+
// END OF FILE
//============================================================+
    }

}

class MYPDF extends TCPDF {

    var $nomor;
    var $tanggal;
    var $namaPelanggan;
    var $dibuat_oleh;
    var $store;

//Page header
    public function Header() {

        $store = $this->store;

        $image_store = ($store['image_file'] == ""OR$store['image_file'] == NULL) ? "./front_assets/img/bizon_inventory.jpg" : "./uploads/stores/" . $store['image_file'];

        $html = '
<style>
    table {
        letter-spacing:5px;
        padding-top:1px;
    }      
</style>  
<table><tr><td>
<h3>Quotation - ' . $store['nama'] . '</h3>
</td><td style="text-align:right">
<img src="' . $image_store . '" width="150"><br/></td></tr></table>
<table width="100%">
    <tr>
        <td colspan="6" width="99%"><br/></td>
    </tr>
    <tr>
        <td colspan="2" rowspan="2" style="text-align: left; vertical-align:text-top;"><h2></h2></td>
        <td colspan="4" rowspan="1"  style="text-align: left; vertical-align:text-top;"> Nomor Quotation : ' . $this->nomor . '</td>
    </tr>
    <tr>
        <td colspan="2" rowspan="1"  style="text-align: left; vertical-align:text-top;"> Tanggal :' . Tanggal::fieldDate($this->tanggal) . '</td>
    </tr>
   

</table>

<table width="100%"><tr><td width="68%"></td><td width="50%">&nbsp;&nbsp;Kepada Yth ' . $this->namaPelanggan . '<br/><br/></td></tr></table> <br/> <br/>


';
        $this->writeHTML($html, true, 0, true, true);
    }

// Page footer
    public function Footer() {

        $this->dibuat_oleh = ($this->dibuat_oleh == NULL) ? '&nbsp;' : '<div style="text-align: center;">' . $this->dibuat_oleh . '</div>';

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
                . '<td width="110" style="text-align: left;"><b></b></td>'
                . '<td></td>'
                . '<td width="240" style="text-align: left;"><br/>  <b><u>' . $this->dibuat_oleh . '</u></b> </td>'
                . '<td></td>'
                . '</tr>'
                . '</table>';
        $html .= '<div style="text-align: right;"></div>';
        $this->writeHTML($html, true, 0, true, true);
    }

}