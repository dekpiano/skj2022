<?php
namespace App\Controllers;
use App\Models\NewsModel;

class ConAdminDashboard extends BaseController
{
    public function __construct(){
        //$this->session = \Config\Services::session();
        $this->NewsModel = new NewsModel();
    }

    public function DataMain(){
        $session = session();
        $data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data['uri'] = service('uri'); 
        helper(['form', 'url']);        
        $data['AdminID'] = $session->get('AdminID');
        $data['AdminFullname'] = $session->get('AdminFullname');
        return $data;
    }

    public function index()
    {        
        
        $data = $this->DataMain();
        $data['title'] = "หน้าแรก";
        $data['description'] = "ภาพรวมของระบบ";
        
        
        return view('Admin/layout/AdminHeader',$data)
                .view('Admin/PageAdminDashboard')
                .view('Admin/layout/AdminFooter');
    }

}
