<?php 

//jualan produk makanan
//minyak goreng
//Roti2an

use CetakInfoProduk as GlobalCetakInfoProduk;

class Produk {
    //Property
    private $merek,
            $warna,
            $produksi,
            $harga,
            $diskon=0;  

    //Method
    public function __construct($merek="merek",$warna="warna",$produksi="produksi",$harga=0) {
        //public,private&protect akan ngarus disini
        $this->merek = $merek;
        $this->warna = $warna;
        $this->produksi = $produksi;
        $this->harga = $harga;
    }
    public function setMerek($merek) {
        $this->merek =$merek;
    }
    public function getMerek() {
        return $this->merek;
    }

    public function setWarna($warna) {
        $this->warna = $warna;
    }
    public function getWarna() {
        return $this->warna;
    }

    public function setProduksi($produksi) {
        $this->produksi = $produksi;
    }
    public function getProduksi() {
        return $this->produksi;
    }

    public function setDiskon($diskon) {
        $this->diskon = "$diskon";
    }
    public function getDiskon() {
        return $this->diskon;
    }

    public function setHarga($harga) {
        $this->harga = $harga;
    }
    public function getHarga() {
        return $this->harga - ($this->harga * $this->diskon / 100 );
    }
    public function getlabel() {
        return "$this->warna, $this->produksi";
    }

    public function getInfoProduk() {
        $str = "{$this->merek} | {$this->getlabel()} (Rp. {$this->harga})";

        return $str;
    }
}


class Biscuit extends Produk {
    public $stok;
    public function __construct ($merek="merek", $warna="warna", $produksi="produksi", $harga=0, $stok=0) {
        parent::__construct($merek, $warna, $produksi, $harga);
        $this->stok = $stok;
    }
    public function getInfoProduk() {
        $str = "Biscuit: " . parent::getInfoProduk() . " - {$this->stok} Dus.";
        return $str;
    }
}


class MinyakGoreng extends Produk {
    public $ukuran;
    public function __construct($merek="merek", $warna="warna", $produksi="produksi", $harga=0, $ukuran=0) {
        parent::__construct($merek, $warna, $produksi, $harga);
        $this->ukuran = $ukuran;
    }
    public function getInfoProduk() {
        $str = "Minyak Goreng: " . parent::getInfoProduk() . " - {$this->ukuran} Liter.";
        return $str;
    }
}


class CetakInfoProduk {
    public $daftarProduk = array();

    public function tambahProduk( Produk $produk) {
        $this->daftarProduk[] = $produk;
    }

    public function cetak () {
        $str = "DAFTAR PRODUK : <br>";

        foreach( $this->daftarProduk as $p) {
            $str .= "- {$p->getInfoProduk()} <br>";
        }
        return $str;
    }
}

//Object
$produk1 = new Biscuit ("Tanggo", "Coklat", "Indofood", 8000, 100);
$produk2 = new MinyakGoreng ("Bimoli", "Kuning", "PT Bimoli", 20000,1);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();