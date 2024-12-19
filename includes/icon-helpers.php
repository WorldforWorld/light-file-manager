<?php
// Функция для определения иконки на основе расширения файла
function getFileIconClass($extension) {
    $icons = [
        'jpg' => 'fa-file-image',
        'jpeg' => 'fa-file-image',
        'png' => 'fa-file-image',
        'gif' => 'fa-file-image',
        'svg' => 'fa-file-image',
        'pdf' => 'fa-file-pdf',
        'doc' => 'fa-file-word',
        'docx' => 'fa-file-word',
        'xls' => 'fa-file-excel',
        'xlsx' => 'fa-file-excel',
        'zip' => 'fa-file-archive',
        'rar' => 'fa-file-archive',
        'txt' => 'fa-file-alt',
        'html' => 'fa-file-code',
        'css' => 'fa-file-code',
        'js' => 'fa-file-code',
        'php' => 'fa-file-code',
        'mp3' => 'fa-file-audio',
        'wav' => 'fa-file-audio',
        'mp4' => 'fa-file-video',
        'avi' => 'fa-file-video',
        'mov' => 'fa-file-video',
    ];

    // Возвращаем класс по расширению, если его нет — возвращаем стандартную иконку
    return $icons[strtolower($extension)] ?? 'fa-file';
}