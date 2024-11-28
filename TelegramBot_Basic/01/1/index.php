<?php

require_once 'config.php';
require_once 'functions.php';

//$res = json_decode(file_get_contents(BASE_URL . 'getMe'), true);
$res = send_request('getMe');
debug($res);
