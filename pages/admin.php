<div class="phpdebug">
    <?php

    echo '<hr>';
    echo "Tables: <br>";
    print_r(DButils::showTables());
    $tables = DButils::showTables();
    $tablehead;
    foreach ($tables as $key => $value) {
        echo "<br> Table $value Description: <pre>";
        $sql = Sql::connect()->prepare("DESCRIBE $value");
        $sql->execute();
        // print_r($sql->fetchAll(PDO::FETCH_ASSOC));
        $tableDescription = $sql->fetchAll(PDO::FETCH_ASSOC);
        $tableBody = '';
        foreach ($tableDescription as $key2 => $value2) {
            // echo "$key2, $value2; <br>";
            // global $tableHead;
            $tableHead = '<thead><tr>';
            $tableRow = '<tr>';
            foreach ($value2 as $key3 => $value3) {
                $tableHead .= "<td>$key3</td>";
                $tableRow .= "<td>$value3</td>";
            }
            // $tableHead = array_unique($tableHead);
            $tableHead .= '<tr></thead>';
            $tableRow .= '</tr>';
            $tableBody .= $tableRow;
        }
        echo "<table> $tableHead <tbody> $tableBody </tbody> </table>";
        echo "</pre>";
    }

    if (!Sql::connect()) {
        echo '<hr>Failed to connect to database <hr>';
    }


    echo '<hr>';
    echo "URL: <br>";
    print_r($_GET);

    echo '<hr>';
    echo "Session: <br><pre>";
    print_r($_SESSION);
    echo '</pre><hr>';

    echo "Cookies: <br><pre>";
    print_r($_COOKIE);
    echo '</pre><hr>';


    // if (isset($_SESSION['login'])) {
    //     include('./pages/login.php');
    // }

    $sqlStatements = ['CREATE TABLE `studybook`.`toDelete` 
                    ( `id` INT NOT NULL AUTO_INCREMENT , 
                    `number` INT(15) NOT NULL , 
                    `shorttext` VARCHAR(255) NOT NULL , 
                    `longtext` TEXT NOT NULL , 
                    PRIMARY KEY (`id`)) 
                    ENGINE = InnoDB; '];


    ?>
</div>