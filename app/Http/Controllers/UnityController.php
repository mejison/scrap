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
        $this->bearer = env('BEARER', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjk5OTI2NiwiaWF0IjoxNjQzODI2MzQ2LCJqdGkiOiJhNjdkZDhmYi1iYmZjLTRiMjQtYjdkNi1jZjEyOTJhOGI2NzUifQ.rNTxlmg3G9ZzpVZos2nIFNBpWYMLDZ5Gt6FYyPWhJJU');
        $this->csrf = env('CSRF', 'vC3vDCuuGVOzuFgeueaolR-No2oeCaOnalix30OX4QLnEXvVAXeoXGeil_a_9Uj7a_mL7H9Q_JDKHXjzeoYR7A');
    }

    public function searchUnity() {
        
        $page = request()->input('page') ?? 1;
        $per_page = request()->input('per_page') ?? 50;
        $query = request()->input('query');

        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->searchRunners($query, $page, $per_page);
        
        return response()->json($data);
    }

    public function getMetric() {
        $unit_id = request()->input('unit_id') ? request()->unit_id : '';

        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getMetric($unit_id);
        
        return response()->json($data);
    }

    public function getUnity() {
        $unit_id = request()->input('unit_id') ? request()->unit_id : '';

        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getUnity($unit_id);

        return response()->json($data);
    }

    public function getContacts() {
        $unit_id = request()->input('unit_id') ? request()->unit_id : '';

        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getContacts($unit_id);

        return response()->json($data);
    }

    public function getOverview() {
        $unit_id = request()->input('unit_id') ? request()->unit_id : '';

        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getOverview($unit_id);

        return response()->json($data);
    }

    public function getConnection() {
        $conn_id = request()->input('conn_id') ? request()->conn_id : '';

        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getConnection($conn_id);

        return response()->json($data);
    }

    public function getProperetyConnection() {
        $unit_id = request()->input('conn_id') ? request()->conn_id : '';
        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getProperetyConnection($unit_id);
        return response()->json($data);
    }

    public function getAudienceAccount() {
        $unit_id = request()->input('unit_id') ? request()->unit_id : '';
        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getAudienceAccount($unit_id);
        return response()->json($data);
    }

    public function getSearchContent() {
        $query = request()->input('query');
        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getSearchContent(json_decode($query, true));
        return response()->json($data);
    }

    public function getWhiteLabelOrganizations() {
        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getWhiteLabelOrganizations();
        return response()->json($data);
    }

    public function getRates(Request $request) {
        
        $unit_id = request()->input('unit_id') ? request()->unit_id : '';

        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getRates($unit_id);

        return response()->json($data);
    }
}
