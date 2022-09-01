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

        $sqlTablesMaps = [
            'subject' => 'CREATE TABLE `studybook`.`subject` 
                        ( `id` INT NOT NULL AUTO_INCREMENT , 
                        `name` VARCHAR(255) NOT NULL , 
                        `ordem_id` INT NOT NULL , 
                        `user_id` INT NOT NULL , 
                        PRIMARY KEY (`id`)) 
                        ENGINE = InnoDB; ',
            'section' => 'CREATE TABLE `studybook`.`section` 
                        ( `id` INT NOT NULL AUTO_INCREMENT , 
                        `name` VARCHAR(255) NOT NULL , 
                        `ordem_id` INT NOT NULL , 
                        `user_id` INT NOT NULL , 
                        `visible` INT (1) NOT NULL , 
                        PRIMARY KEY (`id`)) 
                        ENGINE = InnoDB; ',
            'topic' => 'CREATE TABLE `studybook`.`topic` 
                        ( `id` INT NOT NULL AUTO_INCREMENT , 
                        `title` text NOT NULL , 
                        `description` text NOT NULL , 
                        `ordem_id` INT NOT NULL , 
                        `user_id` INT NOT NULL , 
                        PRIMARY KEY (`id`)) 
                        ENGINE = InnoDB; ',
            'users' => 'CREATE TABLE `studybook`.`users` 
                        ( `id` INT NOT NULL AUTO_INCREMENT , 
                        `username` VARCHAR(255) NOT NULL , 
                        `password` VARCHAR(255) NOT NULL , 
                        `privileges` INT(1) NOT NULL , 
                        PRIMARY KEY (`id`)) ENGINE = InnoDB; '
        ];
        function createTable(string $tableName, string $describeTableQuery)
        {
            $sql = Sql::connect()->prepare($describeTableQuery);
            if ($sql->execute()) {
                echo "$tableName table created <br>";
            } else {
                echo "$tableName table could not be created. <br>";
            }
        };
        if (!Sql::connect()) {
            echo '<hr>Failed to connect to database <hr>';
        }
        $sql = Sql::connect()->prepare('DROP TABLE subject')->execute();
        $sql = Sql::connect()->prepare('DROP TABLE section')->execute();
        $sql = Sql::connect()->prepare('DROP TABLE topic')->execute();

        $sql = Sql::connect()->prepare('SHOW TABLES');
        // $sql = Sql::connect()->execute('SHOW tables');
        // $sql->exec();
        $sql->execute();
        // $sql->debugDumpParams();
        $sql = $sql->fetchAll(PDO::FETCH_NUM);
        if ($sql) {
            foreach ($sql as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    $sqlData[] = $value2;
                }
            }
            echo '$sqlData:   ';
            print_r($sqlData);
            echo '<br>';

            // Create suject table if it doesn't exists.
            if (!in_array('subject', $sqlData)) {

                createTable('subject', $sqlTablesMaps['subject']);
            }
            // Create a section table if it doesn't exist.
            if (!in_array('section', $sqlData)) {

                createTable('section', $sqlTablesMaps['section']);
            }
            // Create a topic table if it doesn't exist.
            if (!in_array('topic', $sqlData)) {
                // echo 'Topic table does not exist in database <br>';
                // $sql = Sql::connect()->prepare($sqlTablesMaps['topic']);
                // if ($sql->execute()) {
                //     echo 'Topic table created <br>';
                // } else {
                //     echo 'Topic table could not be created. <br>';
                // }
                createTable('topic', $sqlTablesMaps['topic']);
            }
        } else {
            // No table exists in the database, create the site's config table.
            echo 'No tables found in the database';
            // $sql = Sql::connect()->prepare($sqlTablesMaps['subject'])->execute();
            createTable('users', $sqlTablesMaps['users']);
            // ask the administrator for credentials to create the first users that's also admin.

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