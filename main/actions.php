<?php 
	$conn = new mysqli('localhost','root','','db_tiger');
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
	$files = scandir('original/tkmiz/');
	$time = 2;
	
    foreach($files as $file) {
		if($time<>0){
            $time--;
            continue;
        }
		//echo 'insert into tb_image values(NULL,1,"' . $file . '",NULL)' . '<br>';
		if(mysqli_query($conn,'insert into tb_image values(NULL,1,"' . $file . '","")')){
			echo 'added' . '<br>';
		}
		else{
			echo mysqli_error($conn);
		}
    }

?>