<?php

require_once './vendor/autoload.php';

use MongoDB\Client;

$client = new Client();

//$client->watch()
$collection = $client->tutorial->numbers;

/*$collection->insertOne([
	'num' => 50000
]);*/

//$collection->updateOne();


$result = $collection->find([
//	'num' => 10
], ['limit' => 10, 'sort' => ['num' => -1]]);

$result1 = $collection->findOne([
    'num' => 11
]);
echo $result1->num;
//$result = $result->toArray();
//$result = json_decode(json_encode($result, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES), true);


echo "<pre>";
//print_r($result);


//foreach ($result as $current) {
//
////	$current->toArray();
//
//	var_dump($current->num);
//}
