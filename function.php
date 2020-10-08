<?php
/* # более древний вариант 
function get_images($dir) {
    $f = opendir($dir);
    while(false !== ($file = readdir($f))) {
        //if ($file == '.' || $file == '..') continue;
        if(!is_dir($dir . $file)) $files[] = $file;
        //$files[] = $file;
    }
    return $files;
}
*/

function get_images($dir) {
    @$files = scandir($dir);
    if(!$files) return false;
    $pattern = '#\.(jpe?g|png|gif)$#i';
    foreach ($files as $key => $file) {
        if (!preg_match($pattern, $file)) {
            unset($files[$key]);
        }
    }
    $files = array_merge($files);
    return $files;
}

# пагинация
function pagination($page, $count_pages) {
    // << < 3 4 5 6 7 > >>
    // $back - ссылка назад
    // $forward - ссылка вперёд
    // $startpage - ссылка в начало
    // $endpage - ссылка в конец
    // $page2left - вторая страница слева
    // $page1left - первая страница сдева
    // $page2right - вторая страница справа
    // $page1right - первая страница справа

    $uri = "?";

    //если есть параметры в адресной строке
    if ($_SERVER['QUERY_STRING']) {
        foreach ($_GET as $key => $value) {
            if ($key != 'page') $uri .= "{$key}=$value&amp;";
        }
    }

    if ($page > 1) {
        $back = "<a class='nav-link' href='{$uri}page=".($page - 1)."'>&lt;</a>";
    }
    if ($page < $count_pages) {
        $forward = "<a class='nav-link' href='{$uri}page=".($page + 1)."'>&gt;</a>";
    }
    if ($page > 3) {
        $startpage = "<a class='nav-link' href='{$uri}page=1'>&lt;&lt;</a>";
    }
    if ($page < ($count_pages - 2)) {
        $endpage = "<a class='nav-link' href='{$uri}page={$count_pages}'>&gt;&gt;</a>";
    }
    if ($page - 2 > 0) {
        $page2left = "<a class='nav-link' href='{$uri}page=".($page-2)."'>" .($page-2). "</a>";
    }
    if( $page - 1 > 0 ){
		$page1left = "<a class='nav-link' href='{$uri}page=" .($page-1). "'>" .($page-1). "</a>";
	}
	if( $page + 1 <= $count_pages ){
		$page1right = "<a class='nav-link' href='{$uri}page=" .($page+1). "'>" .($page+1). "</a>";
	}
	if( $page + 2 <= $count_pages ){
		$page2right = "<a class='nav-link' href='{$uri}page=" .($page+2). "'>" .($page+2). "</a>";
	}

    return $startpage." ".$back." ".$page2left." ".$page1left." ".'<a class="nav-active">'.$page.'</a>'." ".$page1right." ".$page2right." ".$forward." ".$endpage;
}

?>