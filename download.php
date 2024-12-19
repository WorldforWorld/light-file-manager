<?php
if (isset($_GET['file'])) {
    $file = realpath($_GET['file']);
    $baseDir = __DIR__;

    // Проверяем, что файл находится в пределах baseDir
    if (strpos($file, realpath($baseDir)) === 0 && file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    } else {
        echo 'Файл недоступен для скачивания.';
    }
}
?>