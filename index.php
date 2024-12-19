<?php
// Установка начальной директории
$baseDir = __DIR__; // Корневая директория
$currentDir = isset($_GET['dir']) ? $_GET['dir'] : $baseDir;

// Подключение вспомогательных файлов
require_once './includes/icon-helpers.php';
require_once './includes/breadcrumbs.php';
require_once './includes/render-helpers.php';
require_once './includes/file-helpers.php';
require_once './includes/security.php';

// Параметры поиска
$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
$isSearchPerformed = !empty($searchTerm);

// Получение содержимого директории
$files = scandir($currentDir);
$files = array_filter($files, function ($file) {
    return !isExcluded($file);
});

// Если поиск активен, фильтруем результаты
if ($isSearchPerformed) {
    $files = searchFiles($currentDir, $searchTerm);
}

// Параметры пагинации
$filesPerPage = 25; // Количество элементов на странице
$totalFiles = count($files);
$totalPages = (int)ceil($totalFiles / $filesPerPage);
$currentPage = isset($_GET['page']) ? max(1, min((int)$_GET['page'], $totalPages)) : 1;

// Определяем индекс начала и конца для текущей страницы
$startIndex = ($currentPage - 1) * $filesPerPage;
$filesOnPage = array_slice($files, $startIndex, $filesPerPage);

// Подключение блоков
require_once './blocks/head.php';
require_once './blocks/form-search.php';

// Вывод хлебных крошек
echo generateBreadcrumbs($currentDir, $baseDir);
?>

<?php if ($isSearchPerformed): ?>
<!-- Результаты поиска -->
<?php echo returnArrowButton($currentDir); ?>
<h2>Результаты поиска для: "<?php echo htmlspecialchars($searchTerm); ?>"</h2>
<?php if (!empty($files)): ?>
<ul>
    <?php foreach ($filesOnPage as $file): ?>
    <?php renderFileList($file, $currentDir, false); ?>
    <?php endforeach; ?>
</ul>
<?php else: ?>
<p class="text-primary">Файлы не найдены</p>
<?php endif; ?>
<?php else: ?>
<!-- Отображение содержимого директории -->
<ul>
    <?php foreach ($filesOnPage as $file): ?>
    <?php renderFileList($file, $currentDir); ?>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<!-- Ссылка на родительскую директорию -->
<?php if ($currentDir !== $baseDir): ?>
<?php echo returnArrowButton(dirname($currentDir)); ?>
<?php endif; ?>

<!-- Пагинация -->
<?php if ($totalPages > 1): ?>
<?php require_once './blocks/pagination.php'; ?>
<?php endif; ?>

<?php require_once './blocks/footer.php'; ?>