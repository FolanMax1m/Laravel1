<?php
$error = error_get_last();
    if ($error !== null) {
        echo "<div style='background:#222; color:#ff6b6b; padding:20px; font-family:monospace;'>";
        echo "<h2>🚨 CRITICAL FATAL ERROR:</h2><pre>";
        echo "<h2>🚨 CRITICAL ERROR:</h2><pre>";
        print_r($error);
        echo "</pre></div>";
    }
ini_set('display_errors', '1');
error_reporting(E_ALL);

putenv('SESSION_DRIVER=cookie');
$_ENV['SESSION_DRIVER'] = 'cookie';

putenv('CACHE_STORE=array');
$_ENV['CACHE_STORE'] = 'array';

putenv('LOG_CHANNEL=stderr');
$_ENV['LOG_CHANNEL'] = 'stderr';


$tmpPath = '/tmp/laravel';
$directories = [
    "$tmpPath/storage/app",
$_ENV['APP_STORAGE'] = "$tmpPath/storage";
$_SERVER['VIEW_COMPILED_PATH'] = "$tmpPath/storage/framework/views";

// 5. ЗАПУСК LARAVEL
define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';
