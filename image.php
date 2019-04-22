<?php
	require_once('head.php');
	require_once('config.php');
	$result = mysqli_query($conn,'select * from v_image_detail where id=' . $_GET['id']);
	$row = mysqlI_fetch_assoc($result);
?>
<div class="tiger-main">
	<div class="tiger-image">
        <img src="main/original/<?= $row['folder'] ?>/<?= $row['filename'] ?>" alt="">
        <div class="tiger-image-desc">
			<?php
				echo $row['filename'] . '<br>' . number_format(filesize('main/original/' . $row['folder'] . '/' . $row['filename'])/ 1048576, 2) . ' MB' . '<br>' . $row['description'];
			?>
        </div>
    </div>
</div>
<?php require_once('foot.php') ?>