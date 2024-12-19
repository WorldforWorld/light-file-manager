<?php
// Функция для отображения хлебных крошек
function generateBreadcrumbs($currentDir, $baseDir) {
    $breadcrumbs = [];
    $path = $currentDir;

    while ($path !== $baseDir && $path !== dirname($path)) {
        $breadcrumbs[] = [
            'name' => basename($path),
            'path' => $path,
        ];
        $path = dirname($path);
    }

    // Добавляем корневую директорию
    $breadcrumbs[] = [
        'name' => 'Главная',
        'path' => $baseDir,
    ];

    // Инвертируем порядок хлебных крошек
    $breadcrumbs = array_reverse($breadcrumbs);

    // Формируем HTML
    $html = '<nav class="breadcrumbs">';
    foreach ($breadcrumbs as $key => $breadcrumb) {
        if ($key === count($breadcrumbs) - 1) {
            // Текущая директория без ссылки
            $html .= '<span>' . htmlspecialchars($breadcrumb['name']) . '</span>';
        } else {
            // Ссылка на предыдущие директории
            $html .= '<a href="?dir=' . urlencode($breadcrumb['path']) . '">' . htmlspecialchars($breadcrumb['name']) . '</a></span><span> &gt; ';
        }
    }
    $html .= '</nav>';

    return $html;
}