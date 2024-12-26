<?php
function searchFiles($directory, $searchTerm) {
    $results = [];
    $items = scandir($directory);

    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;

        $filePath = $directory . DIRECTORY_SEPARATOR . $item;

        if (stripos($item, $searchTerm) !== false) {
            $results[] = $filePath;
        }

        if (is_dir($filePath)) {
            $results = array_merge($results, searchFiles($filePath, $searchTerm));
        }
    }
    

    return $results;
}