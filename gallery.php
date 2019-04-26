<?php
	if(!is_numeric($_GET['id'])){
		header('location:index.php');
	}
	require_once('head.php');
	require_once('config.php');
	$folder = mysqli_fetch_assoc(mysqli_query($conn,'select folder from tb_category where id=' . $_GET['id']));
	$result = $conn->query('select id,filename,description from tb_image where category_id=' . $_GET['id']);
	$pillar = 0;
	$Pillar_item = array();
	$pillar_item[0] = '';
	$pillar_item[1] = '';
	$pillar_item[2] = '';

	while($row = $result->fetch_assoc()) {
		if($pillar==3){
			$pillar=0;
		}
		$pillar_item[$pillar] .= '<div class="tiger-pillar-image">
									<img src="main/thumb/' . $folder['folder'] . '/' . $row['filename'] . '" alt="">
									<div class="desc">
										<a href="image.php?id=' . $row['id'] . '">' . $row['filename'] . '</a>
										<br>' . $row['description'] . '
									</div>
								</div>';
		//echo $pillar . ' ' . $file . '<br>';
		$pillar++;
    }
?>
<div class="tiger-main" style="padding-bottom: 0;">
	<div class="tiger-pillar">
        <div class="tiger-pillar-pillar">
            <?= $pillar_item[0] ?>
        </div>
        <div class="tiger-pillar-pillar">
            <?= $pillar_item[1] ?>
        </div>
        <div class="tiger-pillar-pillar">
            <?= $pillar_item[2] ?>
        </div>
    </div>
</div>
<?php require_once('foot.php') ?>