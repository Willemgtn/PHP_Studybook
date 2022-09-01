<?php

class DButils
{
    static $sqlTablesMaps = [
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
                    `picture` VARCHAR(255) , 
                    `privileges` INT(1) NOT NULL , 
                    PRIMARY KEY (`id`)) ENGINE = InnoDB; '
    ];
    static function newResetDatabase()
    {
        $tables = self::showTables();
        if ($tables) {
            foreach ($tables as $key => $value) {
                Sql::connect()->prepare("DROP TABLE $value")->execute();
            }
        }
        header('Location: ./');
    }
    static function resetDatabase()
    {
        $sql = Sql::connect()->prepare('SHOW TABLES');
        $sql->execute();
        $sql = $sql->fetchAll(PDO::FETCH_NUM);
        if ($sql) {
            foreach ($sql as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    $sqlData[] = $value2;
                }
            }

            // 
            // Improvement: execute self::showTables() foreach the return, execute 'drop table on $value.
            // 
            if (!in_array('users', $sqlData)) {
                $sql = Sql::connect()->prepare('DROP TABLE users')->execute();
            }
            if (!in_array('subject', $sqlData)) {
                $sql = Sql::connect()->prepare('DROP TABLE subject')->execute();
            }
            // Create a section table if it doesn't exist.
            if (!in_array('section', $sqlData)) {
                $sql = Sql::connect()->prepare('DROP TABLE section')->execute();
            }
            // Create a topic table if it doesn't exist.
            if (!in_array('topic', $sqlData)) {
                $sql = Sql::connect()->prepare('DROP TABLE topic')->execute();
            }
            header('Location: ./');
        } else {
            // No need for action.
            header('Location: ./');
        }
    }
    static function createTable(string $tableName, string $describeTableQuery, bool $debugOutput = true)
    {
        $sql = Sql::connect()->prepare($describeTableQuery);
        if ($sql->execute()) {
            if (!$debugOutput) {
                return true;
            }
            echo "$tableName table created <br>";
        } else {
            if (!$debugOutput) {
                return false;
            }
            echo "$tableName table could not be created. <br>";
        }
    }
    static function showTables()
    {
        $sql = Sql::connect()->prepare('SHOW TABLES');
        $sql->execute();
        $sql = $sql->fetchAll(PDO::FETCH_NUM);
        if ($sql) {
            foreach ($sql as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    $sqlData[] = $value2;
                }
            }
            return $sqlData;
        } else {
            return false;
        }
    }
    static function setupTables()
    {
        $tables = self::showTables();
        if ($tables) {
            // Create suject table if it doesn't exists.
            if (!in_array('subject', $tables)) {
                DButils::createTable('subject', self::$sqlTablesMaps['subject']);
            }
            // Create a section table if it doesn't exist.
            if (!in_array('section', $tables)) {
                DButils::createTable('section', self::$sqlTablesMaps['section']);
            }
            // Create a topic table if it doesn't exist.
            if (!in_array('topic', $tables)) {
                DButils::createTable('topic', self::$sqlTablesMaps['topic']);
            }
        } else {
            // No table exists in the database, create the site's config table.
            // Before that create an admin user and then the config page.
            echo 'No tables found in the database <br>';
            // $sql = Sql::connect()->prepare($sqlTablesMaps['subject'])->execute();
            DButils::createTable('users', self::$sqlTablesMaps['users']);
            // for now i'll create a default first user admin:admin;
            $sql = Sql::connect()->prepare('INSERT INTO users values (null,?,?,?,?)');
            if ($sql->execute(['admin', 'admin', null, 5])) {
                echo "<hr>Admin user created.<hr>";
            } else {
                echo "<hr>Admin user could not be created.<hr>";
            }

            // ask the administrator for credentials to create the first users that's also admin.

        }
    }
}
