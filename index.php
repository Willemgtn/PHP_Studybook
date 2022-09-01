<!-- Application directive. -->
<?php
include('config.php');

if (!Sql::connect()) {
    die('<hr>Failed to connect to database <hr>');
}


@$_GET['url'] == 'reset' ? DButils::newResetDatabase() : false;
@$_GET['url'] == 'setup' ? DButils::setupTables() : false;
@$_GET['url'] == 'logout' ? Login::logout() : false;


if (isset($_GET['url'])) {
    if ($_GET['url'] == 'Login') {
        if (isset($_POST['login']) && $_POST['login']) {
            $sql = Sql::connect()->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $sql->execute([$_POST['username'], $_POST['password']]);
            if ($sql->rowCount() == 1) {
                echo 'Authorized';
                $sql = $sql->fetch(PDO::FETCH_ASSOC);
                // print_r($sql);
                $_SESSION['login'] = $sql;
                if (isset($_POST['remindMe'])) {
                    // setcookie('remember', true, time() + (60 * 60 * 24), '/');
                    setcookie('user', $user, time() + (60 * 60 * 24), '/');
                }
            } else {
                echo 'Bad login';
            }
        }
    }
}

























include('./pages/main.php');
