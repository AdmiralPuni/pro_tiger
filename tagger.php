<?php
	require_once('head.php');
?>
<div class="tiger-main">
	<table class="tiger-table">
		<?php
			$files = scandir('main/original/2hu/');
            $time = 2;
            $idx = -2;
			foreach($files as $file) {
                $idx++;
                if($time<>0){
                    $time--;
                    continue;
                }
				echo '<tr>';
				echo '<td><img src="main/original/2hu/' . $file . '">';
				echo '<td>' . $idx . '<hr><textarea name="img' . $idx . '"></textarea>';
				echo '</tr>';
			}
		?>
	</table>
</div>
<?php require_once('foot.php') ?>