<?php 
	require_once('head.php');
	require_once('config.php');
	if(isset($_GET['s'])){
		$que = $conn->prepare('select id,filename,description from tb_image where description regexp(?)');
		$que->bind_param("s",$tags);
		$tags = $_GET['tags'];
		$que->execute();
		$que->bind_result($id,$filename,$description);
		//$result = $conn->query('select id,filename,description from tb_image where description regexp("' . str_replace(' ','|',$_GET['tags']) . '")');
		//echo 'select id,filename,description from tb_image description regexp("' . str_replace(' ','|',$_GET['tags']) . '")';
		$pillar = 0;
		$Pillar_item = array();
		$pillar_item[0] = '';
		$pillar_item[1] = '';
		$pillar_item[2] = '';
	
		while($que->fetch()) {
			if($pillar==3){
				$pillar=0;
			}
			if(!file_exists('main/thumb/' . $_GET['folder'] . '/' . $filename)){
				continue;
			}
			$pillar_item[$pillar] .= '<div class="tiger-pillar-image">
										<img src="main/thumb/' . $_GET['folder'] . '/' . $filename . '" alt="">
										<div class="desc">
											<a href="image.php?id=' . $id . '">' . $filename . '</a>
											<br>' . $description . '
										</div>
									</div>';
			//echo $pillar . ' ' . $file . '<br>';
			$pillar++;
		}
	}
	
?>
<div class="tiger-main" style="padding-bottom:0;">
    <form action="" method="get">
		<table class="tiger-table table-input">
			<tr>
				<td>Folder</td>
				<?php
					$files = scandir('main/original/');
				?>
				<td><select name="folder" id="" class="tiger-input-text">
				<?php for ($i=2; $i<sizeof($files) ; $i++): ?>
            <option value="<?= $files[$i] ?>"><?= $files[$i] ?></option>
			<?php endfor ?>
				</select></td>
			</tr>
			<tr>
				<td>Tags</td>
				<td><input type="text" name="tags" class="tiger-input-text"></td>
			</tr>
			<tr>
				<td>Action</td>
				<td><input type="submit" name="s" class="tiger-input-text" value="true"></td>
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