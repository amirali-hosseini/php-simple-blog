<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
<div class="d-flex align-items-center justify-content-center flex-column" style="height: 100vh;">
    <div><img src="../../Views/assets/img/logo.png" alt="" class="logo"></div>
    <div class="form-group my-4" style="width: 300px;">
        <form action="" method="post">
            <div class="my-3">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                <?= isset($errors['email']) ? '<p class="text-danger">' . $errors['email'] . '</p>' : '' ?>
            </div>
            <div class="my-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <?= isset($errors['password']) ? '<p class="text-danger">' . $errors['password'] . '</p>' : '' ?>
            </div>
            <div>
                <input type="submit" value="Login" class="btn btn-outline-success w-100">
            </div>
        </form>
    </div>
</div>
</body>
</html>