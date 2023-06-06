<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mtransaksi;
use App\Models\Mdetailjual;
use App\Models\Msouvenir;

class Ctransaksi extends Controller
{
    protected $datatrans;
    protected $detailjual;
    protected $datasouvenir;

    function __construct()
    {
        $this->datatrans = new Mtransaksi();
        $this->detailjual = new Mdetailjual();
        $this->datasouvenir = new Msouvenir();
    }

    public function index()
    {
        $session = Session();
        $cart = $session->get('cart');
        // dd($data);
        return view('V_transaksi', compact("cart"));
    }

    public function store(){

        $session = Session();
        $cart = $session->get('cart');
        $totalharga = 0;

        for ($i=0; $i <count($cart) ; $i++) { 
            $totalharga += (($cart[$i]['harga'] - ($cart[$i]['harga']*$cart[$i]['diskon']/100) * $cart[$i]['jumlahjual']));
        };

        $transaksi = [
            'nama' => $this->request->getVar('nama'),
            'hp' => $this->request->getVar('hp'),
            'alamat' => $this->request->getVar('alamat'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kota' => $this->request->getVar('kota'),
            'totalharga' => $totalharga,
        ];
        $id_transaksi = $this->datatrans->setAll($transaksi);
        $id_transaksi = $id_transaksi[0]->idtrans;
        
        for ($i=0; $i < count($cart); $i++) { 
            settype($cart[$i]['harga'], "integer");    
            $this->datasouvenir->updateBarang($cart[$i]);
            $this->detailjual->setAll($id_transaksi,$cart[$i]);
        }
        $cart = [];
        $session->set('cart', $cart);

        return redirect()->to('/souvenir');
    }

}