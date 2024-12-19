<?php
// Установим начальную директорию
$baseDir = __DIR__; // Корневая директория
$currentDir = isset($_GET['dir']) ? $_GET['dir'] : $baseDir;