<?php
// Проверка на безопасность (чтобы нельзя было выйти за пределы baseDir)
$realBase = realpath($baseDir);
$realCurrent = realpath($currentDir);

if (strpos($realCurrent, $realBase) !== 0) {
    die('Доступ запрещен');
}