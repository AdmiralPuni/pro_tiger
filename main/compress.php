<?php 
    function compress($source, $destination, $quality) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source);
        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source);
        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

        return $destination;
    }
    /*
    $files = scandir('original/tkmiz/');
    $time = 2;
    foreach($files as $file) {
        if($time<>0){
            $time--;
            continue;
        }
        echo 'original/tkmiz/' . $file . '<br>';
        compress('original/tkmiz/' . $file, 'thumb/tkmiz/' . $file, 10);
    }
    */

    
?>