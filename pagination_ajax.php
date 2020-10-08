<?php 

    require_once 'function.php';    
    $dir = 'img/';
    $images = get_images($dir);
    require_once 'pagination.php';

    // формирование + вывод
    if($images): $i = $start_pos + 1; $output = null;
        for ($j = $start_pos; $j < $end_pos; $j++):
            $output .= '<div class="item">';
            $output .= '<div>';
            $output .= '<a data-lightbox="lightbox" href="'.$dir.$images[$j].'">';
            $output .= '<img src="'.$dir.$images[$j].'" alt="1" class="front">';
            $output .= '</a>';
            $output .= '</div>';
            $output .= '</div>';
        $i++; endfor;
    endif;
    echo $output . '<div class="pagination">'.$pagination.'</div>';
?>   