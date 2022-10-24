<?php
namespace App\Controllers;
use App\Models\NewsModel;

class ConAdminDashboard extends BaseController
{
    public function __construct(){
        $this->NewsModel = new NewsModel();
    }

    public function DataMain(){
        $data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data['uri'] = service('uri'); 
        helper(['form', 'url']);
        return $data;
    }

    public function index()
    {        
        $data = $this->DataMain();

        echo "ยินดีต้อนรับจร้า";
    }

}
