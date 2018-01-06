<nav class="nav-extended teal">
    <div class="container">
        <div class="nav-wrapper">
            <a href="/" class="brand-logo center">Open Movie Database App</a>
        </div>
        <div class="nav-content">
            <form class="search-wrapper card black-text" action="/">
                <input id="material-search" placeholder="Search Movies, Shows, Episodes Here ..."
                    type="text" class="mr-half"
                    name="search"
                    value="<?= App\Core\Request::query('search') ?? '' ?>">
                <?php $filter = App\Core\Request::query('type') ?? '' ?>
                <select name="type" class="mr-half">
                    <option value="all" <?= $filter != "movie" && $filter!="series" ? 'selected' : '' ?> > All </option>
                    <option value="movie" <?= $filter == "movie" ? 'selected' : '' ?>>Movies</option>
                    <option value="series" <?= $filter == "series" ? 'selected' : '' ?>>TV Shows</option>
                </select>
                <button type="submit" class="transparent"><i class="material-icons">search</i></button>
            </form>
        </div>
    </div>
  </nav>