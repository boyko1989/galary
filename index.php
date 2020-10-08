<?php 
    require_once 'function.php';
    $dir = 'img/';
    $images = get_images($dir);

    # пагинация
    //количество фото на страницу
        $perpage = 9;
    //общее количество картинок
        $count_img = count($images);
    //необходимое количество страниц
        $count_pages = ceil($count_img / $perpage);
    //если число страниц рвно нулю, приравнять его единице
        if(!$count_pages) $count_pages = 1;
    // получить номер запрошенной страницы
        if(isset($_GET['page']) ) {
            $page = (int)$_GET['page'];
            if($page < 1) $page = 1;
        } else {
            $page = 1;
        }
    //если запрошенная страница больше максимума
        if($page > $count_pages) $page = $count_pages;

    // первая картинка на странице
        $start_pos = ($page - 1) *$perpage;
    // последняя картинка на странице
        $end_pos = $start_pos + $perpage;
        if ($end_pos > $count_img) $end_pos = $count_img; 
    $pagination = pagination($page, $count_pages);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <title>Галерея</title>
</head>
<body>
    <div class="wrapper">
        <div class="gallery">
        <?php if($images): $i = $start_pos + 1; ?>
        <?php for($j = $start_pos; $j < $end_pos; $j++):?>
            <div class="item">
                <div>
                    <a data-lightbox="lightbox" href="<?=$dir . $images[$j]?>">
                        <img src="<?=$dir . $images[$j]?>" alt="1" class="front">
                    </a>
                </div>
            </div>
            <?php $i++; endfor;?>
        <?php else: ?>
            <p>В данной галерее нет картинок</p>
        <?php endif;?>

            <?php if ($count_pages > 1): ?>
                <div class="pagination"><?=$pagination ?></div>
            <?php endif; ?>

        </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="js/lightbox.min.js"></script>
</body>
</html>