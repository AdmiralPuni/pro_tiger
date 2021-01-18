<?php 
	require_once('../config.php');
    function compress($source, $destination, $quality){
		$info = getimagesize($source);

        if($info['mime'] == 'image/jpeg'){
			$image = imagecreatefromjpeg($source);
		}
        elseif($info['mime'] == 'image/gif'){
			$image = imagecreatefromgif($source);
		}
        elseif($info['mime'] == 'image/png'){
			$image = imagecreatefrompng($source);
		}
		$image = imagescale($image,$info[0]/3,$info[1]/3); 
        imagejpeg($image, $destination, $quality);

        return $destination;
    }
    $chc = 99;
    $fn = null;
    if(isset($_POST['submit'])){
        $chc = $_POST['actionid'];
        $fn = $_POST['folder'];
    }
    
    switch($chc){
        case 1:
            $files = scandir('original/' . $fn . '/');
            $time = 2;
            foreach($files as $file) {
                if($time<>0){
                    $time--;
                    continue;
                }
                if(file_exists('thumb/' . $fn . '/' . $file)){
                    continue;
                }
                echo 'original/' . $fn . '/' . $file . '<br>';
                compress('original/' . $fn . '/' . $file, 'thumb/' . $fn . '/' . $file, 30);
            }
        break;
        case 2:
            $files = scandir('original/' . $fn . '/');
            $time = 2;
            $result = $conn->query('select filename from tb_image a, tb_category b where a.category_id=b.id and b.folder="' . $fn . '"');
            $coll = array();
            while($row = $result->fetch_assoc()){
                $coll[] = $row['filename'];
			}
			$query = 'select id from tb_category where folder="' . $fn . '"';
			$fnid = mysqli_fetch_assoc(mysqli_query($conn,$query));
			echo mysqli_error($conn);
            foreach($files as $file) {
                if($time<>0){
                    $time--;
                    continue;
                }
                if(in_array($file,$coll)){
                    continue;
				}
				
                if(mysqli_query($conn,'insert into tb_image values(NULL,' . $fnid['id'] . ',"' . $file . '","")')){
                    echo 'added' . '<br>';
                }
                else{
                    echo mysqli_error($conn);
                }
            }
        break;
        case 3:
            echo 'nothing.';
        break;
        default:
            echo 'default.';
        break;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ActionSet</title>
</head>
<body>
<?php
	$files = scandir('original/');
?>
    <form action="" method="POST">
        <select name="folder" id="folder">
			<?php for ($i=2; $i<sizeof($files) ; $i++): ?>
            <option value="<?= $files[$i] ?>"><?= $files[$i] ?></option>
			<?php endfor ?>
            <option value="3" selected>Nothing</option>
        </select>
        <select name="actionid" id="actionid">
            <option value="1">1 - Compress Image</option>
            <option value="2">2 - Database Insert</option>
            <option value="3" selected>3 - Nothing</option>
        </select>
        <input type="submit" name="submit">
    </form>
</body>
</html>