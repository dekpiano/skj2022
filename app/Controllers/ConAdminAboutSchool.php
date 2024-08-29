<?php
namespace App\Controllers;
use App\Models\NewsModel;
use App\Models\AboutModel;

class ConAdminAboutSchool extends BaseController
{
    public function __construct(){
        //$this->session = \Config\Services::session();
        $this->NewsModel = new NewsModel();
        $this->AboutModel = new AboutModel();
    }

    public function DataMain(){
        $session = session();
        $data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data['uri'] = service('uri'); 
        helper(['form', 'url']);        
        $data['AdminID'] = $session->get('AdminID');
        $data['AdminFullname'] = $session->get('AdminFullname');
        $data['AboutSchool'] = $this->AboutModel->get()->getResult();
        return $data;
    }

    public function AboutSchoolDetail($key)
    {        
        
        $data = $this->DataMain();
        $data['title'] = "จัดการข้อมูลเกี่ยวกับโรงเรียน";
        $data['description'] = "ภาพรวมของระบบ จัดการข้อมูลเกี่ยวกับโรงเรียน";
        $data['AboutSchoolDetail'] = $this->AboutModel->where('about_id',$key)->get()->getRow();

        //print_r($data['AboutSchoolDetail']); exit();
        
        return view('Admin/layout/AdminHeader',$data)
                .view('Admin/PageAdminAboutSchool/PageAdminAboutSchoolUpdate')
                .view('Admin/layout/AdminFooter');
    }

    public function AboutSchoolEdit($key){
        $data['AboutSchoolDetail'] = $this->AboutModel->where('about_id',$key)->get()->getRow();
        echo json_encode($data['AboutSchoolDetail']);
    }

    public function AboutSchoolUpdate($key){   
        $database = \Config\Database::connect();
        $builder = $database->table('tb_aboutschool');

        $data = [              
            'about_detail' =>  $this->request->getPost('About_content')
            ];
                $builder->where('about_id',  $key);
        $save = $builder->update($data);

        echo $save;
    }

}
