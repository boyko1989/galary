<?php 
    require_once 'function.php';
    $dir = 'img/';
    $images = get_images($dir);
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
        <h1>Галерея</h1>
        <div class="gallery">
            <?php foreach($images as $image):?>
            <div class="item">
                <div>
                    <a data-lightbox="lightbox" href="<?=$dir . $image?>">
                        <img src="<?=$dir . $image?>" alt="1" class="front">
                    </a>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="js/lightbox.min.js"></script>
</body>
</html>