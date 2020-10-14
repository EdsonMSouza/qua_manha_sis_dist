<?php

class Cep
{

    private $data = array();

    public function __construct($cep)
    {
        #try {
        $url = "https://cep.awesomeapi.com.br/{$cep}";

        $obj = json_decode(file_get_contents($url), True);

        $this->data = $obj;
        #} catch (Exception $ex) {
        #    return 'error';
        #}
    }

    public function getAddress()
    {
        return $this->data;
    }

    # Fórmula de Haversine
    public function getDistance($lat1, $lon1, $lat2, $lon2)
    {
        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);
        $lon1 = deg2rad($lon1);
        $lon2 = deg2rad($lon2);

        $dist = (6371 * acos(cos($lat1) * cos($lat2) * cos($lon2 - $lon1) + sin($lat1) * sin($lat2)));
        $dist = number_format($dist, 2, '.', '');
        return $dist;
    }
}
