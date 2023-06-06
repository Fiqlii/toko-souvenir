<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Muser;
 
class Clogin extends Controller
{
    public function index()
    {
        helper(['form']);
        return view('login');
    } 
 
    public function auth()
    {
        
        $session = session();
        $model = new Muser();
        $nip = $this->request->getVar('nip');
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));
        $data = ['nip' => $nip, 'password' => $password];
        $data = $model->auth($data);
        // $model->where('username', $username)->first()
        if($data){
            $pass = $data->password;
            // $verify_pass = password_verify($password, $pass);
            if($pass == $password){
                $ses_data = [
                    'nip'       => $data->nip,
                    'username'     => $data->username,
                    'password'    => $data->password,
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/souvenir');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/');
            }
        }else{
            $session->setFlashdata('msg', 'username not Found');
            return redirect()->to('/');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
} 