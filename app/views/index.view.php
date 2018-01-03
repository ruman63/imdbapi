<?php view('layouts/head'); ?>
    <div>
        <?php foreach ($list as $movie): ?>
            <div class="level pa-2">
                <img src="<?php echo $movie->Poster ?>" 
                    alt="<?php echo $movie->Title ?>" 
                    class="maxh-4 mr-1">
                <div class="flex">
                    <h3 class="no-m"> <?php echo $movie->Title . " (" . $movie->Year . ")"; ?> </h3>
                    <h4 class="no-m"><small><?php echo $movie->Type ?></small></h4>
                    <a href="/show?id=<?php echo $movie->imdbID ?>"> Read More </a>
                </div>
            </div>
            <hr>
        <?php endforeach ?>
    </div>
<?php view('layouts/footer'); ?>