<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
    <!-- CSS Files -->
    <link href="/Views/admin/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/Views/admin/assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet"/>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/Views/admin/assets/css/demo.css" rel="stylesheet"/>
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-image="/Views/admin/assets/img/sidebar-5.jpg">
        <?php include_once __DIR__ . '/../layouts/sidebar.php' ?>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <?php include_once __DIR__ . '/../layouts/navbar.php' ?>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="card-body table-full-width table-responsive">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="my-2">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title ..."
                                   value="<?= $article['title'] ?>">
                            <?= isset($errors['title']) ? "<p class='text-danger'>" . $errors['title'] . "</p>" : '' ?>
                        </div>

                        <div class="my-2">
                            <textarea name="body" id="body" cols="30" rows="10" placeholder="Body ..."
                                      class="form-control"><?= $article['body'] ?></textarea>
                            <?= isset($errors['body']) ? "<p class='text-danger'>" . $errors['body'] . "</p>" : '' ?>
                        </div>

                        <div class="my-2">
                            <select name="category_id" class="form-control" id="category_id">
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['id'] ?>" <?= $article['category_id'] == $category['id'] ? 'selected' : '' ?>><?= $category['title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= isset($errors['category_id']) ? "<p class='text-danger'>" . $errors['category_id'] . "</p>" : '' ?>
                        </div>

                        <div class="my-2">
                            <input type="file" name="image" id="image" class="form-control">
                            <?= isset($errors['image']) ? "<p class='text-danger'>" . $errors['image'] . "</p>" : '' ?>
                        </div>

                        <div class="my-2">
                            <select name="status" class="form-control" id="status">
                                <option value="0">Draft</option>
                                <option value="1" <?= $article['status'] ? 'selected' : '' ?>>Published</option>
                            </select>
                        </div>

                        <div class="my-2">
                            <input type="submit" value="Send" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include_once __DIR__ . '/../layouts/footer.php' ?>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="/Views/admin/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="/Views/admin/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="/Views/admin/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="/Views/admin/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="/Views/admin/assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/Views/admin/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="/Views/admin/assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="/Views/admin/assets/js/demo.js"></script>

</html>