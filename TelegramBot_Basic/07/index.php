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
        'photo' => \Telegram\Bot\FileUpload\InputFile::create(__DIR__ . '/img/1.jpg'),
        'caption' => 'Some photo',
    ]);

    $res = $telegram->sendPhoto([
        'chat_id' => $chat_id,
        'photo' => \Telegram\Bot\FileUpload\InputFile::create(__DIR__ . '/img/2.jpg'),
        'caption' => 'Some photo',
    ]);
//    debug($res);
} elseif ($text == 'doc') {
    $res = $telegram->sendDocument([
        'chat_id' => $chat_id,
        'document' => 'BQACAgIAAxkDAAOwZF4HGu3bvnXzcu_8d4yZYQfgJqUAAnUoAAIvMPFKSe5JkeRshEkvBA',
        'thumb' => \Telegram\Bot\FileUpload\InputFile::create(__DIR__ . '/img/file.png'),
    ]);
} elseif ($text == 'group') {
    /*$telegram->sendMediaGroup([
        'chat_id' => $chat_id,
        'media' => json_encode([
            ['type' => 'photo', 'media' => 'https://webformyself-bots.space/bots/1/img/1.jpg', 'caption' => 'Photo 1'],
            ['type' => 'photo', 'media' => 'https://webformyself-bots.space/bots/1/img/2.jpg', 'caption' => 'Photo 2'],
            ['type' => 'photo', 'media' => 'https://webformyself-bots.space/bots/1/img/3.jpg', 'caption' => 'Photo 3'],
        ]),
    ]);*/
    $telegram->sendMediaGroup([
        'chat_id' => $chat_id,
        'media' => json_encode([
            ['type' => 'document', 'media' => 'attach://logs.txt', 'caption' => 'Doc 1'],
            ['type' => 'document', 'media' => 'attach://errors.log', 'caption' => 'Doc 2'],
            ['type' => 'document', 'media' => 'attach://test.txt', 'caption' => 'Doc 3'],
        ]),
        'logs.txt' => \Telegram\Bot\FileUpload\InputFile::create(__DIR__ . '/logs.txt'),
        'errors.log' => \Telegram\Bot\FileUpload\InputFile::create(__DIR__ . '/errors.log'),
        'test.txt' => \Telegram\Bot\FileUpload\InputFile::create(__DIR__ . '/test.txt'),
    ]);
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

