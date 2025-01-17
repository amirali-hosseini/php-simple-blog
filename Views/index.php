<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/Views/assets/img/favicon.ico">
    <title>Mediumish</title>
    <!-- Bootstrap core CSS -->
    <link href="/Views/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/Views/assets/css/mediumish.css" rel="stylesheet">
</head>
<body>

<?php include_once 'Views/layouts/header.php' ?>

<!-- Begin Site Title
================================================== -->
<div class="container">

    <!-- Begin Featured
    ================================================== -->
    <section class="featured-posts">
        <div class="section-title">
            <h2><span>Articles</span></h2>
        </div>
        <div class="card-columns listfeaturedtag">

            <?php if ($articles->rowCount()): ?>
                <?php foreach ($articles as $article): ?>

                    <?php
                    $author = $db->query("SELECT * FROM `users` WHERE `id` = " . $article['user_id']);

                    $author = $author->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <!-- begin post -->
                    <div class="card">
                        <div class="row">
                            <div class="col-md-5 wrapthumbnail">
                                <div class="thumbnail"
                                     style="background-image:url(<?= '/Uploads/articles/' . $article['image'] ?>);">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-block">
                                    <h2 class="card-title"><a href="single.php?article_id=<?= $article['id'] ?>"><?= $article['title'] ?></a></h2>
                                    <h4 class="card-text"><?= substr($article['body'], 0, 150) . '...' ?></h4>
                                    <div class="metafooter">
                                        <div class="wrapfooter">
								<span class="meta-footer-thumb">
                                    <img class="author-thumb"
                                         src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x"
                                         alt="Sal">
								</span>
                                            <span class="author-meta">
								<span class="post-name">
                                    <a href="single.php?article_id=<?= $article['id'] ?>"><?= $author['name'] ?></a>
                                </span><br/>
								<span class="post-date">
                                    <?= date('j M Y', strtotime($article['created_at'])) ?>
                                </span>
                                    <span class="dot"></span>
                                    <span class="post-read">6 min read</span>
								</span>
                                            <span class="post-read-more">
                                    <svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25">
                                        <path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z"
                                              fill-rule="evenodd"></path>
                                    </svg>
                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end post -->
                <?php endforeach; ?>
            <?php else: ?>
                <p class="alert alert-danger w-100">No article related to this category/keyword was found.</p>
            <?php endif; ?>

        </div>
    </section>
    <!-- End Featured
    ================================================== -->

    <?php include_once 'Views/layouts/footer.php' ?>

</div>
<!-- /.container -->

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/Views/assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="/Views/assets/js/bootstrap.min.js"></script>
<script src="/Views/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
