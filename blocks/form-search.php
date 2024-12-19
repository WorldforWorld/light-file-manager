<form method="GET" class="search-form">
    <input type="hidden" name="dir" value="<?php echo htmlspecialchars($currentDir); ?>">
    <input type="text" name="search" class="search-input" placeholder="Введите название файла" pattern="^(?!\s*$).+"
        title="Пожалуйста, введите название файла"
        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <button type="submit" class="search-button">Поиск</button>
</form>