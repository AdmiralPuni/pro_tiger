<?php 
	require_once('head.php');
	require_once('config.php');
	if(isset($_GET['submit'])){
		$result = $conn->query('select id,filename,description from tb_image where description regexp("' . str_replace(' ','|',$_GET['tags']) . '")');
		//echo 'select id,filename,description from tb_image description regexp("' . str_replace(' ','|',$_GET['tags']) . '")';
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
										<img src="main/thumb/' . $_GET['folder'] . '/' . $row['filename'] . '" alt="">
										<div class="desc">
											<a href="image.php?id=' . $row['id'] . '">' . $row['filename'] . '</a>
											<br>' . $row['description'] . '
										</div>
									</div>';
			//echo $pillar . ' ' . $file . '<br>';
			$pillar++;
		}
	}
	
?>
<div class="tiger-main">
    <form action="" method="get">
		<table class="tiger-table table-input">
			<tr>
				<td>Folder</td>
				<td><input type="text" name="folder" class="tiger-input-text"></td>
			</tr>
			<tr>
				<td>Tags</td>
				<td><input type="text" name="tags" class="tiger-input-text"></td>
			</tr>
			<tr>
				<td>Action</td>
				<td><input type="submit" name="submit" class="tiger-input-text"></td>
			</tr>
		</table>
	</form>

    <div class="tiger-pillar" style="margin-top:15px;padding-bottom:0;">
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