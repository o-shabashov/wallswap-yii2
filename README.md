# Wallswap-Yii2

[![BCH compliance](https://bettercodehub.com/edge/badge/o-shabashov/wallswap-yii2?branch=master)](https://bettercodehub.com/)

The project is just for fun and test programming skills. It consists of two parts - the server and crawler.

### Server:
1. Runs on 8080 port;
2. Gets the list of wallpapers from database;
3. Render the html page with the list of wallpaper;
4. Allows you to authenticate the user through OAuth2 Dropbox, gets access_token and stores the user in a database;

### Crawler:
1. Parses website [https://wallhaven.cc](https://wallhaven.cc) and collects direct URL's at the wallpaper;
2. Saves list of wallpapers in the database;
3. Upload wallpapers for each user in Dropbox directory.

## Installation
* Create MySQL database `wallswap` and import `wallswap.sql`
* Create [Dropbox App](https://www.dropbox.com/developers/apps/create) and fill `config/params.php`
```php
<?php
return [
    'db_app_key'    => 'APP_KEY_HERE',
    'db_app_secret' => 'APP_SECRET_HERE',
];
```
* Redirect URL for Dropbox callback:
```
http://localhost:8080/oauth2callback
```
* Install composer dependencies:
```bash
composer global require "fxp/composer-asset-plugin:^1.2.0"
cd wallswap-yii2
composer update
```
* Run server:
```bash
./yii serve
```
* Run crawl once a week:
```bash
./yii console/run
```

## Made with
1. [Yii2](https://github.com/yiisoft/yii2)
2. MySQL
3. [league/flysystem-dropbox](https://github.com/thephpleague/flysystem)
4. [kunalvarma05/dropbox-php-sdk](https://github.com/kunalvarma05/dropbox-php-sdk)
5. [ivkos/wallhaven](https://github.com/ivkos/wallhaven4php)
