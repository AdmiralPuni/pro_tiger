<!DOCTYPE html>
<html>
<head>
    <title>die Kunstgalerie</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="tiger-hull">
<table class="tiger-head">
            <tr class="tiger-head-head">
                <td colspan=4>
                    <?php
                        switch(mt_rand(1,5)){
                            case 1:
                                echo '<h1>反応画像とアートギャラリー</h1>';
                            break;
                            case 2:
                                echo '<h1>Die Reaktion Bild und Kunstgalerie</h1>';
                            break;
                            case 3:
                                echo '<h1>La imagen de reacción y galería de arte.</h1>';
                            break;
                            case 4:
                                echo '<h1>l\'image de réaction et galerie d\'art</h1>';
                            break;
                            case 5:
                                echo '<h1>reactionem ad imaginem et arte gallery</h1>';
                            break;
                        }
                    ?>
                </td>
            </tr>
            <tr class="tiger-head-nav">
                <td><a href="index.php"><button>Home</button></a></td>
				<td><a href="catalog.php"><button>Catalog</button></a></td>
                <td><a href="gallery.php"><button>Image</button></a></td>
            </tr>
        </table>