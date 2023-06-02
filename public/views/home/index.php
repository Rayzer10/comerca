<?php include("public/views/assets/header.php") ?>
  <!--  <h2 class="home_message">Bienvenido al sistema</h2> -->
  <style>
    .logo_body{
      padding: .1px;
    }
    .lista_cards{
      margin-top: 40px;
    }
    .lista_cards > .titulo{
      font-size: 21px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .cards{
      display: flex;
      text-align: center;
      justify-content: space-between;
    }
    .lista_cards .cards > .card{
      min-width: 300px;
    }
  </style>
  <main class="body_data">
    <div class="logo_body">
      <div class="lista_cards">
        <div class="titulo">
          Información básica
        </div>
        <div class="cards">
          <div class="card bg-success">
            <div class="card-body text-light">Total de productos: <?= count($pro) ?></div>
          </div>
          <div class="card bg-success">
            <div class="card-body text-light">Total de productos descartados: <?= count($des) ?></div>
          </div>
          <div class="card bg-success">
            <div class="card-body text-light">Total de usuarios: <?= count($usu) ?></div>
          </div>
        </div>
      </div>
      <?php if($data!=false): ?>
        <br><br>
        <table id="example" class="table table-striped" style="width:100%; background:white;">
          <thead>
              <tr>
                <div class="mb-1">
                  <div>
                      <a href="<?=url_global?>/producto/porvencerse" class="btn btn-rounded btn-danger btn-pdf" target="_blank" title="Reporte">
                          <i class="fa-solid fa-file-pdf"></i>
                          Reporte
                      </a>
                  </div>
                </div>
                <th align="center" colspan="4">Productos próximos a vencerse (1 mes o menos)</th>
              </tr>
              <tr>
                  <th>N°</th>
                  <th>código</th>
                  <th>Nombre</th>
                  <th>fecha vencimiento</th>
              </tr>
          </thead>
          <tbody>
              <?php $num = 1; ?>
              <?php foreach($data as $rows): ?>
                  <tr>
                      <td><?= $num ?></td>
                      <td><?= strtolower($rows->codigo) ?></td>
                      <td><?= $rows->nombre ?></td>
                      <td><span class=""><?= $rows->fecha_vencimiento ?></span></td>
                  </tr>
              <?php $num++ ?>
              <?php endforeach ?>
          </tbody>
          <tfoot>
              <tr>
                <th>N°</th>
                <th>código</th>
                <th>Nombre</th>
                <th>fecha vencimiento</th>
              </tr>
          </tfoot>
        </table>
      <?php endif ?>
    </div>
  </main>
<?php include("public/views/assets/scripts.php") ?>
<?php include("public/views/assets/footer.php") ?>