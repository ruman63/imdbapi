<nav class="nav-extended teal">
    <div class="container">
        <div class="nav-wrapper">
            <a href="/" class="brand-logo center">Open Movie Database App</a>
        </div>
        <div class="nav-content hide-on-small-only">
            <form class="search-wrapper card" action="/">
                <div class="level v-centered black-text">
                    <input id="material-search" placeholder="Search Movies, Shows, Episodes Here ..."
                        type="text" class="flex mr-half"
                        name="search"
                        value="<?= App\Core\Request::query('search') ?? '' ?>">
                    <select name="type" id="material-search-filter" class="mr-half">
                        <option value="all" selected>All</option>
                        <option value="movie">Movies</option>
                        <option value="series">TV Shows</option>
                    </select>
                    <button type="submit" class="white mr-half"><i class="material-icons">search</i></button>
                </div>
            </form>
        </div>
    </div>
  </nav>