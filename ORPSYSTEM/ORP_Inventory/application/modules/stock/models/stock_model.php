<?php

class stock_model extends CI_Model {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }

    function _loadMutasiStock($dari = null, $sampai = null, $idrefbarang1 = 0) {
        
        $where1 = '';
        $where2 = '';
        
        if (!empty($dari) AND ! empty($sampai)) {
            $dari = Tanggal::sqlDate($dari);
            $sampai = Tanggal::sqlDate($sampai);
            $where1 = 'AND (b.tanggaltransaksi BETWEEN ' . "'" . $dari . "'" . ' AND ' . "'" . $sampai."'" . ' OR c.tanggaltransaksi BETWEEN ' . "'" . $dari . "'" . ' AND ' . "'" . $sampai ."'". ' )';
            //$this->db->where('(b.tanggaltransaksi BETWEEN ' . '"' . $dari . '"' . ' AND ' . '"' . $sampai . '" OR c.tanggaltransaksi BETWEEN ' . '"' . $dari . '"' . ' AND ' . '"' . $sampai . '" )');
        }
       
        if ($idrefbarang1 != 0) {
            $where2 = "AND a.idrefbarang = " . $idrefbarang1 . "";
        }

        $sql = 'SELECT a.*, f.namasatuan, SUM(deliveryorderdetail.jumlahbarang) as jumlahkirim, 
SUM(pengadaandetail.jumlahbarang) as jumlahterima FROM "refbarang" a  LEFT JOIN 
"deliveryorderdetail" ON a."idrefbarang" = "deliveryorderdetail"."idrefbarang" 
LEFT JOIN "pengadaandetail" ON a."idrefbarang" = "pengadaandetail"."idrefbarang" 
LEFT JOIN "transaksibarang" b  ON b."iddeliveryorderdetail" = "deliveryorderdetail"."iddeliveryorderdetail" 
LEFT JOIN "transaksibarang" c ON c."idpengadaandetail" = "pengadaandetail"."idpengadaandetail" 
LEFT JOIN "deliveryorder" ON "deliveryorder"."iddeliveryorder" = "deliveryorderdetail"."iddeliveryorder" 
LEFT JOIN "pelanggan" ON "pelanggan"."idpelanggan" = "deliveryorder"."idpelanggan" 
LEFT JOIN "pengadaan" d ON d."idpengadaan" = "pengadaandetail"."idpengadaan" 
LEFT JOIN "supplier" ON "supplier"."idsupplier" = d."idsupplier" 
LEFT JOIN "refgudang" e  ON a."idrefgudang" = e."idrefgudang" 
LEFT JOIN "refsatuan" f  ON a."idrefsatuan" = f."idrefsatuan" WHERE a.idrefbarang != 0
'.$where1.' '.$where2.' 
 GROUP BY a.idrefbarang, f.namasatuan ORDER BY a.kodebarang ASC';
        
        
        
        $ress = $this->db->query($sql)->result_array();


        return (empty($ress)) ? NULL : $ress;
    }
    
    
    function _loadMutasi($dari = null, $sampai = null, $idrefbarang = null) {

        
        $dari = Tanggal::sqlDate($dari);
        $sampai = Tanggal::sqlDate($sampai);
        
        $sql = 'SELECT *, "deliveryorderdetail"."jumlahbarang" as jumlahkirim, '
                . '"pengadaandetail"."jumlahbarang" as jumlahterima, '
                . '"deliveryorderdetail"."keterangan" as keterangankirim, '
                . '"pengadaandetail"."keterangan" as keteranganterima, '
                . '"c"."idrefbarang" as idrefbarangkirim, '
                . '"g"."idrefbarang" as idrefbarangterima, '
                . '"c"."namabarang" as namabarangkirim, '
                . '"g"."namabarang" as namabarangterima, '
                . '"c"."stockawal" as stockawalkirim, '
                . '"g"."stockawal" as stockawalterima, '
                . '"c"."stock" as stockkirim, "g"."stock" as stockterima, '
                . '"c"."ukuran" as ukurankirim, "g"."ukuran" as ukuranterima, '
                . '"d"."nomorgudang" as nomorgudangkirim, '
                . '"h"."nomorgudang" as nomorgudangterima, '
                . '"d"."namagudang" as namagudangkirim, '
                . '"h"."namagudang" as namagudangterima, '
                . '"e"."namasatuan" as namasatuankirim, '
                . '"i"."namasatuan" as namasatuanterima, '
                . '"f"."jenisbarang" as jenisbarangkirim, '
                . '"j"."jenisbarang" as jenisbarangterima '
                . 'FROM "transaksibarang" LEFT JOIN "deliveryorderdetail" ON '
                . '"transaksibarang"."iddeliveryorderdetail" = "deliveryorderdetail"."iddeliveryorderdetail" '
                . 'LEFT JOIN "deliveryorder" ON "deliveryorder"."iddeliveryorder" = "deliveryorderdetail"."iddeliveryorder" '
                . 'LEFT JOIN "suratjalan" ON "suratjalan"."iddeliveryorder" = "deliveryorder"."iddeliveryorder" '
                . 'LEFT JOIN "pelanggan" ON "pelanggan"."idpelanggan" = "deliveryorder"."idpelanggan" '
                . 'LEFT JOIN "pengadaandetail" ON "transaksibarang"."idpengadaandetail" = "pengadaandetail"."idpengadaandetail" '
                . 'LEFT JOIN "pengadaan" ON "pengadaandetail"."idpengadaan" = "pengadaandetail"."idpengadaan" '
                . 'LEFT JOIN "supplier" ON "supplier"."idsupplier" = "pengadaan"."idsupplier" '
                . 'LEFT JOIN "refbarang" c ON "c"."idrefbarang" = "deliveryorderdetail"."idrefbarang" '
                . 'LEFT JOIN "refgudang" d ON "d"."idrefgudang" = "c"."idrefgudang" '
                . 'LEFT JOIN "refsatuan" e ON "e"."idrefsatuan" = "c"."idrefsatuan" '
                . 'LEFT JOIN "refjenisbarang" f ON "f"."idrefjenisbarang" = "c"."idrefjenisbarang" '
                . 'LEFT JOIN "refbarang" g ON "g"."idrefbarang" = "pengadaandetail"."idrefbarang" '
                . 'LEFT JOIN "refgudang" h ON "h"."idrefgudang" = "g"."idrefgudang" '
                . 'LEFT JOIN "refsatuan" i ON "i"."idrefsatuan" = "g"."idrefsatuan" '
                . 'LEFT JOIN "refjenisbarang" j ON "j"."idrefjenisbarang" = "g"."idrefjenisbarang" '
                . 'WHERE g.idrefbarang = '.$idrefbarang.' AND  "tanggaltransaksi" BETWEEN '."'".$dari."'".' AND '."'".$sampai."'".' '
                . '';

        $ress = $this->db->query($sql)->result_array();
        

        return (empty($ress)) ? NULL : $ress;
    }
    
    public function _getSaldoAwalBarang($idRefBarang, $tanggalSebelum = null, $tanggalSampai = null, $idTransaksiBarang = null) {
      
        $this->db->select('stockawal');
        
        if(!empty($idRefBarang)) {
        $this->db->where('idrefbarang = ' . $idRefBarang);
        }
        $ress = $this->db->get('refbarang')->row_array();

        $stockAwal = $ress['stockawal'];

        if (!empty($tanggalSebelum)) {
            $this->db->select('*');
            $this->db->from('transaksibarang');
            $this->db->select('deliveryorderDetail.jumlahbarang as jumlahkirim');
            $this->db->select('pengadaandetail.jumlahbarang as jumlahterima');
            $this->db->select('c.idrefbarang as idrefbarangkirim');
            $this->db->select('g.idrefbarang as idrefbarangterima');
            
            $this->db->join('deliveryorderdetail', 'transaksibarang.iddeliveryorderdetail = deliveryorderdetail.iddeliveryorderdetail', 'left');
            $this->db->join('pengadaandetail', 'transaksibarang.idpengadaandetail = pengadaandetail.idpengadaandetail', 'left');
            $this->db->join('refbarang c', 'c.idrefbarang = deliveryorderdetail.idrefbarang', 'left');
            $this->db->join('refbarang g', 'g.idrefbarang = pengadaandetail.idrefbarang', 'left');
        
           
            $dari = Tanggal::sqlDate($tanggalSebelum);
            $sampai = Tanggal::sqlDate($tanggalSampai);
            
            $this->db->where('(tanggaltransaksi BETWEEN ' . '"' . $dari . '"' . ' AND ' . '"' . $sampai . '" OR tanggaltransaksi BETWEEN ' . '"' . $dari . '"' . ' AND ' . '"' . $sampai . '" )');
           
            if(!empty($idRefBarang)) {
           $this->db->where('(c.idrefbarang = '.$idRefBarang.' OR '.'g.idtefbarang = '.$idRefBarang.')');
            }
           $history = $this->db->get()->result_array();
           
           foreach($history as $row) {
               $stockAwal = $stockAwal+$row['jumlahterima'];
               $stockAwal = $stockAwal-$row['jumlahkirim'];
           }
        }
        
         if (!empty($idTransaksiBarang)) {
            $this->db->select('*');
            $this->db->from('transaksibarang');
            $this->db->select('deliveryorderdetail.jumlahbarang as jumlahkirim');
            $this->db->select('pengadaandetail.jumlahbarang as jumlahterima');
            $this->db->select('c.idrefbarang as idrefbarangkirim');
            $this->db->select('g.idrefbarang as idrefbarangterima');
            
            $this->db->join('deliveryorderdetail', 'transaksibarang.iddeliveryorderdetail = deliveryorderdetail.iddeliveryorderdetail', 'left');
            $this->db->join('pengadaandetail', 'transaksibarang.idpengadaandetail = pengadaandetail.idpengadaandetail', 'left');
            $this->db->join('refbarang c', 'c.idrefbarang = deliveryorderdetail.idrefbarang', 'left');
            $this->db->join('refbarang g', 'g.idrefbarang = pengadaandetail.idrefbarang', 'left');
        
           $this->db->where('idtransaksibarang < '.$idTransaksiBarang.'');
           
           if(!empty($idRefBarang)) {
           $this->db->where('(c.idrefbarang = '.$idRefBarang.' OR '.'g.idrefbarang = '.$idRefBarang.')');
           }
           
           $history = $this->db->get()->result_array();
           
           foreach($history as $row) {
               $stockAwal = $stockAwal+$row['jumlahterima'];
               $stockAwal = $stockAwal-$row['jumlahkirim'];
           }
        }
        

        return $stockAwal;
    }
    
    
     public function _getJumlahKirim($idrefbarang, $dari, $sampai) { 
       
       $dari = Tanggal::sqlDate($dari);
        $sampai = Tanggal::sqlDate($sampai);
         
        $sql = "select SUM(jumlahbarang) as jumlahkirim from deliveryorderdetail a LEFT JOIN transaksibarang b ON (a.iddeliveryorderdetail = b.iddeliveryorderdetail)"
                . "where idrefbarang = $idrefbarang AND ".'(tanggaltransaksi BETWEEN ' . "'" . $dari . "'" . ' AND ' ."'" . $sampai . "'" .' OR tanggaltransaksi BETWEEN ' . "'" . $dari . "'" . ' AND ' . "'" . $sampai."'" . ' )';
        $ress = $this->db->query($sql)->row_array();
        
        return $ress['jumlahkirim'];
    }
    
    public function _getJumlahTerima($idrefbarang, $dari, $sampai) { 
       
       
        $dari = Tanggal::sqlDate($dari);
        $sampai = Tanggal::sqlDate($sampai);
         
        $sql = "select SUM(jumlahbarang) as jumlahterima from pengadaandetail a LEFT JOIN transaksibarang b ON (a.idpengadaandetail = b.idpengadaandetail)"
                . "where idrefbarang = $idrefbarang AND ".'(tanggaltransaksi BETWEEN ' . "'" . $dari . "'" . ' AND ' ."'" . $sampai . "'" .' OR tanggaltransaksi BETWEEN ' . "'" . $dari . "'" . ' AND ' . "'" . $sampai."'" . ' )';
        $ress = $this->db->query($sql)->row_array();
        
        
        return $ress['jumlahterima'];
    }
    
    
    function _loadTop10Transaction($month=0,$year=0) {
        
       
//         $sql = 'select a.transaksi, b.idrefbarang as idrefbarangmasuk, c.idrefbarang as idrefbarangkeluar, d.namabarang as namabarangmasuk, d.kodebarang as kodebarangmasuk,'
//                . ' e.namabarang as namabarangkeluar, e.kodebarang as kodebarangkeluar,'
//                . ' sum(b.jumlahbarang) as jumlahbarangmasuk, sum(c.jumlahbarang) as jumlahbarangkeluar,'
//                . ' count(a.iddeliveryorderdetail) as jumlahtransaksikeluar, count(a.idpengadaandetail) as jumlahtransaksimasuk'
//                . ' from transaksibarang a '
//                . ' LEFT JOIN deliveryorderdetail b ON a.iddeliveryorderdetail = b.iddeliveryorderdetail'
//                . ' LEFT JOIN pengadaandetail c ON a.idpengadaandetail = c.idpengadaandetail'
//                . ' LEFT JOIN refbarang d ON d.idrefbarang = c.idrefbarang'
//                . ' LEFT JOIN refbarang e ON e.idrefbarang = b.idrefbarang'
//                . ' WHERE EXTRACT(MONTH FROM TIMESTAMP '."'"."a.tanggaltransaksi"."'".')  = '.$month.' AND EXTRACT(YEAR FROM TIMESTAMP '."'"."a.tanggaltransaksi"."'".') = '.$year.''
//                . ' AND (b.idrefbarang != '."''".' AND c.idrefbarang != '."''".')'
//                . ' GROUP BY b.idrefbarang, c.idrefbarang, d.idrefbarang, e.idrefbarang, a.transaksi'
//                . ' ORDER BY sum(b.jumlahbarang) DESC, sum(c.jumlahbarang) DESC';
              
               $sql = 'select a.transaksi, b.idrefbarang as idrefbarangmasuk, c.idrefbarang as idrefbarangkeluar, d.namabarang as namabarangmasuk, d.kodebarang as kodebarangmasuk,'
                . ' e.namabarang as namabarangkeluar, e.kodebarang as kodebarangkeluar,'
                . ' sum(b.jumlahbarang) as jumlahbarangmasuk, sum(c.jumlahbarang) as jumlahbarangkeluar,'
                . 'f.namasatuan as namasatuanmasuk,  g.namasatuan as namasatuankeluar,'
                . ' count(a.iddeliveryorderdetail) as jumlahtransaksikeluar, count(a.idpengadaandetail) as jumlahtransaksimasuk'
                . ' from transaksibarang a '
                . ' LEFT JOIN deliveryorderdetail b ON a.iddeliveryorderdetail = b.iddeliveryorderdetail'
                . ' LEFT JOIN pengadaandetail c ON a.idpengadaandetail = c.idpengadaandetail'
                . ' LEFT JOIN refbarang d ON d.idrefbarang = c.idrefbarang'
                . ' LEFT JOIN refbarang e ON e.idrefbarang = b.idrefbarang'
                . ' LEFT JOIN refsatuan f ON f.idrefsatuan = d.idrefsatuan'
                . ' LEFT JOIN refsatuan g ON g.idrefsatuan = e.idrefsatuan'
                . ' LEFT JOIN deliveryorder h ON b.iddeliveryorder = h.iddeliveryorder'
                . ' LEFT JOIN pengadaan i ON c.idpengadaan = i.idpengadaan'
                . ' WHERE h.idrefstore = '.$_SESSION['user']['idrefstore'].' OR i.idrefstore = '.$_SESSION['user']['idrefstore']
                . ' GROUP BY b.idrefbarang, c.idrefbarang, d.idrefbarang, e.idrefbarang, a.transaksi, f.namasatuan, g.namasatuan'
                . ' ORDER BY sum(b.jumlahbarang) DESC, sum(c.jumlahbarang) DESC LIMIT 10';
        
        $ress = $this->db->query($sql)->result_array();


        return (empty($ress)) ? NULL : $ress;
    }
    
    
    function _loadInperMount($month) {        
        $sql = 'select date_trunc(\'month\',a.tanggaltransaksi),  sum(b.jumlahbarang) as jumlahbarang from transaksibarang a left join deliveryorderdetail b ON (a.iddeliveryorderdetail=b.iddeliveryorderdetail) where EXTRACT(MONTH FROM a.tanggaltransaksi) = '.$month.' AND transaksi = \'KIRIM\' group by date_trunc(\'month\',a.tanggaltransaksi)';
        $ress = $this->db->query($sql)->row_array();
        return (empty($ress)) ? NULL : $ress;
    }
    
    function _loadInperMountDay($month,$day) {        
        $sql = 'select EXTRACT(DAY FROM tanggaltransaksi) as tanggal,  sum(b.jumlahbarang) as jumlahbarang, a.tanggaltransaksi from transaksibarang a left join pengadaandetail b ON (a.idpengadaandetail=b.idpengadaandetail)'
                . 'where EXTRACT(MONTH FROM tanggaltransaksi) = '.$month.' AND EXTRACT(DAY FROM tanggaltransaksi) = '.$day.' AND transaksi = \'TERIMA\' group by a.tanggaltransaksi order by a.tanggaltransaksi';
        $ress = $this->db->query($sql)->row_array();
        return (empty($ress)) ? NULL : $ress;
    }
    
    function _loadOutperMount($month) {        
       $sql = 'select date_trunc(\'month\',a.tanggaltransaksi),  sum(b.jumlahbarang) as jumlahbarang from transaksibarang a left join pengadaandetail b ON (a.idpengadaandetail=b.idpengadaandetail) where EXTRACT(MONTH FROM a.tanggaltransaksi) = '.$month.' AND transaksi = \'TERIMA\' group by date_trunc(\'month\',a.tanggaltransaksi)';
        $ress = $this->db->query($sql)->row_array();
        return (empty($ress)) ? NULL : $ress;
    }
    
     function _loadOutperMountDay($month,$day) {        
        $sql = 'select EXTRACT(DAY FROM tanggaltransaksi) as tanggal,  sum(b.jumlahbarang) as jumlahbarang, a.tanggaltransaksi from transaksibarang a left join deliveryorderdetail b ON (a.iddeliveryorderdetail=b.iddeliveryorderdetail)'
                . 'where EXTRACT(MONTH FROM tanggaltransaksi) = '.$month.' AND EXTRACT(DAY FROM tanggaltransaksi) = '.$day.' AND transaksi = \'KIRIM\' group by a.tanggaltransaksi order by a.tanggaltransaksi';
        $ress = $this->db->query($sql)->row_array();
        return (empty($ress)) ? NULL : $ress;
    }
    
    function _loadOutItems($month,$idrefbarang) {
        $sql = 'select sum(b.jumlahbarang) as jumlahbarang, EXTRACT(MONTH FROM tanggaltransaksi) as bulan  from transaksibarang a left join deliveryorderdetail b ON (a.iddeliveryorderdetail=b.iddeliveryorderdetail)'
                . 'where EXTRACT(MONTH FROM tanggaltransaksi) = '.$month.' AND b.idrefbarang = '.$idrefbarang.'  AND transaksi = \'KIRIM\' group by a.tanggaltransaksi order by a.tanggaltransaksi';
        $ress = $this->db->query($sql)->row_array();
        return (empty($ress)) ? NULL : $ress;
    }
    
    function _loadInItems($month,$idrefbarang) {
        $sql = 'select sum(b.jumlahbarang) as jumlahbarang, EXTRACT(MONTH FROM tanggaltransaksi) as bulan  from transaksibarang a left join pengadaandetail b ON (a.idpengadaandetail=b.idpengadaandetail)'
                . 'where EXTRACT(MONTH FROM tanggaltransaksi) = '.$month.' AND b.idrefbarang = '.$idrefbarang.'  AND transaksi = \'TERIMA\' group by a.tanggaltransaksi order by a.tanggaltransaksi';
        $ress = $this->db->query($sql)->row_array();
        return (empty($ress)) ? NULL : $ress;
    }

}
