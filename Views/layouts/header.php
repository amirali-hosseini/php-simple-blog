<!-- Begin Nav
================================================== -->
<nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <!-- Begin Logo -->
        <a class="navbar-brand" href="/index.php">
            <img src="/Views/assets/img/logo.png" alt="Mediumish">
        </a>
        <!-- End Logo -->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <!-- Begin Menu -->
            <ul class="navbar-nav ml-auto">
                <?php if ($categories->rowCount()): ?>
                    <?php foreach ($categories as $category): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= (isset($_GET['category_id']) && $category['id'] == $_GET['category_id']) ? 'active' : '' ?>"
                               href="/index.php?category_id=<?= $category['id'] ?>"><?= $category['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <!-- End Menu -->
            <!-- Begin Search -->
            <form class="form-inline my-2 my-lg-0" method="get">
                <input value="<?= $_GET['q'] ?? '' ?>" class="form-control mr-sm-2" name="q" type="text"
                       placeholder="Search">
                <span class="search-icon"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path
                                d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path></svg></span>
            </form>
            <!-- End Search -->
        </div>
    </div>
</nav>
<!-- End Nav
================================================== -->