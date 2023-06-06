<?php namespace App\Models;

use CodeIgniter\Model;

class Msouvenir extends Model
{
    /**
     * table name
     */
    protected $table = "souvenir";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'kode',
        'nama',
        'stok',
        'gambar'
    ]; 


    public function getAll(){
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT idbrg, namabrg, harga, diskon, stok, namafile FROM souvenir');
        return $query->getResult();
    }

    public function setAll($data){
        $namabrg = $data['nama'];
        $harga = $data['harga'];
        $diskon = $data['diskon'];
        $stok = $data['stok'];
        $namafile = $data['namafile'];
        $db = \Config\Database::connect();
        $query   = $db->query("INSERT INTO souvenir ( namabrg, harga, diskon, stok, namafile) VALUES
         ('$namabrg', '$harga', '$diskon', '$stok', '$namafile')");
        // $query   = $db->query('SELECT NIM, Nama, Umur FROM mahasiswa');
        // return $query->getResult();
    }

    public function getId($id){
        $db = \Config\Database::connect();
        $query   = $db->query("SELECT idbrg, namabrg, harga, diskon, stok, namafile FROM souvenir WHERE idbrg = '$id'");
        return $query->getRow();
    }

    public function updateBarang($data){
        $qty = $data['jumlahjual'];
        $idbrg = $data['idbrg'];
        $db = \Config\Database::connect();
        $db->query("UPDATE souvenir set stok = stok - '$qty' where idbrg = '$idbrg'");
    }
}