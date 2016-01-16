<?php

class sharing_model extends CI_Model {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        
    }

    public function updateStockPengirim($sharingproduct) {

        $refbarang = $this->orm->refbarang->where('idrefbarang = ? AND idrefstore = ?', $sharingproduct['idrefbarang'], $sharingproduct['idrefstore_pengirim']);
        $new_stock = $refbarang['stock'] - $sharingproduct['jumlah_barang'];
        $data = array();
        $data['stock'] = $new_stock;
        $refbarang->update($data);

        $this->deliveryOrder($sharingproduct);
    }

    public function updateStockPenerima($sharingproduct) {

        $setting_model = new Setting_model;

        $refbarang_pengirim = $this->orm->refbarang->where('idrefbarang = ? AND idrefstore = ?', $sharingproduct['idrefbarang'], $sharingproduct['idrefstore_pengirim']);

        $refbarang = $this->orm->refbarang->where('kodebarang = ? AND idrefstore = ?', $refbarang_pengirim['kodebarang'], $sharingproduct['idrefstore_penerima']);

        if (COUNT($refbarang) == 0) {  // Jika Barang yang di-sharing pengirim belum ada di masterdata penerima
            $data = array();
            $data['idrefbarang'] = $setting_model->_getMaxId('idrefbarang', 'refbarang');
            $data['idrefsatuan'] = $refbarang_pengirim['idrefsatuan'];
            $data['kodebarang'] = $refbarang_pengirim['kodebarang'];
            $data['namabarang'] = $refbarang_pengirim['namabarang'];
            $data['ukuran'] = $refbarang_pengirim['ukuran'];
            $data['idrefgudang'] = $refbarang_pengirim['idrefgudang'];
            $data['meta'] = $refbarang_pengirim['meta'];
            $data['alias'] = $refbarang_pengirim['alias'];
            $data['image_file'] = $refbarang_pengirim['image_file'];
            $data['idpackaging'] = $refbarang_pengirim['idpackaging'];
            $data['idrefjenisbarang'] = $refbarang_pengirim['idrefjenisbarang'];
            $data['idrefstore'] = $sharingproduct['idrefstore_penerima'];
            $data['stockawal'] = $sharingproduct['jumlah_barang'];
            $data['stock'] = $sharingproduct['jumlah_barang'];
            $refbarang->insert($data);
        } else { // Jika Barang yang di-sharing pengirim sudah ada di masterdata penerima (cukup update Stock)
            $new_stock = $refbarang['stock'] + $sharingproduct['jumlah_barang'];
            $data = array();
            $data['stock'] = $new_stock;
            $refbarang->update($data);
        }

        $this->pengadaan($sharingproduct);
    }

    public function deliveryOrder($sharingproduct) {

        $setting_model = new Setting_model;

        $data = array();
        $data['iddeliveryorder'] = $setting_model->_getMaxId('iddeliveryorder', 'deliveryorder');
        $data['nomordo'] = 'SP' . $sharingproduct['idrefstore_penerima'] . '-' . $sharingproduct['idsharingproduct'];
        $data['tanggaldo'] = date('Y-m-d');
        $data['disetujui'] = $_SESSION['user']['email'];
        $data['idpelanggan'] = $this->checkPelanggan($sharingproduct['idrefstore_penerima']); // function check data store penerima di pelanggan

        $data['status'] = 'PROSES';
        $data['insertby'] = $_SESSION['user']['email'];
        $data['idrefstore'] = $_SESSION['user']['idrefstore'];
        $data['flag_app'] = "WEB";

        $iddeliveryorder = $data['iddeliveryorder'];
        $deliveryorder = $this->orm->deliveryorder();
        $ress = $deliveryorder->insert($data);

        $this->orm->deliveryorderdetail->where('iddeliveryorder', $iddeliveryorder)->delete();
        $this->orm->transaksibarang->where('iddeliveryorder', $iddeliveryorder)->delete();



        $dataDetilBarang = array();
        $dataDetilBarang['iddeliveryorderdetail'] = $setting_model->_getMaxId('iddeliveryorderdetail', 'deliveryorderdetail');
        $dataDetilBarang['iddeliveryorder'] = $iddeliveryorder;
        $dataDetilBarang['idrefbarang'] = $sharingproduct['idrefbarang'];
        $dataDetilBarang['jumlahbarang'] = $sharingproduct['jumlah_barang'];

        if ($dataDetilBarang['idrefbarang'] != 0) {
            $result = $this->orm->deliveryorderdetail->insert($dataDetilBarang);


            $iddeliveryorderdetail = $result['iddeliveryorderdetail'];

            $dataTransaksiBarang = array();
            $dataTransaksiBarang['idtransaksibarang'] = $setting_model->_getMaxId('idtransaksibarang', 'transaksibarang');
            $dataTransaksiBarang['transaksi'] = 'KIRIM';
            $dataTransaksiBarang['tanggaltransaksi'] = date('Y-m-d');
            $dataTransaksiBarang['idpengadaanDetail'] = 0;
            $dataTransaksiBarang['iddeliveryorderdetail'] = $iddeliveryorderdetail;
            $dataTransaksiBarang['iddeliveryorder'] = $iddeliveryorder;

            $this->orm->transaksibarang->insert($dataTransaksiBarang);
        }
    }

    public function pengadaan($sharingproduct) {
        
        $this->load->model('transaksi/transaksi_model');
        
        $transaksi_model = new Transaksi_model();
        $setting_model = new Setting_model;
        
        $data = array();
        $data['idpengadaan'] = $setting_model->_getMaxId('idpengadaan', 'pengadaan');
        $data['nomorpengadaan'] = 'SP' . $sharingproduct['idrefstore_pengirim'] . '-' . $sharingproduct['idsharingproduct'];
        $data['tanggalpengadaan'] = date('Y-m-d');
        $data['idsupplier'] = $this->checkSupplier($sharingproduct['idrefstore_pengirim']);  // function check data store pengirim di supplier
        $data['insertby'] = $_SESSION['user']['email'];
        $data['idrefstore'] = $sharingproduct['idrefstore_pengirim'];
        $data['flag_app'] = "WEB";

        $idpengadaan = $data['idpengadaan'];
        $pengadaan = $this->orm->pengadaan();
        $ress = $pengadaan->insert($data);

        $this->orm->pengadaandetail->where('idpengadaan', $idpengadaan)->delete();
        $this->orm->transaksibarang->where('idpengadaan', $idpengadaan)->delete();

        $dataDetilBarang = array();
        $dataDetilBarang['idpengadaandetail'] = $setting_model->_getMaxId('idpengadaandetail', 'pengadaandetail');
        $dataDetilBarang['idpengadaan'] = $idpengadaan;
        $dataDetilBarang['idrefbarang'] = $sharingproduct['idrefbarang'];
        $dataDetilBarang['jumlahbarang'] = $sharingproduct['jumlah_barang'];

        if ($dataDetilBarang['idrefbarang'] != 0) {
            $result = $this->orm->pengadaandetail->insert($dataDetilBarang);


            $idPengadaanDetail = $result['idpengadaandetail'];

            $dataTransaksiBarang = array();
            $dataTransaksiBarang['idtransaksibarang'] = $setting_model->_getMaxId('idtransaksibarang', 'transaksibarang');
            $dataTransaksiBarang['transaksi'] = 'TERIMA';
            $dataTransaksiBarang['tanggaltransaksi'] = date('Y-m-d');
            $dataTransaksiBarang['idpengadaandetail'] = $idPengadaanDetail;
            $dataTransaksiBarang['iddeliveryorderdetail'] = 0;
            $dataTransaksiBarang['idpengadaan'] = $idpengadaan;

            $this->orm->transaksibarang->insert($dataTransaksiBarang);
        }

        $transaksi_model->proccessBarangMasuk($idpengadaan);
    }

    public function checkPelanggan($idrefstore) {
        
         $setting_model = new Setting_model;
        
        $refstore = $this->orm->refstore->where('idrefstore', $idrefstore)->fetch();

        $pelanggan = $this->orm->pelanggan->where('emailpelanggan', $refstore['email']);

        if (COUNT($pelanggan) == 0) {
            $data = array();
            $data['idpelanggan'] = $setting_model->_getId('pelanggan');
            $data['namapelanggan'] = $refstore['nama'];
            $data['nomorhppelanggan'] = $refstore['tlp'];
            $data['emailpelanggan'] = $refstore['email'];
            $data['alamatpelanggan'] = $refstore['lokasi'];
            $data['jenispelanggan'] = 'Bizon Partner';
            $data['keterangan'] = 'Partner Sharing Product';
            $new_pelanggan = $this->orm->pelanggan->insert($data);
         
        }
        
        else {
            $new_pelanggan = $pelanggan->fetch();
        }
        
         return $new_pelanggan['idpelanggan'];
    }
    
    
    public function checkSupplier($idrefstore) {
        
         $setting_model = new Setting_model;
        
        $refstore = $this->orm->refstore->where('idrefstore', $idrefstore)->fetch();

        $supplier = $this->orm->supplier->where('emailsupplier', $refstore['email']);

        if (COUNT($supplier) == 0) {
            $data = array();
            $data['idsupplier'] = $setting_model->_getId('supplier');
            $data['namasupplier'] = $refstore['nama'];
            $data['nomorhpsupplier'] = $refstore['tlp'];
            $data['emailsupplier'] = $refstore['email'];
            $data['alamatsupplier'] = $refstore['lokasi'];
            $data['jenissupplier'] = 'Bizon Partner';
            $data['keterangan'] = 'Partner Sharing Product';
            $new_supplier = $this->orm->supplier->insert($data);
         
        }
        
        else {
            $new_supplier = $supplier->fetch();
        }
        
         return $new_supplier['idsupplier'];
    }

}
