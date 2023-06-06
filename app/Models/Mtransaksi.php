<?php namespace App\Models;

use CodeIgniter\Model;

class Mtransaksi extends Model
{

    public function setAll($data){
        $nama = $data['nama'];
        $hp = $data['hp'];
        $alamat = $data['alamat'];
        $kecamatan = $data['kecamatan'];
        $kota = $data['kota'];
        $totalharga = $data['totalharga'];
        $db = \Config\Database::connect();
        $query   = $db->query("INSERT INTO trnaspjl (nama, hp, alamat, kecamatan, kota, totalharga) 
        VALUES ('$nama', '$hp', '$alamat', '$kecamatan', '$kota', '$totalharga')");
        $id   = $db->query("SELECT idtrans FROM trnaspjl WHERE nama = '$nama' AND hp ='$hp'");
        return $id->getResult();
    }
}