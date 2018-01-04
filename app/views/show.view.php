<?php view('layouts/head'); ?>
<div class="container">
    <div class="section">
        <div class="level v-centered">
            <img src="<?= $movie->Poster ?>" alt="<?= $movie->Title ?>" class="mr-1 maxh-350p">
            <div class="flex">
                <h2 class="mb-0"><?= $movie->Title ?> <small><?= "({$movie->Year})" ?></small> </h2>
                <h4 class="mt-0"><small><?= ucwords($movie->Type)?></small></h4>
                <div class="level wrap-2">
                    <span class="flex"><b>Rating (IMdb): </b> <?php foreach (range(1, 5) as $i): ?>
                            <?php if ($i <= $movie->imdbRating/2): ?>
                                <i class="tiny orange-text material-icons">star</i>
                            <?php elseif ($i == ceil($movie->imdbRating/2)): ?>
                                <i class="tiny orange-text material-icons">star_half</i>
                            <?php else: ?>
                                <i class="tiny orange-text material-icons">star_border</i>
                            <?php endif;?>
                        <?php endforeach; ?> <em><?= "{$movie->imdbRating}/10" ?> <small><?= "({$movie->imdbVotes} votes)"?></small></em>
                    </span>
                    <span class="flex"><b>Runtime:</b> <em><?=$movie->Runtime?></em></span>
                    <span class="flex"> <b>Released Date:</b> <em><?= $movie->Released ?></em></span>
                    <span class="flex"><b>Genre:</b> <em><?=$movie->Genre?></em></span>
                    <span class="flex"><b>Rated:</b> <em><?=$movie->Rated?></em></span>
                    <span class="flex"> <b>Directed By:</b> <em><?= $movie->Director ?></em></span>
                    <span class="flex"> <b>Written:</b> <em><?= $movie->Writer ?></em></span>
                    <span class="flex"> <b>Language:</b> <em><?= $movie->Language ?></em></span>
                    <span class="flex"> <b>Country:</b> <em><?= $movie->Country ?></em></span>
                    <span class="flex"> <b>Actor(s):</b> <em><?= $movie->Actors ?></em></span>
                    <span class="flex"> <b>Awards:</b> <em><?= $movie->Awards ?></em></span>
                    <span class="flex"> <b>Production:</b> <em><?= $movie->Production ?></em></span>
                    <span class="flex"> <b>Gross:</b> <em><?= $movie->BoxOffice ?></em></span>
                </div>
            </div>
        </div>
        <div class="section">
            <h5>Storyline:</h5>
            <p class="flow-text small">
                <?= $movie->Plot ?>
            </p>
            <?php if (count($movie->Ratings)): ?>
                <p class="level">
                    <?php foreach ($movie->Ratings as $rating): ?>
                        <span class="flex"><b> <?= $rating->Source ?> </b> <em> <?= $rating->Value ?> </em> <br></span>
                    <?php endforeach; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php view('layouts/footer'); ?>
