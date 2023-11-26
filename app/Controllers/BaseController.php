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

        $userIP = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $visit->insert([
            'visitU_date' => date('Y-m-d'),
            'visitU_ip' => $userIP,
            'visitU_agent' => $userAgent,
            'visitU_count' => 1
        ]);
        
        $data['visitAll'] = $visit->select('
            COUNT(visitU_ip) AS visitAll,
        ')->get()->getResult();  
        $data['VisitToday'] = $visit->select('COUNT(DISTINCT(visitU_ip)) AS VisitToday')
        ->where('visitU_date',date("Y-m-d"))->get()->getResult();
        $data['visitMouth'] = $visit->select('COUNT(DISTINCT(visitU_ip)) AS visitMouth')
        ->where('MONTH(visitU_date)',date("m"))
        ->where('YEAR(visitU_date)',date("Y"))
        ->get()->getResult();
        $data['visitYear'] = $visit->select('COUNT(DISTINCT(visitU_ip)) AS visitYear')
        ->where('YEAR(visitU_date)',date("Y"))
        ->get()->getResult();

        return $data;
    }
}
