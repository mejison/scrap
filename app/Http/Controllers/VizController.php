<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Integrations\StmlnPortal;

class VizController extends Controller
{
    public $bearer;
    public $csrf;

    public function __construct() {
        $this->bearer = env('BEARER', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjk5OTI2NiwiaWF0IjoxNjQzODI2MzQ2LCJqdGkiOiJhNjdkZDhmYi1iYmZjLTRiMjQtYjdkNi1jZjEyOTJhOGI2NzUifQ.rNTxlmg3G9ZzpVZos2nIFNBpWYMLDZ5Gt6FYyPWhJJU');
        $this->csrf = env('CSRF', 'vC3vDCuuGVOzuFgeueaolR-No2oeCaOnalix30OX4QLnEXvVAXeoXGeil_a_9Uj7a_mL7H9Q_JDKHXjzeoYR7A');
    }

    public function searchViz(Request $request) {
        $query = $request->input('query');
        // dd($query);

        $stmln_portal = new StmlnPortal($this->bearer, $this->csrf);
        $data = $stmln_portal->getViz($query);
        
        return response()->json($data);
    }

    public function preview(Request $request) {
        return file_get_contents($request->url);
    }
}
