<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Msouvenir;
use CodeIgniter\Files\File;

class Csouvenir extends Controller
{
    /**
     * index function
     */
    protected $souvenir;

    function __construct()
    {
        $this->datasouvenir = new Msouvenir();
    }

    public function index()
    {

        if(! session()->get('logged_in')){
            // maka redirct ke halaman login
            return redirect()->to('/'); 
        }

        $session = session();
        $cart = $session->get('cart');
                
        $souvenir = $this->datasouvenir->getAll();
        $totalharga = 0;
        // dd($cart);

        if($cart != null){
            for ($i=0; $i <count($cart) ; $i++) { 
                $totalharga += (($cart[$i]['harga'] - ($cart[$i]['harga']*$cart[$i]['diskon']/100) * $cart[$i]['jumlahjual']));
            }
        }
        
        return view('V_souvenir', compact("souvenir", "totalharga", "cart"));
    }

    public function input(){

        return view('V_input');
    }

    public function store(){
        // dd("anjay");
        $souvenir = [
            'nama' => $this->request->getVar('namabrg'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'diskon' => $this->request->getVar('diskon'),
            'namafile' => $this->request->getfile('namafile'),
        ];
        $souvenir['namafile'] = $souvenir['namafile']->getname();
        // $dataBerkas = $this->request->getFile('namafile');
        
        $this->datasouvenir->setAll($souvenir);
        $avatar = $this->request->getFile('namafile');
        $avatar->move(ROOTPATH . 'public/image');

        // $dataBerkas = $this->request->getFile('namafile');
		// $fileName = $dataBerkas->getRandomName();
        // dd($dataBerkas);
		// $dataBerkas->move('image/', $fileName);

        return redirect()->to('/souvenir');
    }
}