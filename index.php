<?php

require_once('src/GoKada.php');

use Towoju5\GoKada\GoKada;

$apiKey = "KTLgep79E5EnUjOmoHOyxuHBV21bZuxoCg5iHw9CfMqdo79dTjLTYZCRVHAu";
// $gokada = new GoKada($apiKey, true);
$gokada = new GoKada($apiKey);

$arr = [
    'pickup_address' => '94 Oregun Rd, Opebi, Lagos, Nigeria',
    'pickup_latitude' => '6.435275500000001',
    'pickup_longitude' => '3.4147874',
    'dropoffs' => [
      [
        'address' => 'Victoria Island, Lagos, Victoria Island, Lagos, Nigeria',
        'latitude' => '6.614081',
        'longitude' => '3.3581124',
      ],
      [
        'address' => '45, Awolowo Way, Ikeja, Lagos, Nigeria',
        'latitude' => '6.456150699999999',
        'longitude' => '3.4298536',
      ],
    ],
];

$createOrder =  [
    'pickup_address' => 'Vita Towers, Kofo Abayomi Street, Lagos, Nigeria',
    'pickup_latitude' => '6.435275500000001',
    'pickup_longitude' => '3.4147874',
    'pickup_customer_name' => 'Emmanuel',
    'pickup_customer_email' => 'johndoe@mail.com',
    'pickup_customer_phone' => '08092341234',
    'pickup_category' => 'Electronics',
    'pickup_datetime' => '2021-06-22 11:00:00',
    'dropoffs' => [
      [
        'customer_name' => 'Ogechi',
        'customer_phone' => '+2341234567891',
        'customer_email' => 'ogechi@about.com',
        'address' => '21 Lugard Avenue, Lagos, Nigeria',
        'latitude' => '6.456150699999999',
        'longitude' => '3.4298536',
      ],
      [
        'customer_name' => 'Giftlucy',
        'customer_phone' => '+2341234567892',
        'customer_email' => 'giftlucy@about.com',
        'address' => 'Ikeja City Mall, Obafemi Awolowo Way, Ikeja, Nigeria',
        'latitude' => '6.614081',
        'longitude' => '3.3581124',
      ],
    ],
];

$page = $_GET['page'] ?? null;

switch ($page) {
    case 'status':
        $resul = $gokada->orderStatus("HSSRD-745143");
        break;
    
    case 'cancel':
        $resul = $gokada->orderCancel("HSSRD-745143");
        break;
    
    case 'history':
        $resul = $gokada->orderHistory("HSSRD-745143");
        break;
    
    case 'create':
        $resul = $gokada->createOrder($createOrder);
        break;
    
    case 'estimate':
        $resul = $gokada->estimate($arr);
        break;
    
    default:
        $resul = $gokada->createOrder($createOrder);
        break;
}
header('Content-Type: application/json');
echo json_encode($resul,  JSON_PRETTY_PRINT);