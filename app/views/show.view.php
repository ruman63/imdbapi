<?php view('layouts/head'); ?>
<?php if (!count(errors())): ?>
    <div class="teal lighten-2 pv-2">
        <div class="container">
            <div class="movie-card card-panel">
                <h3 class="mb-0"><?= $movie->Title ?> <small><?= "({$movie->Year})" ?></small> </h3>
                <div>
                    <?= ucwords($movie->Type) ?>
                    <span class="seperator">|</span>
                    <?= "Runtime <b>{$movie->Runtime}</b>" ?>
                    <?= $movie->Director != 'N/A' ? "<span class=\"seperator\">|</span>Directed by <b>{$movie->Director}</b>" : "" ?>
                    <?= $movie->Type == 'series' ? "<span class=\"seperator\">|</span>Total Seasons <b>{$movie->totalSeasons}</b>" : "" ?>
                </div>
                <div class="mb-1">
                    <span class="orange-text mb-1">
                        <?php foreach (range(1, 5) as $i): ?>
                        <?php if ($i <= $movie->imdbRating/2): ?>
                        <i class="tiny material-icons">star</i>
                        <?php elseif ($i == ceil($movie->imdbRating/2)): ?>
                        <i class="tiny material-icons">star_half</i>
                        <?php else: ?>
                        <i class="tiny material-icons">star_border</i>
                        <?php endif;?>
                        <?php endforeach; ?> 
                    </span>
                    <img src="/public/images/imdb.png" alt="imdb-logo" class="inline-xs-img ml-half mr-half">
                    <?= "{$movie->imdbRating}/10" ?> &nbsp; <small><?= "({$movie->imdbVotes} votes)"?></small>
                </div>
                <div class="row">
                    <div class="col s12 m4 l3">
                        <div class="poster">
                            <img src="<?= $movie->Poster !='N/A' ? $movie->Poster : '/public/images/noposter.jpg' ?>" alt="<?= $movie->Title ?>">
                        </div>
                    </div>
                    <div class="col s12 m8 l9">
                        <p class="flow-text small-text">
                            <?= str_limit($movie->Plot, 250); ?>
                            <?php if (strlen($movie->Plot) > 250): ?>
                                <a href="#storyline" data-expand="0">Read more</a>
                            <?php endif; ?>
                        </p>
                        <div class="tags">
                            <?php foreach (explode(', ', $movie->Genre) as $genre) : ?>
                                <div class="chip teal white-text">
                                    <?= $genre ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="teal darken-2 pv-2">
        <div class="container">
                <ul class="collapsible popout" data-collapsible="accordion">
                    <li id="storyline">
                        <div class="collapsible-header"><i class="material-icons">theaters</i>Storyline</div>
                        <div class="collapsible-body white">
                            <?= $movie->Plot ?>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header active"><i class="material-icons">info</i>More Information</div>
                        <div class="collapsible-body white">
                            <div><b>Directed By:</b> <em><?= $movie->Director ?></em></div>
                            <div><b>Actor(s):</b> <em><?= $movie->Actors ?></em></div>
                            <div><b>Written:</b> <em><?= $movie->Writer ?></em></div>
                            <div><b>Genre:</b> <em><?=$movie->Genre?></em></div>
                            <div><b>Rated:</b> <em><?=$movie->Rated?></em></div>
                            <div><b>Runtime:</b> <em><?=$movie->Runtime?></em></div>
                            <div><b>Released Date:</b> <em><?= $movie->Released ?></em></div>
                            <div><b>Language:</b> <em><?= $movie->Language ?></em></div>
                            <div><b>Country:</b> <em><?= $movie->Country ?></em></div>
                            <div><b>Awards:</b> <em><?= $movie->Awards ?></em></div>
                            <?php if ($movie->Type == 'movie'): ?>
                                <div> <b>Production:</b> <em><?= $movie->Production ?></em></div>
                                <div> <b>Gross:</b> <em><?= $movie->BoxOffice ?></em></div>
                            <?php else: ?>
                                <div> <b>Total Seasons:</b> <em><?= $movie->totalSeasons ?></em></div>
                            <?php endif; ?>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">star_half</i>Ratings</div>
                        <div class="collapsible-body white">
                            <ul class="collection teal">
                                <?php foreach ($movie->Ratings as $rating): ?>
                                    <li class="collection-item teal white-text"><b> <?= $rating->Source ?> </b> <br> <em></em> <?= $rating->Value ?> </em></li>
                                <?php endforeach; ?>
                            </ul> 
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
<?php view('layouts/footer'); ?>
