<?php
// api/index.php

// 1. Вмикаємо жорстке відображення всіх помилок на рівні конфігурації PHP
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

try {
    // 2. Пробуємо завантажити ядро Laravel
    $indexPath = __DIR__ . '/../public/index.php';
    
    if (!file_exists($indexPath)) {
        throw new \Exception("Файл не знайдено: {$indexPath}. Перевірте структуру папок.");
    }

    require $indexPath;

} catch (\Throwable $e) {
    // 3. Якщо щось пішло не так на самому старті, виводимо сирий текст
    http_response_code(500);
    echo "<div style='font-family: monospace; background: #f8d7da; color: #721c24; padding: 20px; border: 1px solid #f5c6cb;'>";
    echo "<h2>🚨 Фатальна помилка до завантаження Laravel:</h2>";
    echo "<strong>Повідомлення:</strong> " . htmlspecialchars($e->getMessage()) . "<br><br>";
    echo "<strong>Файл:</strong> " . $e->getFile() . " <strong>(Рядок: " . $e->getLine() . ")</strong><br><br>";
    echo "<strong>Стек викликів:</strong><br>";
    echo "<pre style='background: #fff; padding: 10px; border: 1px solid #ccc; overflow-x: auto;'>";
    echo htmlspecialchars($e->getTraceAsString());
    echo "</pre>";
    echo "</div>";
}