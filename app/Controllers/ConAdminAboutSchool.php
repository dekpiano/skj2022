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
        $data['AboutSchoolDetail'] = $this->AboutModel->where('id',$key)->get()->getRow();

        //print_r($data['AboutSchool']); exit();
        
        return view('Admin/layout/AdminHeader',$data)
                .view('Admin/PageAdminAboutSchool/PageAdminAboutSchoolUpdate')
                .view('Admin/layout/AdminFooter');
    }

    public function AboutSchoolEdit($key){
        $data['AboutSchoolDetail'] = $this->AboutModel->where('id',$key)->get()->getRow();
        echo json_encode($data['AboutSchoolDetail']);
    }

    public function AboutSchoolUpdate($key){   
        $session = session();
        $database = \Config\Database::connect();
        $builder = $database->table('tb_aboutschool');

        $data = [              
            'about_menu'         => $this->request->getPost('about_menu'),
            'about_detail'       => $this->request->getPost('About_content'),
            'about_date'         => date('Y-m-d H:i:s'),
            'about_personnel_id' => $session->get('AdminID')
        ];
        $builder->where('id',  $key);
        $save = $builder->update($data);

        echo $save;
    }

    public function AboutSchoolAdd(){
        $session = session();
        $save = $this->AboutModel->save([
            'about_menu'         => $this->request->getPost('about_menu'),
            'about_detail'       => $this->request->getPost('About_content'),
            'about_date'         => date('Y-m-d H:i:s'),
            'about_personnel_id' => $session->get('AdminID')
        ]);
        echo $save;
    }

}
