<?php
namespace App\Controllers;
use App\Libraries\Datethai;

use App\Models\PositionModel;
use App\Models\LearningModel;
use App\Models\PersonnalModel;
use App\Models\AboutModel;

class ConPersonnal extends BaseController
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
        $data['PosiOther'] = $this->PosiModel->where(array('posi_id >='=>'posi_007','posi_id <='=>'posi_012'))->get()->getResult();
        $data['uri'] = service('uri'); 
        $data['AboutSchool'] = $this->AboutModel->get()->getResult();
        $data['v'] = $this->VisitorsUser();
        return $data;
    }

    public function PersonnalMain($PoisO = null,$Key = null){
        $data = $this->DataMain();
       
        $data['title'] = "บุคลากรภายในโรงเรียน";
        $data['description'] = "รายละเอียดข้อมูลบุคลากรภายในโรงเรียน";
        $data['banner'] = '';
        
        if($Key === "ผู้บริหารสถานศึกษา"){
            $CheckPosi = "pers_status='กำลังใช้งาน' && pers_position='posi_001' OR pers_position='posi_002'";
        }elseif($PoisO === 'สายการสอน'){
            $CheckLear = $this->LearModel->where('lear_namethai',str_replace("-", " ", $Key))->get()->getResult();
            $CheckPosi = ['pers_learning' => $CheckLear[0]->lear_id];           
        }elseif($PoisO === 'สายสนับสนุน'){
            $CheckLear = $this->PosiModel->where('posi_name',str_replace("-", " ", $Key))->get()->getResult();
            $CheckPosi = ['pers_position' => $CheckLear[0]->posi_id];
           
        }
        $data['Pers'] = $this->PersModel->select('
            skjacth_personnel.tb_personnel.pers_position,
            skjacth_skj.tb_position.posi_name,
            skjacth_personnel.tb_personnel.pers_prefix,
            skjacth_personnel.tb_personnel.pers_firstname,
            skjacth_personnel.tb_personnel.pers_lastname,
            skjacth_personnel.tb_personnel.pers_phone,
            skjacth_personnel.tb_personnel.pers_facebook,
            skjacth_personnel.tb_personnel.pers_instagram,
            skjacth_personnel.tb_personnel.pers_youtube,
            skjacth_personnel.tb_personnel.pers_line,
            skjacth_personnel.tb_personnel.pers_twitter,
            skjacth_personnel.tb_personnel.pers_img,
            skjacth_personnel.tb_personnel.pers_academic,
            skjacth_personnel.tb_personnel.pers_numberGroup,
            skjacth_personnel.tb_personnel.pers_groupleade,
            skjacth_personnel.tb_personnel.pers_status
        ')
        ->join('skjacth_skj.tb_position','skjacth_skj.tb_position.posi_id = skjacth_personnel.tb_personnel.pers_position')       
        ->where($CheckPosi)
        //->Where('pers_status','กำลังใช้งาน')
        ->orderBy('skjacth_personnel.tb_personnel.pers_groupleade DESC,skjacth_personnel.tb_personnel.pers_numberGroup ASC')
        ->get()->getResult();
        
        //echo '<pre>';print_r($data['Pers']);exit();

        return  view('layout/header',$data)
                .view('layout/navbar')
                .view('PagePersonnal/PagePersonnal')
                .view('layout/footer');
        
    }

   
}
