<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyBook</title>

    <!-- Bootstrap External instance -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- Bootstrap End External instance -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- End Bootstrap Icons -->

    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php

    include('./pages/topNavBar.php');

    if (isset($_GET['url']) && $_GET['url'] == 'admin' && $_SESSION['login']['privileges'] > 4) {
        include('admin.php');
    }
    @$_GET['url'] == 'Login' ? include('./pages/login.php') : false;
    @$_GET['url'] == 'user' ? include('./pages/user.php') : false;





    echo '<hr>';


    ?>
    <div id='main' class="container-lg">
        <div class="row">
            <div class="col-2">
                <p>sidebar</p>
            </div>
            <div class="col-10">
                <p>Main</p>
                <ul>
                    <li>
                        <h3>TODOs:</h3>
                    </li>
                    <li>User login page</li>
                    <li>User session</li>

                    <li>Subjects sidebar nav</li>
                    <li>sections </li>
                    <li>topics</li>
                    <li>advanced text editor</li>
                    <li>mobile user experience</li>
                    <li>Topics editing </li>

                </ul>
            </div>
        </div>
    </div>
</body>

</html>