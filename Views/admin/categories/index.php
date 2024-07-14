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
                <a href="/Admin/categories_create.php" class="btn btn-info">Create Category</a>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?= $category['id'] ?></td>
                                <td><?= $category['title'] ?></td>
                                <td><?= $category['slug'] ?></td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn btn-secondary m-1"
                                           href="/Admin/categories_edit.php?category_id=<?= $category['id'] ?>">Edit</a>
                                        <a class="btn btn-danger m-1"
                                           href="?delete_id=<?= $category['id'] ?>">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
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