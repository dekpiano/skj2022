<?php
namespace App\Controllers;
use App\Models\BannerModel;
use App\Models\AboutModel;

class ConAdminBanner extends BaseController
{
    public function __construct(){
        $this->BannerModel = new BannerModel();
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

    public function BannerMain()
    {        
        $data = $this->DataMain();
        $data['title'] = "แบนเนอร์ประชาสัมพันธ์";
        $data['description'] = "รวมแบนเนอร์ประชาสัมพันธ์ กิจกรรมต่าง ๆ ของโรงเรียน";
        $data['banner'] = $this->BannerModel->orderBy('banner_date','DESC')->get()->getResult();
        
        //print_r($data['news']);exit();
        
        return view('Admin/layout/AdminHeader',$data)
                .view('Admin/PageAdminBanner/PageAdminBannerMain')
                .view('Admin/layout/AdminFooter');
    }

    public function BannerOnoff(){
        $database = \Config\Database::connect();
        $builder = $database->table('tb_banner');
        $data = array('banner_status' => $this->request->getPost('Onoffstatus'));
        $builder->where('banner_id',  $this->request->getPost('Keystatus'));
        $update =  $builder->update($data);
        echo $this->request->getPost('Keystatus');
    }

    public function BannerAdd(){
        $data = $this->DataMain();

        $database = \Config\Database::connect();
        $builder = $database->table('tb_banner');      

        $validateImg = $this->validate([
            'file' => [
                'mime_in[banner_img,image/jpg,image/jpeg,image/png,image/gif]',
                'max_size[banner_img,2024]',
            ]
        ]);

        if (!$validateImg) {           
           print_r('ไฟล์สกุลไม่ถูกต้อง หรือ ขนาดไฟล์เกิน 2 mb');
        } else {
            
        $imageFile = $this->request->getFile('banner_img'); 
       
        if($imageFile->getError() == 0){
            $RandomName = $imageFile->getRandomName();
           
            $image = \Config\Services::image()
            ->withFile($imageFile)
            ->resize(1920, 720, false, 'auto')
            ->save(FCPATH.'/uploads/banner/all/'. $RandomName);
            $NameImg = $RandomName;
             
            $data = [               
               'banner_img' => $NameImg,
               'banner_name' =>  $this->request->getPost('banner_name'),
               'banner_linkweb' => $this->request->getPost('banner_linkweb'),
               'banner_date' => $this->request->getPost('banner_date'),
               'banner_status' => 'on',
               'banner_personnel_id' => $data['AdminID']
               ];
                $save = $builder->insert($data);
                echo $save;
            }else{
                $data = [
                    'banner_name' =>  $this->request->getPost('banner_name'),
                    'banner_linkweb' => $this->request->getPost('banner_linkweb'),
                    'banner_date' => $this->request->getPost('banner_date'),
                    'banner_status' => 'on',
                    'banner_personnel_id' => $data['AdminID']
                    ];
                $save = $builder->insert($data);
                echo $save;
            }
        }
    }

    public function NewsEdit(){
        $KeyNewsid = $this->request->getPost('KeyNewsid');
        $EditNews = $this->BannerModel->select('*,CAST(news_date AS DATE) AS news_dateNews')->where('news_id',$KeyNewsid)->get()->getResult();
        echo json_encode($EditNews);
        
    }

    public function NewsUpdate(){
        $data = $this->DataMain();

        $database = \Config\Database::connect();
        $builder = $database->table('tb_news');
        $id = $this->request->getPost('edit_news_id');
        $sel_img = $this->BannerModel->select('news_img')->where('news_id',$id)->get()->getResult();
        if($sel_img[0]->news_img != ''){
            @unlink(("uploads/news/".$sel_img[0]->news_img));
        }

        $imageFile = $this->request->getFile('edit_news_img'); 
        if($imageFile->getError() == 0){
            $RandomName = $imageFile->getRandomName();

            $image = \Config\Services::image()
            ->withFile($imageFile)
            ->resize(2560, 1440, true, 'height')
            ->save(FCPATH.'/uploads/news/'. $RandomName);
   
            $data = [              
               'news_img' => $RandomName,
               'news_topic' =>  $this->request->getPost('edit_news_topic'),
               'news_content' => $this->request->getPost('edit_news_content'),
               'news_date' => $this->request->getPost('edit_news_date'),
               'news_category' => $this->request->getPost('edit_news_category'),
               'personnel_id' => $data['AdminID']
               ];
                    $builder->where('news_id',  $this->request->getPost('edit_news_id'));
            $save = $builder->update($data);
           echo $save;
        }else{
            $data = [              
                'news_topic' =>  $this->request->getPost('edit_news_topic'),
                'news_content' => $this->request->getPost('edit_news_content'),
                'news_date' => $this->request->getPost('edit_news_date'),
                'news_category' => $this->request->getPost('edit_news_category'),
                'personnel_id' => $data['AdminID']
                ];
                    $builder->where('news_id',  $this->request->getPost('edit_news_id'));
            $save = $builder->update($data);
            echo $save;
        }
    }

    public function BannerDelete(){
        $id = $this->request->getPost('KeyBannerid');
        $sel_img = $this->BannerModel->select('banner_img')->where('banner_id',$id)->get()->getResult();
        if($sel_img[0]->banner_img != ''){
            @unlink("uploads/banner/all/".$sel_img[0]->banner_img);
        }        
        $result = $this->BannerModel->delete(['banner_id' => $id]);        
        echo $result;
    }

}