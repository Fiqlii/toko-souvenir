<?php namespace App\Models;

use CodeIgniter\Model;

class Muser extends Model
{
    /**
     * table name
     */
    protected $table = "admin";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'username',
        'password'
    ]; 

    public function auth($user){
        $db = \Config\Database::connect();
        $nip = $user['nip'];
        $password = $user ['password'];
        $admin = $db->query("SELECT * FROM users WHERE nip = '$nip' and password ='$password'");
        $admin = $admin->getRow();
        return  $admin;
    }
}