<?php
namespace App\Controllers;
use App\Libraries\Datethai;

use App\Models\PositionModel;
use App\Models\LearningModel;
use App\Models\PersonnalModel;
use App\Models\AboutModel;

class ConGuidance extends BaseController
{
    public function __construct(){
        $this->PosiModel = new PositionModel();
        $this->LearModel = new LearningModel();
        $this->PersModel = new PersonnalModel();
        $this->AboutModel = new AboutModel();
    }

    public function DataMain(){
        $data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data['dateThai'] = new Datethai();
        $data['Lear'] = $this->LearModel->get()->getResult();
        $data['PosiOther'] = $this->PosiModel->where(array('posi_id >='=>'posi_007','posi_id <='=>'posi_010'))->get()->getResult();
        $data['uri'] = service('uri'); 
        $data['AboutSchool'] = $this->AboutModel->get()->getResult();
        return $data;
    }

    public function index(){
        $data = $this->DataMain();
       
        $data['title'] = "ทุนการศึกษา";
        $data['description'] = "รายละเอียดข้อมูลทุนการศึกษา";
        $data['banner'] = '';

        return  view('layout/header',$data)
                .view('layout/navbar')
                .view('PageGuidance/PageGuidanceMain')
                .view('layout/footer');
        
    }

   
}
