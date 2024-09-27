<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\UserHistoryModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    public function __construct(){
        $this->UserHistoryModel = new UserHistoryModel();
    }

    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['form', 'url'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    function VisitorsUser (){
        $database = \Config\Database::connect();
        $visit = $database->table('tb_visit_user_history');
        $visit_stats = $database->table('tb_visit_user_stats');

        $userIP = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $visit->insert([
            'visitU_date' => date('Y-m-d'),
            'visitU_ip' => $userIP,
            'visitU_agent' => $userAgent,
            'visitU_count' => 1
        ]);

        $current_time = date('Y-m-d');
        $time_24_hours_ago = date('Y-m-d', strtotime('-1 week'));

        // แปลงเป็น timestamps
        $start_timestamp = strtotime($time_24_hours_ago);
        $current_timestamp = strtotime($current_time);

        // คำนวณจำนวนวัน
        $days_passed = ($current_timestamp - $start_timestamp) / (60 * 60 * 24);
        if(floor($days_passed) >= 7){
            $checkTime = $visit->select("COUNT(*) AS visit_count")
            ->where("visitU_date <=", $current_time)
            ->where("visitU_date >=", $time_24_hours_ago)
            ->get()->getResult();
    
            
            $visitAll = $visit->select('
            COUNT(visitU_ip) AS visitAll,
            ')->get()->getResult();  
            $VisitToday = $visit->select('COUNT(DISTINCT(visitU_ip)) AS VisitToday')
            ->where('visitU_date <',date("Y-m-d"))->get()->getResult();
            $visitMouth = $visit->select('COUNT(DISTINCT(visitU_ip)) AS visitMouth')
            ->where('MONTH(visitU_date) <=',date("m"))
            ->where('YEAR(visitU_date) <=',date("Y"))
            ->get()->getResult();
            $visitYear = $visit->select('COUNT(DISTINCT(visitU_ip)) AS visitYear')
            ->where('YEAR(visitU_date) <= ',date("Y"))
            ->get()->getResult();

            $checkUserStats = $visit_stats->where('visit_stats_id',1)->get()->getResult();


            $update = array(
                'visit_stats_All' => ($visitAll[0]->visitAll+$checkUserStats[0]->visit_stats_All),
                'visit_stats_Today' => ($VisitToday[0]->VisitToday+$checkUserStats[0]->visit_stats_Today),
                'visit_stats_Mouth' => ($visitMouth[0]->visitMouth+$checkUserStats[0]->visit_stats_Mouth),
                'visit_stats_Year' => ($visitYear[0]->visitYear+$checkUserStats[0]->visit_stats_Year)
            );
            $visit_stats->where('visit_stats_id',1);
            $sql = $visit_stats->update($update);

            $visit->where('visitU_date >',$current_timestamp)->delete();
            
        }

        
        $checkUserStats = $visit_stats->where('visit_stats_id',1)->get()->getResult();
        $data['visitAll'] = $checkUserStats[0]->visit_stats_All;  
        $data['VisitToday'] = $checkUserStats[0]->visit_stats_Today;
        $data['visitMouth'] = $checkUserStats[0]->visit_stats_Mouth;
        $data['visitYear'] = $checkUserStats[0]->visit_stats_Year;

        return $data;
    }
}
