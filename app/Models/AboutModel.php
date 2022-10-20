<?php 
namespace App\Models;
use CodeIgniter\Model;


class AboutModel extends Model
{
    protected $table = 'tb_aboutschool';
    protected $primaryKey = 'about_id';
    
    protected $allowedFields = ['about_menu', 'about_detail'];
}