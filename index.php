<?php 

	include_once __DIR__. '/vendor/autoload.php';

	$db = (new MongoDB\Client("mongodb://127.0.0.1:28019"))->selectDatabase("message");

	$changeStream = $db -> selectCollection("message") ->watch([], ['fullDocument' => MongoDB\Operation\Watch::FULL_DOCUMENT_UPDATE_LOOKUP]);


	while (true) {

	    $changeStream->next();

	    if ($changeStream->valid()) {
            $nextChange = $changeStream->current();

            echo json_encode($nextChange);


        }
    }