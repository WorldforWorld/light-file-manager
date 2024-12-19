<?php
// Функция для поиска файлов
function searchFiles($directory, $searchTerm) {
    $results = [];
    $items = scandir($directory);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }
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

function deleteFolder($folderPath) {
    $files = array_diff(scandir($folderPath), ['.', '..']);
    foreach ($files as $file) {
        $filePath = $folderPath . DIRECTORY_SEPARATOR . $file;
        is_dir($filePath) ? deleteFolder($filePath) : unlink($filePath);
    }
    return rmdir($folderPath);
}

// Функция для проверки, является ли файл исключением.
function isExcluded($file) {
    // Массив исключений для файлов и папок
    $excluded = ['.', '..', 'assets', 'actions', 'includes', 'blocks'];
    
    // Получение расширения файла
    $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
    
    // Проверка на исключения
    return in_array($file, $excluded) || $fileExtension === 'php';
}

function renderFileList($file, $currentDir, $isPath=true) {
    $filePath = $currentDir . DIRECTORY_SEPARATOR . $file;
    $extension = pathinfo($file, PATHINFO_EXTENSION);
?>
<li class="icon">
    <?php if (is_dir($isPath ? $filePath: $file)): ?>
    <div>
        <i class="fas fa-folder"></i>
        <?php echo createLink($isPath ? $filePath : $file, $isPath ? $file :  basename($file)); ?>
    </div>
    <div>
        <?php echo createDeleteButton($filePath); ?>
    </div>
    <?php else: ?>
    <div>
        <i class="fas <?php echo getFileIconClass($extension); ?>"></i>
        <?php echo basename($file); ?>
    </div>
    <div class="buttons">
        <?php echo createDownloadLink($isPath ? $filePath: $file); ?>
        <?php echo createDeleteButton($isPath ? $filePath: $file); ?>
    </div>
    <?php endif; ?>
</li>
<?php 
}