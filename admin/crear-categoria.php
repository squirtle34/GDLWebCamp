<?php
      include_once 'funciones/sesiones.php';
        include_once 'templates/header.php';
        include_once 'funciones/funciones.php';
        
        include_once 'templates/barra.php';
        
        include_once 'templates/navegacion.php';
?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear Categorías de Eventos
        <small>llena el formulario para crear una categoría</small>
      </h1>
    </section>

        <div class="row">
                <div class="col-md-8">
                <!-- Main content -->
                <section class="content">

                  <!-- Default box -->
                  <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Crear Categoría</h3>
                    </div>
                    <div class="box-body">
                        <!-- form start -->
                        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
                              <div class="box-body">
                                    <div class="form-group">
                                          <label for="usuario">Nombre:</label>
                                          <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Categoría">
                                    </div>
                                    <div class="form-group">
                                         <label for="">Icono:</label>
                                         <div class="input-group">
                                             <div class="input-group-addon">
                                                 <i class="fa fa-address-book"></i>
                                             </div>
                                             <input type="text" id="icono" name="icono" class="form-control pull-right" placeholder="fa-icon">
                                         </div>
                                    </div>
                              </div>
                              <!-- /.box-body -->

                              <div class="box-footer">
                                  <input type="hidden" name="registro" value="nuevo">
                                  <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
                              </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->

                </section>
                <!-- /.content -->
                
                </div>
        </div>
  </div>
  <!-- /.content-wrapper -->

  <?php
          include_once 'templates/footer.php';
  ?>

