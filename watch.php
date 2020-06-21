<?php

require_once './vendor/autoload.php';

$client = new \MongoDB\Client('mongodb://127.0.0.1:27018');
$collection = $client->selectDatabase('goods')->selectCollection('phone');

$changeStream = $collection->watch([], ['fullDocument' => \MongoDB\Operation\Watch::FULL_DOCUMENT_UPDATE_LOOKUP]);

while (true) {

    $changeStream->next();
    if ($changeStream->valid()) {
        $current = $changeStream->current();

        echo json_encode($current);
    }

}