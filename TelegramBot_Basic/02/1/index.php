<?php

require_once 'config.php';
require_once 'functions.php';

$updates = send_request('getUpdates', [
//    'offset' => 931922015 + 1
]);
foreach ($updates->result as $update) {
    echo "{$update->update_id} - {$update->message->chat->id} - {$update->message->from->first_name} - {$update->message->text}<br>";
}
debug($updates);
