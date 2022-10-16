<?php

namespace App\Controllers;
use App\Models\NewsModel;
use App\Models\BannerModel;

use App\Libraries\Datethai;

class ConHome extends BaseController
{
    public function index()
    {        
        $data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data['title'] = "โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์";
        $data['description'] = "เป็นผู้นำ รักเพื่อน นับถือพี่ เคารพครู กตัญญูพ่อแม่ ดูแลน้อง สนองคุณแผ่นดิน โรงเรียนสวนกุหลาบวิทยาลัย (จิรประวัติ) นครสวรรค์";
        $NewsModel = new NewsModel();
        $data['dateThai'] = new Datethai();
        $data['news'] = $NewsModel->limit(8)->orderBy('news_id', 'DESC')->get()->getResult();

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
