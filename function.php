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
    $files = scandir($dir);
    /*
    foreach ($files as $key => $file) {
        if ($file == '.' || $file == '..') unset($files[$key]);
    }*/
    unset($files[0], $files[1]);
    return $files;
}

?>