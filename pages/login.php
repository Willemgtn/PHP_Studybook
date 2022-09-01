<div class="box-login ">
    <div class="box-login-center">
        <h2><i class="bi bi-key"></i></h2>
        <h2>Area de login</h2>

        <form method="post" action="">
            <!-- <label for="username">Username: </label>
        <input type="text" name="username" id="username" value="<?php if (isset($_COOKIE['user'])) echo $_COOKIE['user'] ?>" placeholder="Username"> -->
            <div class="input-group mb-3">
                <span class="input-group-text">@</span>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGroup1" placeholder="Username" name="username" value="<?php echo $_COOKIE['user'] ?? '' ?>">
                    <label for="floatingInputGroup1">Username</label>
                </div>
            </div>
            <!-- <label for="password">Password: </label>
        <input type="password" name="password" id="password" placeholder="Password"> -->
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-key"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGroup2" placeholder="Username" name="password">
                    <label for="floatingInputGroup2">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input class="btn btn-light" type="submit" name="login" value="Login">

                </div>
                <div class="col">
                    <label for="remindMe">Remember ?</label>
                    <input type="checkbox" name="remindMe" id="remindMe" value="bla" style="height: 1em; width: 1em;">
                </div>
            </div>



        </form>
    </div>
</div>
<link rel="stylesheet" href="./css/login.css">