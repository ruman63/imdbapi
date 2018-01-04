<?php view('layouts/head'); ?>
    <div class="container">
        <div class="section">
            <div class="col s12">
                <?php if (count($list)): ?>
                    <h5 class="title">
                        Found total <?= $total ?> result(s) for "<?= App\Core\Request::query('search') ?>"
                    </h5>
                    <ul class="collection">
                    <?php foreach ($list as $movie): ?>
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
                <?php else: ?>
                    <div class="card-panel">Please Search Something! In the search bar...</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php view('layouts/footer'); ?>