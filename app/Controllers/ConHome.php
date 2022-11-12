<?php

namespace App\Controllers;
use App\Models\NewsModel;
use App\Models\BannerModel;
use App\Libraries\Datethai;
use App\Models\PositionModel;
use App\Models\LearningModel;
use App\Models\PersonnalModel;
use App\Models\AboutModel;


class ConHome extends BaseController
{
    public function __construct(){
        $this->PosiModel = new PositionModel();
        $this->LearModel = new LearningModel();
        $this->PersModel = new PersonnalModel();
        $this->NewsModel = new NewsModel();
        $this->BannerModel = new BannerModel();
        $this->AboutModel = new AboutModel();
    }

    public function DataMain(){
        $data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data['dateThai'] = new Datethai();
        $data['Lear'] = $this->LearModel->get()->getResult();
        $data['PosiOther'] = $this->PosiModel->where(array('posi_id >='=>'posi_007','posi_id <='=>'posi_010'))->get()->getResult();
        $data['AboutSchool'] = $this->AboutModel->get()->getResult();
        $data['uri'] = service('uri'); 
        return $data;
    }

    public function index()
    {        
        $data = $this->DataMain();
     
        $data['title'] = "โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์";
        $data['description'] = "เป็นผู้นำ รักเพื่อน นับถือพี่ เคารพครู กตัญญูพ่อแม่ ดูแลน้อง สนองคุณแผ่นดิน โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์";
        $data['news'] = $this->NewsModel->limit(6)->orderBy('news_id', 'DESC')->get()->getResult();
       
        $data['Director'] = $this->PersModel->where('pers_position','posi_001')->get()->getRow();
      
        $data['banner'] = $this->BannerModel->select('banner_id,banner_name,banner_img,banner_linkweb,banner_status')
                                        ->where('banner_status','on')
                                        ->orderBy('banner_id', 'DESC')
                                        ->findAll();
                       
      
        return  view('layout/header',$data)
                .view('layout/navbar')
                .view('Home/PageHomeMain')
                .view('layout/footer');
    }


    function PageGroup(){
        $data = $this->DataMain();
        $data['title'] = "กลุ่มภายในโรงเรียน";
        $data['description'] = "กลุ่มภายในโรงเรียน โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์";

        return  view('layout/header',$data)
                .view('layout/navbar')
                .view('PageGroup/PageGroupMain')
                .view('layout/footer');
    }

}
