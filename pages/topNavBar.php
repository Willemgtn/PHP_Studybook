<nav class="navbar navbar-expand-lg bg-dark ">
    <div class="container-lg">
        <a class="navbar-brand" href="./">Studybook</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="me-auto"></div>
            <ul class="navbar-nav me-2 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./admin">Admin</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- (Avatar)Dropdown -->
                        <img src="<?php echo HOME_URL ?>upload/<?php echo $_SESSION['picture'] ?? 'default_profile.png' ?>" alt="<?php echo $_SESSION['username'] ?? 'Guest' ?>" class="profilePicture">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <?php
                        if (isset($_SESSION['login'])) { ?>

                            <li><a class="dropdown-item" href="<?php echo HOME_URL ?>user"><?php echo $_SESSION['login']['username'] ?></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                        <?php } else {
                        ?>
                            <li><a class="dropdown-item" href="<?php echo HOME_URL ?>Login">Login</a></li>
                        <?php }
                        ?>
                        <li><a class="dropdown-item" href="./">...</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?php echo HOME_URL ?>logout">logout</a></li>

                    </ul>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li> -->
            </ul>
            <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
        </div>
    </div>
</nav>