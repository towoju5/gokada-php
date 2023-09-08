<?php

namespace Towoju5\GoKada;

require_once('helper.php');

class GoKada
{
    private $base_url;
    private $apiKey;
    public function __construct($apiKey, $sandbox=false)
    {
        $this->apiKey = $apiKey;
        $this->base_url = "https://love.gokada.ng/api/v3/developer/";
        if($sandbox) {
            $this->base_url = "https://private-anon-61fa951543-gokada2.apiary-mock.com/api/v3/developer/";
        }
    }
    /**
     * @param string pickup_address, pickup_latitude, pickup_longitude
     * @param array dropoffs => [
     *      address, latitude, longitude
     * ]
     * 
     * @response $array => 
     */
    public function estimate (array $arr)
    {
        return self::api_call($arr, 'POST', "order_estimate");
    }

    public function createOrder(array $arr)
    {
        return self::api_call($arr, "POST", "order_create");
    }

    public function orderStatus(string $orderId)
    {
        $arr = [
            'order_id' => $orderId
        ];
        return self::api_call($arr, "POST", "order_status");
    }

    public function orderCancel(string $orderId)
    {
        $arr = [
            'order_id' => $orderId
        ];
        return self::api_call($arr, "POST", "order_cancel");
    }

    public function orderHistory(string $orderId, int $page=1, int $perPage=15)
    {
        $arr = [
            'order_id' => $orderId
        ];
        return self::api_call($arr, "POST", "order_history?page=$page&per_page=$perPage");
    }

    private function api_call($data, $method, $endpoint)
    {
        $data['api_key'] = $this->apiKey;
        $ch = curl_init();
        $url = $this->base_url.$endpoint;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        if($method == "POST"):
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        endif;

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));
        
        $response = curl_exec($ch);
        curl_close($ch);
        // var_dump($response); exit;
        
        $response = to_array($response);
        unset($data['api_key']);
        return $response = [
            'response' => $response,
            'request'  =>  $data
        ];
    }
    
}
