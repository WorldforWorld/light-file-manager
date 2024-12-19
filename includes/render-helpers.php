<?php
// Функция для генерации ссылки
function createLink($path, $name) {
    return '<a href="?dir=' . urlencode($path) . '">' . htmlspecialchars($name) . '</a>';
}

// Функция для генерации ссылки на скачивание файла
function createDownloadLink($path) {
    return '<a class="item-link download-link" href="download.php?file=' . urlencode($path) . '">
                <i class="fas fa-download"></i><span>Скачать</span>
            </a>';
}

// Функция для кнопки удаления
function createDeleteButton($path) {
    return '<form method="POST" action="actions/delete.php" style="display:inline;">
                <input type="hidden" name="deletePath" value="' . htmlspecialchars($path) . '">
                <button type="submit" class="delete-button">
                    <i class="fas fa-trash-alt"></i><span>Удалить</span>
                </button>
            </form>';
}

function returnArrowButton($path) {
    return '<a href="?dir=' .  urlencode($path) . '" class="button fas fa-arrow-left"><span>Назад</span></a>';
}