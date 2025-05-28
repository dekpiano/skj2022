<?php
namespace App\Controllers;
use App\Models\NewsModel;
use App\Models\AboutModel;

class ConAdminNews extends BaseController
{
    public function __construct(){
        
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

    public function NewsMain()
    {        
        $data = $this->DataMain();
        $data['title'] = "ข่าวประชาสัมพันธ์";
        $data['description'] = "รวมข่าวประชาสัมพันธ์ กิจกรรมต่าง ๆ ของโรงเรียน";
        $data['news'] = $this->NewsModel->get()->getResult();
        
        //print_r($data['news']);exit();
        //$this->AddNewsFormFacebook(); exit();
        return view('Admin/layout/AdminHeader',$data)
                .view('Admin/PageAdminNews/PageAdminNewsMain')
                .view('Admin/layout/AdminFooter');
    }

    public function NewsAdd(){
        $data = $this->DataMain();

        $database = \Config\Database::connect();
        $builder = $database->table('tb_news');
        $checkID = $builder->select('news_id')->orderBy('news_id','DESC')->get()->getRow();
        if($checkID){
            $ex = explode('_',$checkID->news_id);
            $NewsIdNew = 'news_'.@sprintf("%03d",$ex[1]+1);
        }else{
            $NewsIdNew = 'news_001';
        }
       

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
        
        $imageFile = $this->request->getFile('edit_news_img'); 
        if($imageFile->getError() == 0){
            if($sel_img[0]->news_img != ''){
                @unlink(("uploads/news/".$sel_img[0]->news_img));
            }

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


    public function ViewNewsFormFacebook(){
        // ดึงโพสต์จาก Facebook Graph API ถาวร
        $access_token = "EAADjhb2HZCFABO8GJfcN3oL964ZAtJUWt9WbpfvGqIgxnXroVx7OXNSb7ySYMZCOMnh20ymyXLoH6dxtQYtG9oInZAugNqMuddOdOFNtutZBpdqgA7WbvR175W5sOX4CsZACvnQbQNynPLsZAPXZCZBHaJugVxiO2P0XrCeYyVIH5XfUfiRZBLJkqNZB0X5xPg2OvEerELGhtqcWhpZCSZC4ZD";
        $page_id = "230288483730783";
        $url = "https://graph.facebook.com/v12.0/$page_id/posts?fields=id,message,created_time,full_picture,attachments&access_token=$access_token";
        
        // ตรวจสอบการดึงข้อมูล
        $response = @file_get_contents($url);
        if ($response === FALSE) {
            // แสดงข้อความข้อผิดพลาดหากเกิดข้อผิดพลาดในการดึงข้อมูล
            echo "Error fetching data from Facebook. Please check your Access Token and Page ID.";
        } else {
            echo json_encode($response, true);

        }
    }

    public function SelectNewsFormFacebook(){

        $access_token = "EAADjhb2HZCFABO8GJfcN3oL964ZAtJUWt9WbpfvGqIgxnXroVx7OXNSb7ySYMZCOMnh20ymyXLoH6dxtQYtG9oInZAugNqMuddOdOFNtutZBpdqgA7WbvR175W5sOX4CsZACvnQbQNynPLsZAPXZCZBHaJugVxiO2P0XrCeYyVIH5XfUfiRZBLJkqNZB0X5xPg2OvEerELGhtqcWhpZCSZC4ZD";
        $page_id = $this->request->getVar('KeyNewsFB');
        $url = "https://graph.facebook.com/{$page_id}?fields=id,message,created_time,full_picture,attachments&access_token={$access_token}";

        
        // ตรวจสอบการดึงข้อมูล
        $response = @file_get_contents($url);
        if ($response === FALSE) {
            // แสดงข้อความข้อผิดพลาดหากเกิดข้อผิดพลาดในการดึงข้อมูล
            echo "Error fetching data from Facebook. Please check your Access Token and Page ID.";
        } else {
            echo json_encode($response, true);

        }

    }

     function utf8ize($mixed) {
        if (is_array($mixed)) {
            foreach ($mixed as $key => $value) {
                $mixed[$key] = utf8ize($value);
            }
        } elseif (is_string($mixed)) {
            return mb_convert_encoding($mixed, 'UTF-8', 'UTF-8');
        }
        return $mixed;
    }


    function downloadFacebookImage($imageUrl, $savePath) {
        $context = stream_context_create([
            "http" => [
                "header" => "User-Agent: Mozilla/5.0" // บางกรณี Facebook จะไม่ให้โหลดถ้าไม่มี User-Agent
            ]
        ]);
        $imageContent = file_get_contents($imageUrl, false, $context);
        if ($imageContent === false) {
            return false;
        }
        return file_put_contents($savePath, $imageContent);
    }

    public function NewsAddFeacbook(){
        $data = $this->DataMain();

        $database = \Config\Database::connect();
        $builder = $database->table('tb_news');
        $checkID = $builder->select('news_id')->orderBy('news_id','DESC')->get()->getRow();
        if($checkID){
            $ex = explode('_',$checkID->news_id);
            $NewsIdNew = 'news_'.@sprintf("%03d",$ex[1]+1);
        }else{
            $NewsIdNew = 'news_001';
        }
      
            $imageUrl = $this->request->getPost('news_img_facebook'); // ใส่ URL รูปภาพที่ต้องการดาวน์โหลด
            if (empty($imageUrl)) {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'ไม่พบ URL รูปภาพ'
                ]);
            }
            $randomFileName = uniqid('image_', true) . '.jpg'; 
            $savePath = 'uploads/news/'. $randomFileName; // กำหนดโฟลเดอร์และชื่อไฟล์
            
         if (copy($imageUrl, $savePath)) {
        echo "บันทึกสำเร็จ!";
        } else {
            echo "บันทึกไม่สำเร็จ!";
        }
       
        // exit();
        $data = [
            'news_id' => $NewsIdNew,
            'news_img' => $randomFileName,
            'news_facebook' => $this->request->getVar('sel_NewsFromFacebook'),
            'news_topic' =>  $this->request->getVar('news_topic_facebook'),
            'news_content' => $this->request->getVar('news_content_facebook'),
            'news_date' => $this->request->getVar('news_date_facebook'),
            'news_category' => $this->request->getVar('news_category_facebook'),
            'personnel_id' => $data['AdminID']
            ];
        $save = $builder->insert($data);
       
    }

}