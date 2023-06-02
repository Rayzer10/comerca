<page style="font-size:13pt">
    <style>
        .logo{
            margin: auto;
            width: 400px;
            height: 150px;
        }
        .logo img{
            width: 100%;
            height: 100%;
        }
        .rif, .titulo{
            font-weight: bold;
            text-align: center;
        }
        .rif{
            margin-top: 5px;
            margin-bottom: 50px;
        }
        .titulo{
            font-size: 22px;
            margin-bottom: 20px;
        }
        .table{
            border-collapse: collapse;
            margin: auto;
            text-align: center;
        }
        .table td, .table th{
            padding: 0px 10px;
        }
    </style>
    <?php $cont = 1; ?>
    <div class="logo">
        <img src="public/recursos/imagenes/logo_login.png" alt="">
    </div>
    <div class="rif">
        RIF. J-40783150-0
    </div>
    <div class="titulo">
        Productos más vendidos
    </div>
    <table class="table" border="1">
        <thead>
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Vendidos</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($data as $rows): ?>
            <?php ($cont%2!=0) ? $color = "background-color: #e5e5e5" : $color = "background-color: transparent"; ?>
                <tr>
                    <td style="<?= $color ?>"><?= $cont ?></td>
                    <td style="<?= $color ?>"><?= $rows->nombre ?></td>
                    <td style="<?= $color ?>"><?= $rows->categoria ?></td>
                    <td style="<?= $color ?>"><?= $rows->vendidos ?></td>
                </tr>

            <?php $cont++; endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Vendidos</th>
        </tr>
        </tfoot>
    </table>
</page>