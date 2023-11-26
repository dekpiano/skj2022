<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LoginModel;

class ConLogin extends BaseController
{
    public function __construct(){
        $this->LoginModel = new LoginModel();
       
    }

    public function DataMain(){
        $data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data['uri'] = service('uri'); 
        helper(['form', 'url']);
        $data['v'] = $this->VisitorsUser();
        return $data;
    }

    public function LoginAdmin(){
        
        $session = session();
        $data = $this->DataMain();
        $pass = $this->LoginModel->findAll();

        $username = $this->request->getVar('Username');
        $password = $this->request->getVar('Password');
        $pass = $this->LoginModel->where('admin_username', $username)->first();

        $authenticatePassword = password_verify($password, $pass['admin_password']);
        if($authenticatePassword){
            $set_data = [
                'AdminID'=>$pass['admin_id'],
                'AdminFullname'=>$pass['admin_fullname'],
                'AdminUsername'=>$pass['admin_username']
            ];
            $session->set($set_data);
            return redirect()->to('/Admin/Dashboard');
        }else{
            $session->setFlashdata('msg', 'Password is incorrect.');
            //return redirect()->to('/');
            echo password_hash("48154886", PASSWORD_DEFAULT);
        }

        // return  view('layout/header',$data)
        //         .view('layout/navbar')
        //         .view('PageNews/PageNewsMain')
        //         .view('layout/footer');
        
    }

    public function LogoutAdmin()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

}
