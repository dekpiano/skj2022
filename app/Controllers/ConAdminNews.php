<?php
namespace App\Controllers;
use App\Models\NewsModel;

class ConAdminNews extends BaseController
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

    public function NewsMain()
    {        
        $data = $this->DataMain();
        $data['title'] = "ข่าวประชาสัมพันธ์";
        $data['description'] = "รวมข่าวประชาสัมพันธ์ กิจกรรมต่าง ๆ ของโรงเรียน";
        $data['news'] = $this->NewsModel->get()->getResult();
        
        //print_r($data['news']);exit();
        
        return view('Admin/layout/AdminHeader',$data)
                .view('Admin/PageAdminNews/PageAdminNewsMain')
                .view('Admin/layout/AdminFooter');
    }

    public function NewsAdd(){
        // $this->request->getVar('news_topic')
        print_r($this->request->getFiles());
    }

}
