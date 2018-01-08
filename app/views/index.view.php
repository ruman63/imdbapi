<?php view('layouts/head'); ?>
    <div class="container">
        <div class="section">
            <div class="col s12">
                <?php if ($movies && count($movies->data())): ?>
                    <h5 class="title">
                        Showing <?= "{$movies->from()}-{$movies->to()}" ?> of <?= $movies->total ?> result(s) for "<?= App\Core\Request::query('search') ?>"
                    </h5>
                    <ul class="collection">
                    <?php foreach ($movies->data() as $movie): ?>
                        <li class="collection-item avatar">
                            <img src="<?= $movie->Poster ?>" alt="<?= $movie->Title ?>" class="circle auto-height square">
                            <span class="title">
                                <a href="/show?id=<?= $movie->imdbID ?>">
                                    <?= "{$movie->Title}" ?> 
                                </a> <?= "({$movie->Year})"; ?>
                            </span>
                            <p>
                                <?= ucwords($movie->Type) ?>
                            </p>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                    <div class="clearfix center-align">
                        <?php if ($movies->hasPrevious()): ?>
                            <a href="<?= $movies->previousUrl() ?>" class="btn waves-effect"> <i class="material-icons left">chevron_left</i> Prev </span></a>
                        <?php endif; ?>
                        <?php if ($movies->hasNext()): ?>
                            <a href="<?= $movies->nextUrl() ?>" class="btn waves-effect"> Next <i class="material-icons right">chevron_right</i> </a>
                        <?php endif; ?>
                    </div>
                <?php elseif (count($_SESSION['flash']['errors'])):?>
                    <span data-toast data-text="<?= $_SESSION['flash']['errors'][0] ?>" data-duration="6000"></span>
                <?php else: ?>
                    <div class="card-panel">Welcome, Try searching for Movies, TV Shows...</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php view('layouts/footer'); ?>