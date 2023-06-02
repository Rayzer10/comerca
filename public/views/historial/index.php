<?php include("public/views/assets/header.php") ?>
    <?php if(!is_string($data)): ?>
        <main class="body_data">
            <div class="options">
                <div class="titulo">
                    <?= $titulo ?>
                </div>
                <div class="action">
                    <a href="<?=url_global?>/historial/reporte" target="_blank" class="btn btn-text btn-danger" title="Reporte">
                        <i class="fa-regular fa-file-pdf"></i> Reporte
                    </a>
                </div>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Usuario</th>
                        <th>Acción</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 1; ?>
                    <?php foreach($data as $rows): ?>
                        <tr>
                            <td><?= $num ?></td>
                            <td><?= $rows->username ?></td>
                            <td><?= $rows->accion ?></td>
                            <td><?= $rows->fecha ?></td>
                        </tr>
                    <?php $num++ ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>N°</th>
                        <th>Usuario</th>
                        <th>Acción</th>
                        <th>Fecha</th>
                    </tr>
                </tfoot>
            </table>
        </main>
    <?php else: ?>
        <h1 class="home_message">
            <?= $data ?>
        </h1>
    <?php endif ?>
<?php include("public/views/assets/scripts.php") ?>
<?php include("public/views/assets/footer.php") ?>