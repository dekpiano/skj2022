<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\PersonnalModel;


require_once APPPATH . '../../../librarie_skj/google_sheet/vendor/autoload.php';
use Google_Client;
use Google_Service_Oauth2;

class ConLogin extends BaseController
{
    public function __construct(){
        parent::__construct();
        $this->LoginModel = new LoginModel();
        $this->PersModel = new PersonnalModel();
    }

    public function googleLogin()
    {
        $client = new Google_Client();
        $client->setClientId('29638025169-aeobhq04v0lvimcjd27osmhlpua380gl.apps.googleusercontent.com');
        $client->setClientSecret('RSANANTRl84lnYm54Hi0icGa');
        $client->setRedirectUri(base_url('SkjMain/googleCallback'));
        $client->addScope('email');
        $client->addScope('profile');

        // สร้าง URL สำหรับให้ผู้ใช้ล็อกอิน
        $loginUrl = $client->createAuthUrl();
        return redirect()->to($loginUrl); // เปลี่ยนเส้นทางไปยัง URL ของ Google OAuth
    }

    public function googleCallback()
    {
        $client = new Google_Client();
        $client->setClientId('29638025169-aeobhq04v0lvimcjd27osmhlpua380gl.apps.googleusercontent.com');
        $client->setClientSecret('RSANANTRl84lnYm54Hi0icGa');
        $client->setRedirectUri(base_url('SkjMain/googleCallback'));

        if ($this->request->getGet('code')) {
            $token = $client->fetchAccessTokenWithAuthCode($this->request->getGet('code'));
            $client->setAccessToken($token);

            $googleService = new Google_Service_Oauth2($client);
            $userData = $googleService->userinfo->get();

            $CheckUser = $this->PersModel->select('pers_id')->Where('pers_username',$userData->email)->first();
            if($CheckUser){
                // ใช้ข้อมูลผู้ใช้ตามต้องการ เช่น บันทึกในฐานข้อมูล
                session()->set([
                    'AdminID' => $CheckUser['pers_id'],
                    'AdminFullname' => $userData->name,
                    'AdminEmail' => $userData->email,
                    'logged_in' => true,
                ]);
    
                return redirect()->to('/Admin/Dashboard'); // เปลี่ยนเส้นทางหลังจากล็อกอินสำเร็จ
            }else{
                session()->setFlashdata('msg', 'ไม่พบบัญชีผู้ใช้นี้ในระบบ หรือ ไม่เป็นผู้ดูแลระบบ');
                return redirect()->to('/');
            }
        } else {
            return redirect()->to('/auth/googleLogin');
        }
    }

    public function LoginAdmin(){
        
        $session = session();
        // $data = $this->DataMain(); // REMOVED
        $pass = $this->LoginModel->findAll();

        $username = $this->request->getVar('Username');
        $password = $this->request->getVar('Password');
        $pass = $this->LoginModel->where('admin_username', $username)->first();

        $authenticatePassword = password_verify($password, $pass['admin_password']);
        if($authenticatePassword){
            $set_data = [
                'AdminID'=>$pass['admin_id'],
                'AdminFullname'=>$pass['admin_fullname'],
                'AdminUsername'=>$pass['admin_username']
            ];
            $session->set($set_data);
            return redirect()->to('/Admin/Dashboard');
        }else{
            $session->setFlashdata('msg', 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
            return redirect()->to('/');
        }
    }

    public function LogoutAdmin()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

}
