<!-- Navbar -->
<div class="navbar-container">
    <div class="titulo_navbar">
        COMERCA - <span style="font-size:12px">Comercial Esquina Caliente</span>
    </div>
    <div class="dropdown_navbar">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false"><?= $_SESSION['nombre'] ?></a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li>
                    <a class="dropdown-item" href="<?=url_global?>/usuarios/perfil?ci=<?= base64_encode($_SESSION['ci']) ?>">
                        <i class="fa-regular fa-user"></i> Perfil
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="<?=url_global?>/login/logout">
                        <i class="fa-solid fa-right-from-bracket"></i> Salir
                    </a>
                </li>
            </ul>
        </li>
    </div>
</div>