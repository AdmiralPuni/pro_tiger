<!DOCTYPE html>
<html>
<head>
    <title>die Kunstgalerie</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="tiger-hull">
<table class="tiger-head">
            <tr class="tiger-head-head">
                <td colspan=4>
                    <?php
                        error_reporting(0);
                        switch(mt_rand(1,8)){
                            case 1:
                                echo '<h1>アートギャラリー</h1>';
                            break;
                            case 2:
                                echo '<h1>Kunstgalerie</h1>';
                            break;
                            case 3:
                                echo '<h1>Galerie d\'art</h1>';
                            break;
                            case 4:
                                echo '<h1>Галерея искусств</h1>';
                            break;
                            case 5:
                                echo '<h1>Art Gallery</h1>';
                            break;
                            case 6:
                                echo '<h1>Galería de arte</h1>';
                            break;
                            case 7:
                                echo '<h1>美术馆</h1>';
                            break;
                            case 8:
                                echo '<h1>Γκαλερί τέχνης</h1>';
                            break;
                        }
                    ?>
                </td>
            </tr>
            <tr class="tiger-head-nav">
                <td><a href="index.php"><button>Home</button></a></td>
				<td><a href="catalog.php"><button>Catalog</button></a></td>
                <td><a href="search.php"><button>Search</button></a></td>
            </tr>
        </table>