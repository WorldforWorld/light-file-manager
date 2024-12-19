<!-- Пагинация -->
<div class="pagination">
    <?php
        $range = 3; // Количество страниц слева и справа от текущей
        $startPage = max(1, $currentPage - $range);
        $endPage = min($totalPages, $currentPage + $range);

        // Кнопка "В начало" и "Предыдущая"
        if ($currentPage > 1): ?>
    <a href="?dir=<?php echo urlencode($currentDir); ?>&search=<?php echo urlencode($searchTerm); ?>&page=1"
        class="button">В начало</a>
    <a href="?dir=<?php echo urlencode($currentDir); ?>&search=<?php echo urlencode($searchTerm); ?>&page=<?php echo $currentPage - 1; ?>"
        class="button">Предыдущая</a>
    <?php endif;

        // Диапазон страниц
        for ($i = $startPage; $i <= $endPage; $i++): ?>
    <a href="?dir=<?php echo urlencode($currentDir); ?>&search=<?php echo urlencode($searchTerm); ?>&page=<?php echo $i; ?>"
        class="button <?php echo ($i === $currentPage) ? 'active' : ''; ?>">
        <?php echo $i; ?>
    </a>
    <?php endfor;

        // Кнопка "Следующая" и "В конец"
        if ($currentPage < $totalPages): ?>
    <a href="?dir=<?php echo urlencode($currentDir); ?>&search=<?php echo urlencode($searchTerm); ?>&page=<?php echo $currentPage + 1; ?>"
        class="button">Следующая</a>
    <a href="?dir=<?php echo urlencode($currentDir); ?>&search=<?php echo urlencode($searchTerm); ?>&page=<?php echo $totalPages; ?>"
        class="button">В конец</a>
    <?php endif; ?>
</div>