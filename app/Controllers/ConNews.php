<?php

namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NewsModel;
use App\Libraries\Datethai;

use App\Models\PositionModel;
use App\Models\LearningModel;
use App\Models\PersonnalModel;
use App\Models\AboutModel;

class ConNews extends BaseController
{
    public function __construct(){
        $this->NewsModel = new NewsModel();
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
        helper(['form', 'url']);
        return $data;
    }

    public function NewsMain(){
        
        $data = $this->DataMain();
        $data['title'] = "สกจ. ประชาสัมพันธ์";
        $data['description'] = "ข่าวและกิจกรรมภายในโรงเรียน";
        $data['banner'] = '';
        // $data = [
        //     'NewsAll' => $this->NewsModel->paginate(4),
        //     'pager' => $this->NewsModel->pager
        // ];

        $data['NewsAll'] = $this->NewsModel->limit(4)->orderBy('news_id', 'DESC')->get()->getResult();

        return  view('layout/header',$data)
                .view('layout/navbar')
                .view('PageNews/PageNewsMain')
                .view('layout/footer');
        
    }

    public function loadMoreNews(){
        $data['dateThai'] = new Datethai();
        $limit = 4; 
        $page = $limit * $this->request->getVar('page');
        $data['NewsAll'] = $this->fetchData($limit,$page);
        return view('PageNews/PageNewsLoadMore', $data);
        //print_r($data['NewsAll']);
    }

   function fetchData($limit,$offset = ''){
        $dbQuery = $this->NewsModel->select('*')->limit($limit,$offset)->orderBy('news_id', 'DESC')->get();
        return $dbQuery->getResult();
    }

    public function NewsDetail($KeyNews)
    {    
        $data = $this->DataMain();
       
        $data['news'] = $this->NewsModel->where('news_id',$KeyNews)->orderBy('news_id', 'DESC')->get()->getRow();
        $data['NewsLatest'] = $this->NewsModel->limit(3)->orderBy('news_id', 'DESC')->get()->getResult();

        $data['title'] = $data['news']->news_topic ." | สกจ. ประชาสัมพันธ์";
        $data['description'] = mb_strimwidth(strip_tags($data['news']->news_content),0,100,'...');
        $data['banner'] = '';

        return  view('layout/header',$data)
                .view('layout/navbar')
                .view('PageNews/PageNewsDetail')
                .view('layout/footer');
    }
}
