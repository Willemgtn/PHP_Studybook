<!-- Application directive. -->
<?php
include('config.php');

if (!Sql::connect()) {
    die('<hr>Failed to connect to database <hr>');
}


@$_GET['url'] == 'reset' ? DButils::newResetDatabase() : false;
@$_GET['url'] == 'setup' ? DButils::setupTables() : false;

























include('./pages/main.php');
