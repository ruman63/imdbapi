<?php view('layouts/head'); ?>
    <div class="container">
        <div class="row clearfix">
            <table>
                <?php foreach ($list as $movie): ?>
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
<?php view('layouts/footer'); ?>