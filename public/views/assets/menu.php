
<div class="menu">
    <ul>
        <li>
            <a href="<?=url_global?>/tablero">
                <div class="logo">
                    <img src="<?= url_global ?>/public/recursos/imagenes/logo.png" alt="" srcset="">
                </div>
            </a>
        </li>
        <li data-name="tablero">
            <a href="<?=url_global?>/tablero">
                <span class="icon"><i class="fa-solid fa-table"></i></span>
                <span class="title">TABLERO</span>
            </a>
        </li>
        <li data-name="categoria">
            <a href="<?=url_global?>/categoria">
                <span class="icon"><i class="fa-solid fa-c"></i></span>
                <span class="title">CATEGORÍAS</span>
            </a>
        </li>
        <li data-name="marca">
            <a href="<?=url_global?>/marca">
                <span class="icon"><i class="fa-solid fa-copyright"></i></span>
                <span class="title">MARCAS</span>
            </a>
        </li>
        <li data-name="proveedor">
            <a href="<?=url_global?>/proveedor">
                <span class="icon"><i class="fa-solid fa-truck-field"></i></span>
                <span class="title">PROVEEDORES</span>
            </a>
        </li>
        <li data-name="producto">
            <a href="<?=url_global?>/producto">
                <span class="icon"><i class="fa-solid fa-box"></i></span>
                <span class="title">PRODUCTOS</span>
            </a>
        </li>
        <?php if($_SESSION['rol'] == 1): ?>
            <li data-name="usuarios">
                <a href="<?=url_global?>/usuarios">
                    <span class="icon"><i class="fa-regular fa-user"></i></span>
                    <span class="title">USUARIOS</span>
                </a>
            </li>
        <?php endif ?>
        <li data-name="historial">
            <a href="<?=url_global?>/historial">
                <span class="icon"><i class="fa-solid fa-rotate-right"></i></span>
                <span class="title">HISTORIAL</span>
            </a>
        </li>
    </ul>
</div>