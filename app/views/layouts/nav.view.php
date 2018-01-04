<nav class="nav-extended teal">
    <div class="container">
        <div class="nav-wrapper">
            <a href="/" class="brand-logo center">Open Movie Database App</a>
        </div>
        <div class="nav-content">
            <form class="search-wrapper card" action="/">
                <div class="input-field black-text">
                    <input id="material-search" placeholder="Search Movies, Shows, Episodes Here ..."
                        type="text" 
                        name="search"
                        value="<?= App\Core\Request::query('search') ?? '' ?>">
                    <i class="material-icons">search</i>
                </div>
            </form>
        </div>
    </div>
  </nav>