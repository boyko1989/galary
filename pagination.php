<?php
    # пагинация
    //количество фото на страницу
        $perpage = 15;
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