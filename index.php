<?php 
    require_once 'function.php';
    $dir = 'img/';
    $images = get_images($dir);
    require_once 'pagination.php';
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
    <script src="js/scripts.js"></script>
</body>
</html>