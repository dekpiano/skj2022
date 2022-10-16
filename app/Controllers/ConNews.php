<?php

namespace App\Controllers;
use App\Models\NewsModel;
use App\Libraries\Datethai;

class ConNews extends BaseController
{
    public function __construct(){
        $this->NewsModel = new NewsModel();
       
    }

    public function DataMain(){
        $data['full_url'] = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data['dateThai'] = new Datethai();
        return $data;
    }

    public function NewsMain(){
        $data = $this->DataMain();
        $data['title'] = "สกจ. ประชาสัมพันธ์";
        $data['description'] = "ข่าวและกิจกรรมภายในโรงเรียน";
        $data['banner'] = '';

        $data['NewsAll'] = $this->NewsModel->orderBy('news_id', 'DESC')->get()->getResult();

        return  view('layout/header',$data)
                .view('layout/navbar')
                .view('PageNews/PageNewsMain')
                .view('layout/footer');
        
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
