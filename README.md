
# TelegramBot
![Logo](https://github.com/coder-areaweb/TelegramBot_Basic/blob/main/Bot.png)

### Описание курса:

В данном курсе рассматриваю основные возможности API ботов Telegram познакомитесь с ключевыми методами API как:
- регистрировать и настраивать бота @BotFather
- разберу и изучу популярные методы запросов (getMe,getUpdates,webhook)
- установку библиотеки Telegram Bot SDK и необходимых пакетов для разработки через Composer

Сервис Telegram предлагает полноценный API для создания ботов в Telegram. При этом создать своего первого простейшего бота можно буквально в течение считанных минут и в несколько строк кода. Созданный бот будет выполнять те команды, которые заложил в него разработчик. После изучения первой части курса Вы узнаете о работе с API 

По окончанию курса научился:
- отправить текстовое сообщение
- изображение, аудио, видео, группу файлов
- локацию
- стикер
- документ

Создал простой бот-синоптик, который при наборе текста города. выдает погоду через API сервис OpenWeather.


### Используемые ресурсы и инструменты:
- [VS Codium (Редактор кода)](https://vscodium.com/)
- [BotFather](https://telegram.me/BotFather)
- [OpenWeather](https://openweathermap.org/)
- [Telegram Bot SDK for PHP](https://telegram-bot-sdk.com/)

### Полезные ссылки:
- [Bot Library(Bot API Library Examples)](https://core.telegram.org/bots/samples)
- [Telegram Bot API Developer](https://core.telegram.org/bots/api)
- [Telegram Bot API PHP SDK](https://github.com/irazasyed/telegram-bot-sdk)
- [Telegram Bot SDK for PHP](https://telegram-bot-sdk.com/docs/)
- [Bots: An introduction for developers](https://core.telegram.org/bots)
- [Telegram APIs](https://core.telegram.org/api)

---

### Список уроков из документации Telegram:
#1 Регистрация и настройка бота  
#2 Запрос getMe  
#3 Запросы getUpdates и webhook 
#4 Установка webhook  
#5 Метод sendMessage
#6 Установка библиотеки TelegramBot SDK и Composer  
#7 Метод sendPhoto  
#8 Метод sendMediaGroup  
#9 Клавиатура пользовательская (custom) 
#10 Клавиатура пользовательская (Inline)  
#11 Метод sendLocation  
#12 Метод sendMessage reply - ForceReplay  

## Authors

- [Telegram](https://core.telegram.org/api)


## Установка Composer Global
```bash
#Dowload file
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
#Verify hash file
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
#Install Composer
php composer-setup.php
#Remove composer-setup.php
php -r "unlink('composer-setup.php');"
#PATH change file composer.phar
mv composer.phar /usr/local/bin/composer
```
## Установка библиотеки TelegramBot SDK + Composer c зависимостями

```bash
composer require irazasyed/telegram-bot-sdk
```




    