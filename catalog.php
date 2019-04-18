<?php
	require_once('head.php');
	require_once('config.php');
	$result = $conn->query('select * from tb_category');
?>
<div class="tiger-main">
	<table class="tiger-table">
		<?php
			while($row = $result->fetch_assoc()) {
				echo '<tr>';
				echo '<td><a href="gallery.php?id=' . $row['id'] . '">' . $row['name'] . '</a>';
				echo '<td>' . $row['description'];
				echo '</tr>';
			}
		?>
	</table>
</div>
<?php require_once('foot.php') ?>