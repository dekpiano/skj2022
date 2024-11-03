<?php

namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\NewsModel;
use App\Libraries\Datethai;
use App\Models\BannerModel;
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
        $this->BannerModel = new BannerModel();
       
    }

    public function DataMain(){
        $data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data['dateThai'] = new Datethai();
        $data['Lear'] = $this->LearModel->get()->getResult();
        $data['PosiOther'] = $this->PosiModel->where(array('posi_id >='=>'posi_007','posi_id <='=>'posi_010'))->get()->getResult();
        $data['uri'] = service('uri'); 
        $data['AboutSchool'] = $this->AboutModel->get()->getResult();
        $database = \Config\Database::connect();
        $data['DB'] = $database->table('tb_news');
        helper(['form', 'url']);
        $data['v'] = $this->VisitorsUser();
        return $data;
    }

    public function NewsMain(){
        
        $data = $this->DataMain();
        $data['title'] = "สกจ. ประชาสัมพันธ์";
        $data['description'] = "ข่าวและกิจกรรมภายในโรงเรียน";
        $data['banner'] = '';

        $request = service('request');
        $searchData = $request->getGet();

        $search = "";
        if(isset($searchData) && isset($searchData['search'])){
        $search = $searchData['search'];
        }

        if($search == ''){
            $paginateData = $this->NewsModel->orderBy('news_date', 'DESC')->paginate(20);
          }else{
            $paginateData = $this->NewsModel->select('*')
                ->orLike('news_topic', $search)
                ->orLike('news_category', $search)
                ->orLike('news_date', $search)
                ->orderBy('news_date', 'DESC')
                ->paginate(20);
          }

        $data['NewsAll' ] = $paginateData;
        $data['pager' ] = $this->NewsModel->pager;
        $data['search' ] = $search;
      
        //$data['NewsAll'] = $this->NewsModel->limit(4)->orderBy('news_date', 'DESC')->get()->getResult();

        //echo '<pre>';print_r($data['NewsAll']);exit();
        return  view('layout/header',$data)
                .view('layout/navbar')
                .view('PageNews/PageNewsMain')
                .view('layout/footer');
        
    }

    public function loadMoreNews(){
        $perPage = 10; // จำนวนข้อมูลต่อหน้า
        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        // คำนวณ offset สำหรับ pagination
        $offset = ($page - 1) * $perPage;

        // ดึงข้อมูลจากฐานข้อมูล
       
        $items = $this->NewsModel->limit($perPage, $offset)->orderBy('news_date', 'DESC')->get()->getResultArray();
        
        // นับจำนวนทั้งหมดในตาราง
        $totalItems =$this->NewsModel->countAllResults();

        $data = [
            'items' => $items,
            'pager' => [
                'total' => $totalItems,
                'currentPage' => $page,
                'perPage' => $perPage,
                'lastPage' => ceil($totalItems / $perPage)
            ]
        ];

        return $this->response->setJSON($data); // ส่งข้อมูลในรูปแบบ JSON
    }

    public function loadMoreNews1(){
        $data['dateThai'] = new Datethai();
        $limit = 4; 
        $page = $limit * $this->request->getVar('page');
        $data['NewsAll'] = $this->fetchData($limit,$page);
        return view('PageNews/PageNewsLoadMore', $data);
        //print_r($data['NewsAll']);
    }

   function fetchData($limit,$offset = ''){
        $dbQuery = $this->NewsModel->select('*')->limit($limit,$offset)->orderBy('news_date', 'DESC')->get();
        return $dbQuery->getResult();
    }

    public function NewsDetail($KeyNews)
    {    
        $data = $this->DataMain();
       
        $data['news'] = $this->NewsModel->where('news_id',$KeyNews)->orderBy('news_date', 'DESC')->get()->getRow();
        $data['NewsLatest'] = $this->NewsModel->limit(3)->orderBy('news_date', 'DESC')->get()->getResult();

        $data['title'] = $data['news']->news_topic ." | สกจ. ประชาสัมพันธ์";
        $data['description'] = mb_strimwidth(strip_tags($data['news']->news_content),0,100,'...');
        $data['banner'] = base_url('uploads/news/'.$data['news']->news_img);

        $dataUpdate = [
            'news_view' => ($data['news']->news_view + 1)
        ];
        $data['DB']->where('news_id',$KeyNews);
        $data['DB']->update($dataUpdate);

        return  view('layout/header',$data)
                .view('layout/navbar')
                .view('PageNews/PageNewsDetail')
                .view('layout/footer');
    }

    public function NewsCountRead(){
        $data = $this->DataMain();
       
        $dataUpdate = [
            'news_view' => ($this->request->getVar('Data_View') + 1)
        ];
        $data['DB']->where('news_id',$this->request->getVar('NewsID'));
        echo $data['DB']->update($dataUpdate);
        
    }

    public function pr(){
        $data = $this->DataMain();
        $data['title'] = "สกจ. ประชาสัมพันธ์";
        $data['description'] = "";
        $data['banner'] = "";

        $data['banner'] = $this->BannerModel->select('banner_id,banner_name,banner_img,banner_linkweb,banner_status')
        ->where('banner_status','on')
        ->orderBy('banner_id', 'DESC')
        ->findAll();

        return  view('PagePr/PagePrMain',$data);
                
    }
}
