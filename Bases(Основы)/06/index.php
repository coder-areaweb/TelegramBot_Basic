<?php

// d:\server538\openserver\modules\php\PHP_8.0\php.exe composer.phar require irazasyed/telegram-bot-sdk

error_reporting(-1);
ini_set('display_errors', 0);
ini_set('log_errors', 'on');
ini_set('error_log', __DIR__ . '/errors.log');

require __DIR__.'/vendor/autoload.php';
require_once 'config.php';
require_once 'functions.php';

$telegram = new \Telegram\Bot\Api(TOKEN);
$update = $telegram->getWebhookUpdate();

//debug($update);

$chat_id = $update['message']['chat']['id'] ?? 0;
//$text = isset($update->message->text) ? "You wrote: <i>{$update->message->text}</i>" : "<u>I need some text</u>";
$text = $update['message']['text'] ?? '';
$name = $update['message']['from']['first_name'] ?? 'Guest';

if (!$chat_id) {
    die;
}

if ($text == '/help') {
    try {
        $telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => "Show bot help",
            'parse_mode' => 'HTML',
        ]);
    } catch (\Telegram\Bot\Exceptions\TelegramSDKException $e) {
        error_log($e->getMessage() . PHP_EOL, 3, __DIR__ . '/errors.log');
    }
} elseif ($text == '/test') {
    $telegram->sendMessage([
        'chat_id' => $chat_id,
        'text' => "Hello, <b>{$name}</b>!" . PHP_EOL . "Test command...",
        'parse_mode' => 'HTML',
    ]);
} elseif ($text == 'photo') {
    $res = $telegram->sendPhoto([
        'chat_id' => $chat_id,
//        'photo' => \Telegram\Bot\FileUpload\InputFile::create('https://picsum.photos/700/500'),
//        'photo' => 'AgACAgIAAxkDAAN6ZF379xm2qrt8pEnpnRs4MAVdmPEAAn7FMRsvMPFKibsZWAirkGkBAAMCAANzAAMvBA',
        'photo' => \Telegram\Bot\FileUpload\InputFile::create(__DIR__ . '/img/4.png'),
        'caption' => 'Some photo',
    ]);
//    debug($res);
} elseif ($text == 'doc') {
    $res = $telegram->sendDocument([
        'chat_id' => $chat_id,
//        'document' => \Telegram\Bot\FileUpload\InputFile::create('https://picsum.photos/700/500'),
//        'document' => \Telegram\Bot\FileUpload\InputFile::create('https://webformyself-bots.space/bots/1/img/1.jpg'),
//        'document' => \Telegram\Bot\FileUpload\InputFile::create(__DIR__ . '/img/4.png'),
//        'document' => \Telegram\Bot\FileUpload\InputFile::create(__DIR__ . '/test.txt'),
        'document' => 'BQACAgIAAxkDAAOwZF4HGu3bvnXzcu_8d4yZYQfgJqUAAnUoAAIvMPFKSe5JkeRshEkvBA',
        'thumb' => \Telegram\Bot\FileUpload\InputFile::create(__DIR__ . '/img/file.png'),
    ]);
    debug($res);
} elseif (!empty($text)) {
    $telegram->sendMessage([
        'chat_id' => $chat_id,
        'text' => "Hello, <b>{$name}</b>!" . PHP_EOL . "You wrote: <i>{$text}</i>",
        'parse_mode' => 'HTML',
    ]);
} else {
    $telegram->sendMessage([
        'chat_id' => $chat_id,
        'text' => "Hello, <b>{$name}</b>!" . PHP_EOL . "<u>I need some text</u>",
        'parse_mode' => 'HTML',
    ]);
}

