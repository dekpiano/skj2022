<?php 
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;


class NewsModel extends Model
{
    protected $table = 'tb_news';
    protected $primaryKey = 'news_id';
    
    protected $allowedFields = ['news_topic', 'news_content','news_img','news_date'];
}