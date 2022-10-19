<?php

namespace App\Controllers;
use App\Models\NewsModel;
use App\Models\BannerModel;
use App\Libraries\Datethai;
use App\Models\PositionModel;
use App\Models\LearningModel;
use App\Models\PersonnalModel;

class ConHome extends BaseController
{
    public function __construct(){
        $this->PosiModel = new PositionModel();
        $this->LearModel = new LearningModel();
        $this->PersModel = new PersonnalModel();
    }
    public function index()
    {        
        $data['PosiOther'] = $this->PosiModel->where(array('posi_id >='=>'posi_007','posi_id <='=>'posi_010'))->get()->getResult();
        $data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data['title'] = "โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์";
        $data['description'] = "เป็นผู้นำ รักเพื่อน นับถือพี่ เคารพครู กตัญญูพ่อแม่ ดูแลน้อง สนองคุณแผ่นดิน โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์";
        $NewsModel = new NewsModel();
        $data['uri'] = service('uri'); 
        $data['dateThai'] = new Datethai();
        $data['news'] = $NewsModel->limit(8)->orderBy('news_id', 'DESC')->get()->getResult();
        $data['Lear'] = $this->LearModel->get()->getResult();
        $data['Director'] = $this->PersModel->where('pers_position','posi_001')->get()->getRow();
        $BannerModel = new BannerModel();
        $data['banner'] = $BannerModel->select('banner_id,banner_name,banner_img,banner_linkweb')
                                        ->where('banner_status','on')
                                        ->orderBy('banner_id', 'DESC')
                                        ->findAll();
       
        return  view('layout/header',$data)
                .view('layout/navbar')
                .view('Home/PageHomeMain')
                .view('layout/footer');
    }
}
