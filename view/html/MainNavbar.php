<nav class="navbar top-navbar navbar-expand">
    <div class="collapse navbar-collapse" id="navbarSupportContent">
        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>

        <form class="nav-search-form d-none ml-auto d-md-block">

        </form>

        <ul class="navbar-nav right-nav align-items-center">
            <li class="nav-item">
                <a class="nav-link bx-fullscreen-btn" id="fullscreen-button">
                    <i class="bx bx-fullscreen"></i>
                </a>
            </li>

            <li class="nav-item dropdown language-switch-nav-item">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="..\..\public\img\spain-flag.jpg" alt="image">
                    <span>Español <i class='bx bx-chevron-down'></i></span>
                </a>

                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item d-flex justify-content-between align-items-center">
                        <span>German</span>

                        <img src="..\..\public\img\germany-flag.jpg" alt="flag">
                    </a>

                    <a href="#" class="dropdown-item d-flex justify-content-between align-items-center">
                        <span>French</span>

                        <img src="..\..\public\img\france-flag.jpg" alt="flag">
                    </a>

                    <a href="#" class="dropdown-item d-flex justify-content-between align-items-center">
                        <span>English</span>

                        <img src="..\..\public\img\us-flag.jpg" alt="flag">
                    </a>

                    <a href="#" class="dropdown-item d-flex justify-content-between align-items-center">
                        <span>Russian</span>

                        <img src="..\..\public\img\russia-flag.jpg" alt="flag">
                    </a>

                    <a href="#" class="dropdown-item d-flex justify-content-between align-items-center">
                        <span>Italian</span>

                        <img src="..\..\public\img\italy-flag.jpg" alt="flag">
                    </a>
                </div>
            </li>

            <li class="nav-item dropdown profile-nav-item">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="menu-profile">
                        <span class="name">Hola! <?php echo $_SESSION["usu_nom"] ?></span>
                        <img src="..\..\public\img\70x70.jpg" class="rounded-circle" alt="image">
                    </div>
                </a>

                <div class="dropdown-menu">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div class="figure mb-3">
                            <img src="..\..\public\img\70x70.jpg" class="rounded-circle" alt="image">
                        </div>

                        <div class="info text-center">
                            <span class="name"><?php echo $_SESSION["usu_nom"] ." ".$_SESSION["usu_apep"] ?></span>
                            <p class="mb-3 email"><?php echo $_SESSION["usu_correo"] ?></p>
                        </div>
                    </div>

                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class='bx bx-user'></i> <span>Perfil</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown-footer">
                        <ul class="profile-nav">
                            <li class="nav-item">
                                <a href="../html/logout.php" class="nav-link">
                                    <i class='bx bx-log-out'></i> <span>Cerrar Sesion</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>