<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Integrations\StmlnPortal;

class UnityController extends Controller
{
    public $bearer;
    public $csrf;

    public function __construct() {
        $this->bearer = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjk5OTI2NiwiaWF0IjoxNjQzODI2MzQ2LCJqdGkiOiJhNjdkZDhmYi1iYmZjLTRiMjQtYjdkNi1jZjEyOTJhOGI2NzUifQ.rNTxlmg3G9ZzpVZos2nIFNBpWYMLDZ5Gt6FYyPWhJJU';
        $this->csrf = 'vC3vDCuuGVOzuFgeueaolR-No2oeCaOnalix30OX4QLnEXvVAXeoXGeil_a_9Uj7a_mL7H9Q_JDKHXjzeoYR7A';
    }

    public function get() {
        $page_title = 'Compaign';
        $page_description = 'Some description for the page';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
		
        $action = 'unity';

        return view('unity.index', compact('page_title', 'page_description','action','logo','logoText'));
    }

    public function searchUnity(Request $request) {
        
        $page = request()->input('page') ?? 1;
        $per_page = request()->input('per_page') ?? 50;
        $query = request()->input('query');

        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->searchRunners($query, $page, $per_page);
        
        return response()->json($data);
    }

    public function getMetric(Request $request) {
        $unit_id = request()->input('unit_id') ? request()->unit_id : '';

        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getMetric($unit_id);
        
        return response()->json($data);
    }

    public function getUnity(Request $request) {
        $unit_id = request()->input('unit_id') ? request()->unit_id : '';

        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getUnity($unit_id);

        return response()->json($data);
    }

    public function getContacts(Request $request) {
        $unit_id = request()->input('unit_id') ? request()->unit_id : '';

        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getContacts($unit_id);

        return response()->json($data);
    }

    public function getOverview(Request $request) {
        $unit_id = request()->input('unit_id') ? request()->unit_id : '';

        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getOverview($unit_id);

        return response()->json($data);
    }

    public function getConnection(Request $Request) {
        $conn_id = request()->input('conn_id') ? request()->conn_id : '';

        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getConnection($conn_id);

        return response()->json($data);
    }

    public function getRates(Request $request) {
        
        $unit_id = request()->input('unit_id') ? request()->unit_id : '';

        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getRates($unit_id);

        return response()->json($data);
    }
}
