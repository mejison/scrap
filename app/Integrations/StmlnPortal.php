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

    public function searchRunners($query, $searchQuery, $page = 1, $per_page = 50) {
        $response = Http::withHeaders($this->getHeaders())->post('https://api.izeaexchange.com/v5/query_builder/runners', $this->getRunnersBody($query, $searchQuery, $page, $per_page));
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

    public function getAudienceAccount($unit_id) {
        $response = Http::withHeaders($this->getSearchContentHeaders())->get('https://obsidian.izeaexchange.com/v2/metrics/audience/accounts/' . $unit_id);
        return json_decode($response->getBody());
    }

    public function getWhiteLabelOrganizations() {
        $response = Http::withHeaders($this->getHeaders())->get('https://api.izeaexchange.com/v5/whitelabel_organizations?filter[domain]=stmlnportal.com');
        return json_decode($response->getBody());
    }

    public function getSearchContent($query) {
        $response = Http::withHeaders($this->getSearchContentHeaders())->post('https://obsidian.izeaexchange.com/v2/content/searches', $query);
        return json_decode($response->getBody());
    }

    private function getRunnersBody($query, $querySearch = '', $page, $per_page) {
        $top_level_filters = [];

        if ($querySearch) {
            $top_level_filters = [["keywords" => $querySearch ]];
        }
    
       return [
            "filter" => [
                "json_query" => $query,
                "type" =>   'DiscoverySearch',
                "top_level_filters" => json_encode($top_level_filters),
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

    private function getSearchContentHeaders() {
        return [
            'Authorization' => 'Bearer ' . $this->bearer,
            'Content-Type' => 'application/vnd.api+json'
        ];
    }

    public function getViz($query) {
        $response = Http::withHeaders($this->getHeaders())->get('https://api.izeaexchange.com/v5/viz_searches?' . $query);
        return json_decode($response->getBody());
    }

    public function searchLocation($query) {
        $response = Http::withHeaders($this->getHeaders())->get('https://api.izeaexchange.com/v5/query_builder/autocompletes/multi_channel_searches' . $query);
        return json_decode($response->getBody());
    }
}