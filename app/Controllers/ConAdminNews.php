<?php
namespace App\Controllers;
use App\Models\NewsModel;

class ConAdminNews extends BaseController
{
    public $NewsModel;
    public function __construct(){
        $this->NewsModel = new NewsModel();
    }

    public function DataMain(){
        $session = session();
        $data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data['uri'] = service('uri'); 
        helper(['form', 'url']);        
        $data['AdminID'] = $session->get('AdminID');
        $data['AdminFullname'] = $session->get('AdminFullname');
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
        $data = $this->DataMain();

        $database = \Config\Database::connect();
        $builder = $database->table('tb_news');
        $checkID = $builder->select('news_id')->orderBy('news_id','DESC')->get()->getRow();
        $ex = explode('_',$checkID->news_id);
        $NewsIdNew = 'news_'.@sprintf("%03d",$ex[1]+1);

        $validateImg = $this->validate([
            'file' => [
                'mime_in[news_img,image/jpg,image/jpeg,image/png,image/gif]',
                'max_size[news_img,2024]',
            ]
        ]);

        if (!$validateImg) {           
           print_r('ไฟล์สกุลไม่ถูกต้อง หรือ ขนาดไฟล์เกิน 2 mb');
        } else {
            
        $imageFile = $this->request->getFile('news_img'); 
       
        if($imageFile->getError() == 0){
            $RandomName = $imageFile->getRandomName();

           if($imageFile->getSize() > 200000){
            $image = \Config\Services::image()
            ->withFile($imageFile)
            ->resize(2560, 1440, true, 'height')
            ->save(FCPATH.'/uploads/news/'. $RandomName);
            $NameImg = $RandomName;
           }else{
                $imageFile->move(FCPATH.'/uploads/news/');
                $NameImg = $imageFile->getClientName();
           }
   
            $data = [
               'news_id' => $NewsIdNew,
               'news_img' => $NameImg,
               'news_topic' =>  $this->request->getPost('news_topic'),
               'news_content' => $this->request->getPost('news_content'),
               'news_date' => $this->request->getPost('news_date'),
               'news_category' => $this->request->getPost('news_category'),
               'personnel_id' => $data['AdminID']
               ];
           $save = $builder->insert($data);
           echo $save;
            }else{
                $data = [
                    'news_id' => $NewsIdNew,
                    'news_topic' =>  $this->request->getPost('news_topic'),
                    'news_content' => $this->request->getPost('news_content'),
                    'news_date' => $this->request->getPost('news_date'),
                    'news_category' => $this->request->getPost('news_category'),
                    'personnel_id' => $data['AdminID']
                    ];
                $save = $builder->insert($data);
                echo $save;
            }
        }
    }

    public function NewsEdit(){
        $KeyNewsid = $this->request->getPost('KeyNewsid');
        $EditNews = $this->NewsModel->select('*,CAST(news_date AS DATE) AS news_dateNews')->where('news_id',$KeyNewsid)->get()->getResult();
        echo json_encode($EditNews);
        
    }

    public function NewsUpdate(){
        $data = $this->DataMain();

        $database = \Config\Database::connect();
        $builder = $database->table('tb_news');
        $id = $this->request->getPost('edit_news_id');
        $sel_img = $this->NewsModel->select('news_img')->where('news_id',$id)->get()->getResult();
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

    public function NewsDelete(){
        $id = $this->request->getPost('KeyNewsid');
        $sel_img = $this->NewsModel->select('news_img')->where('news_id',$id)->get()->getResult();
        if($sel_img[0]->news_img != ''){
            @unlink(("uploads/news/".$sel_img[0]->news_img));
        }
        
        $result = $this->NewsModel->delete(['news_id' => $id]);
        
        echo $result;
    }

}