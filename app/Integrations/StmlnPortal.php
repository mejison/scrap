<?php

namespace App\Integrations;

use Illuminate\Support\Facades\Http;

class StmlnPortal 
{
    private $bearer;
    private $csrf;
    private $page;

    public function __construct($bearer, $csrf) {
        $this->bearer = $bearer;
        $this->csrf = $csrf;
    }

    public function searchRunners($query, $page = 1, $per_page = 50) {
        $response = Http::withHeaders($this->getHeaders())->post('https://api.izeaexchange.com/v5/query_builder/runners', $this->getRunnersBody($query, $page, $per_page));
        return json_decode($response->getBody());
    }

    public function getMetric($unit_id) {
        $response = Http::withHeaders($this->getHeaders())->get('https://api.izeaexchange.com/v5/accounts/metrics/' . $unit_id);
        return json_decode($response->getBody());
    }

    public function getRates($unit_id) {
        $response = Http::withHeaders($this->getHeaders())->get('https://api.izeaexchange.com/v5/profiles/property_connections?filter[account_id]=' . $unit_id . '&include=latest_metric');
        return json_decode($response->getBody());
    }

    public function getUnity($unit_id) {
        $response = Http::withHeaders($this->getHeaders())->get('https://api.izeaexchange.com/v5/accounts/' . $unit_id);
        return json_decode($response->getBody());
    }

    public function getContacts($unit_id) {
        $response = Http::withHeaders($this->getHeaders())->get('https://api.izeaexchange.com/v5/profiles/contacts/' . $unit_id);
        return json_decode($response->getBody());
    }

    public function getOverview($unit_id) {
        $response = Http::withHeaders($this->getHeaders())->get('https://api.izeaexchange.com/v5/profiles/overviews/' . $unit_id . '?include=account');
        return json_decode($response->getBody());
    }

    public function getConnection($conn_id) {
        $response = Http::withHeaders($this->getHeaders())->get('https://api.izeaexchange.com/v5/connections/metrics/' . $conn_id);
        return json_decode($response->getBody());
    }

    public function getProperetyConnection($conn_id) {
        $response = Http::withHeaders($this->getHeaders())->get('https://api.izeaexchange.com/v5/profiles/property_connections?filter[account_id]=' . $conn_id . '&include=latest_metric');
        return json_decode($response->getBody());
    }

    private function getRunnersBody($query, $page, $per_page) {
       return [
            "filter" => [
                "json_query" => $query,
                "type" =>   'DiscoverySearch',
                "top_level_filters" => [],
                "no_save" => true,
            ],
            "include" => 'account',
            "page" => [
                "size" => $per_page,
                "number" => $page,
            ]
        ];
    }

    private function getHeaders() {
        return [
            'Authorization' => 'Bearer ' . $this->bearer,
            'X-CSRF-Token' => $this->csrf,
            'Host' => 'api.izeaexchange.com',
            'Origin' => 'https://stmlnportal.com',
            'Referer' => 'https://stmlnportal.com/',
            'X-IZEA-Account-ID' => '1004170'
        ];
    }
}