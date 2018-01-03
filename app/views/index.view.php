<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <title>Open Movie Database</title>
</head>
<body>
    <div class="container">
        <div class="row clearfix">
            <table>
                <?php foreach ((array)$list as $movie): ?>
                    <tr>
                        <td style="vartical-align: middle;">
                            <img src="<?php echo $movie->Poster ?>" alt="<?php echo $movie->Title ?>" height="40">
                            <span class="card-title"> <?php echo $movie->Title . " (" . $movie->Year . ")"; ?> </span>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>    
</body>
</html>