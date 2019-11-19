<?php

namespace App\Libraries;
use App\Libraries\Client;
use App\Models\City;
use App\Models\Province;

class RajaOngkir {
    
    public function __construct()
    {
        $this->base_url = \env("RAJA_ONGKIR_URL");
        $this->client = new Client(array(
            "key" => \env("RAJA_ONGKIR_API_KEY"),
        ));
    }

    public function fetchProvincies() {
        $response =  $this->client->get($this->getAbsoluteURL("starter/province"));
        $result = $this->handleResult($response);
        array_map(function($row){
            Province::UpdateOrCreate(
                array(
                    "id" => $row->province_id,
                    "name" => $row->province,
                )
            );
        }, $result);

        return $result;
    }

    public function fetchCities() {
        $response = $this->client->get($this->getAbsoluteURL("starter/city"));
        $result = $this->handleResult($response);
        array_map(function($row){
            City::UpdateOrCreate(
                array(
                    "id" => $row->city_id,
                    "name" => $row->city_name,
                    "province_id" => $row->province_id,
                    "postal_code" => $row->postal_code,
                )
            );
        }, $result);

        return $result;
    }

    public function findProvinceById($id) {
        $response = $this->client->get(
            $this->getAbsoluteURL("starter/province?id=$id")
        );
        return $this->handleResult($response);
    }

    public function findCityById($id) {
        $response = $this->client->get(
            $this->getAbsoluteURL("starter/city?id=$id")
        );
        return $this->handleResult($response);
    }

    private function getAbsoluteURL($url) {
        return $this->base_url ."/" . $url;
    }

    private function handleResult($response) {
        $result = json_decode($response);
        
        if ($result->rajaongkir->status->code == 200) {
            return $result->rajaongkir->results;
        }

        return null;
    }
}