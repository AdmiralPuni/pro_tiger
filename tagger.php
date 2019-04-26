<?php
	require_once('head.php');
	require_once('config.php');
	if(isset($_POST['submit'])){
		for ($i=1; $i<=$_POST['num'] ; $i++) { 
			//echo $_POST['imgid' . $i];
			$query = 'update tb_image set description="' . $_POST['img' . $i] . '" where id=' . $_POST['imgid' . $i];
			mysqli_query($conn,$query);
		}
	}
	$query = 'select * from tb_image where description="" and category_id=' . $_GET['cid'];
	$result = mysqli_query($conn,$query);
?>
<div class="tiger-main">
	<table class="tiger-table">
		<form action="" method="post">
		<?php
			$query = 'select folder from tb_category where id="' . $_GET['cid'] . '"';
			$fname = mysqli_fetch_assoc(mysqlI_query($conn,$query));
			$files = scandir('main/original/' . $fname['folder'] . '/');
            $time = 2;
            $idx = 0;
			foreach($result as $file) {
                $idx++;
				echo '<tr>';
				echo '<td><img src="main/original/' . $fname['folder'] . '/' . $file['filename'] . '">';
				echo '<td>' . $file['id'] . '<hr><textarea name="img' . $idx . '"></textarea><input type="text" name="imgid' .$idx . '" value="' . $file['id'] .'">';
				echo '</tr>';
			}
		?>

		<tr>
			<td><input type="text" name="num" value="<?= $idx ?>"></td>
			<td><input type="submit" name="submit"></td>
		</tr>
		</form>
	</table>
</div>
<?php require_once('foot.php') ?>