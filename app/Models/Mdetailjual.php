<?php namespace App\Models;

use CodeIgniter\Model;

class Mdetailjual extends Model
{

    public function setAll($idtrans, $data){
        $idbrg = $data['idbrg'];
        $hargajual = ($data['harga'] - ($data['harga']*$data['diskon']/100));
        $jmljual = $data['jumlahjual'];
        $db = \Config\Database::connect();
        $db->query("INSERT INTO detailjual ( idtrans, idbrg, hargajual, jmljual) VALUES ( '$idtrans', '$idbrg', '$hargajual', '$jmljual')");
    }
}