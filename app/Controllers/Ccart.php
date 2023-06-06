<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Msouvenir;

class Ccart extends Controller
{
    /**
     * index function
     */
    protected $datasouvenir;

    function __construct()
    {
        $this->datasouvenir = new Msouvenir();
    }

    public function store(){
        
        $souvenir = [
            'idbrg' => $this->request->getVar('idbrg'),
        ];

        $session = session();
        $data = $session->get('cart');
        // $data = $session->destroy();
        // dd($data);
        $souvenir = $this->datasouvenir->getId($souvenir['idbrg']);
        $index = null;
        if($data != null){
            $index = array_search($souvenir->idbrg, array_column($data, 'idbrg'));
            $idbrgpencarian = ($data[$index]['idbrg'] == $souvenir->idbrg);
            // dd($idbrgpencarian);
            
        }
        // dd($data);
        if ($data == null || ($data[$index]['idbrg'] == $souvenir->idbrg) == false) {
            $data[] = [
                'nama' => $souvenir->namabrg,
                'idbrg' => $souvenir->idbrg,
                'harga' => $souvenir->harga,
                'diskon' => $souvenir->diskon,
                'namafile' => $souvenir->namafile,
                'jumlahjual' => 1
            ];
            $session->set('cart', $data);
        }
        else{

            $data[$index]['jumlahjual'] += 1; 
            $session->set('cart', $data);
        }
        return redirect()->to('/souvenir');

        $session = session();
        $data = $session->get('cart');

        return redirect()->to('/souvenir');
    }

    public function delete(){
        $session = session();
        $update = [];
        $session->set('cart', $update);

        return redirect()->to('/souvenir');
    }
}