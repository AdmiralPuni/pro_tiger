<?php 
    require_once('head.php');
    
?>
<div class="tiger-main" style="padding-bottom: 0;">
    <?php
        $pillar_item = array();
        $pillar_item[0] = '';
        $pillar_item[1] = '';
        $pillar_item[2] = '';
        $files = scandir('main/thumb/tkmiz/');
        $time = 2;
        $pillar = 0;
        foreach($files as $file) {
            if($time<>0){
                $time--;
                continue;
            }
            if($pillar==3){
                $pillar=0;
            }
            $pillar_item[$pillar] .= '<div class="tiger-pillar-image">
                                        <img src="main/thumb/tkmiz/' . $file . '" alt="">
                                        <div class="desc">
                                            ' . $file . '
                                        </div>
                                    </div>';
            //echo $pillar . ' ' . $file . '<br>';
            $pillar++;
        }
    ?>
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