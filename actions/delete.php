<?php
// require_once '../includes/config.php';
require_once '../includes/file-helpers.php';

// Проверка и удаление файлов или папок
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deletePath'])) {
    $deletePath = $_POST['deletePath'];
    if (strpos(realpath($deletePath), $realBase) === 0) { // Проверка на безопасность
        if (is_dir($deletePath)) {
            deleteFolder($deletePath); // Удалить папку
        } else {
            unlink($deletePath); // Удалить файл
        }
    }
    // Обновляем страницу, чтобы отобразить изменения
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}