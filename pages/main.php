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

    <div class="phpdebug">
        <?php
        include('./pages/topNavBar.php');

        echo '<hr>';

        print_r(DButils::showTables());

        if (!Sql::connect()) {
            echo '<hr>Failed to connect to database <hr>';
        }


        echo '<hr>';



        echo '<hr>';

        // $sql = Sql::connect()->prepare('DROP TABLE toDelete');
        // $sql->execute();
        // $sql->debugDumpParams();




        $sqlStatements = ['CREATE TABLE `studybook`.`toDelete` 
                    ( `id` INT NOT NULL AUTO_INCREMENT , 
                    `number` INT(15) NOT NULL , 
                    `shorttext` VARCHAR(255) NOT NULL , 
                    `longtext` TEXT NOT NULL , 
                    PRIMARY KEY (`id`)) 
                    ENGINE = InnoDB; '];


        ?>
    </div>
    <div id='main' class="container-lg">
        <div class="row">
            <div class="col-2">
                <p>sidebar</p>
            </div>
            <div class="col-10">
                <p>Main</p>
            </div>
        </div>
    </div>
</body>

</html>