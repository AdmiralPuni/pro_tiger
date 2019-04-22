<?php
	require_once('head.php');
	require_once('config.php');
	$tages = mysqli_query($conn,'select category_id,group_concat(description) as description from tb_image where description!="" group by category_id');
	$arra = array();
	foreach($tages as $tags){
		$arra[$tags['category_id']][] = array_unique(preg_split('/[\s,\s+]/', $tags['description']));
	}
	$result = $conn->query('select * from tb_category');
?>
<div class="tiger-main">
	<table class="tiger-table">
		<?php
			$i=1;
			while($row = $result->fetch_assoc()) {
				sort($arra[$i][0]);
				echo '<tr>';
				echo '<td><a href="gallery.php?id=' . $row['id'] . '">' . $row['name'] . '</a>';
				echo '<td>';
				foreach($arra[$i][0] as $arr){
					echo $arr . ' ';
				}
				echo '</tr>';
				$i++;
			}
		?>
	</table>
</div>
<?php require_once('foot.php') ?>