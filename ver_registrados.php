<?php 
    include_once 'includes/funciones/funciones.php';
    session_start();
    usuario_autenticado();

?>

<?php include_once 'includes/templates/header.php'; ?>

    

        <section class="admin seccion contenedor">
              <h2>Registrados</h2>
              <p>Bienvenido <?php echo $_SESSION['usuario']; ?> </p>  
              
              <?php include_once 'includes/templates/admin_nav.php'; ?>
              
              <p>Filtros: </p>
              <nav id="filtros">
                    <a id="pagados" href="#">Pagados</a> |
                    <a id="no_pagados" href="#">No Pagados</a>
              </nav>
                
              <table class="registrados">
                    <thead>
                          <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Fecha Registro</th>
                                <th>Articulos Adquiridos</th>
                                <th>Regalo</th>
                                <th>Total Pagado</th>
                          </tr>
                    </thead>
                    
                    <tbody>
                      <?php 
                          try {
                            require_once('includes/funciones/bd_conexion.php');
                            $sql = "SELECT * FROM `registrados` INNER JOIN `regalos` ";
                            $sql .= "ON registrados.regalo=regalos.ID_regalo";
                            $resultado = $conn->query($sql);
                            while($registrados = $resultado->fetch_assoc() ) { ?>
                                  <tr class="<?php echo $registrados['pagado'] ? 'pagado' : 'no_pagado' ?>">
                                        <td><?php echo $registrados['ID_Registrado']; ?></td>
                                        <td><?php echo $registrados['nombre_registrado'] . " " . $registrados['apellido_registrado'];  ?></td>
                                        <td><?php echo $registrados['email_registrado']; ?></td>
                                        <td>
                                          <?php $fecha = $registrados['fecha_registro']; 
                                              echo date('jS F, Y H:i', strtotime($fecha));
                                          
                                          ?>
                                        </td>
                                        <td><?php $articulos = $registrados['pases_articulos'];
                                        
                                              $pedido = formatear_pedido($articulos);
                                              echo $pedido;
                                         ?>
                                        </td>
                                        <td><?php echo $registrados['nombre_regalo']; ?></td>
                                        <td>$ <?php echo $registrados['total_pagado']; ?></td>
                                  </tr>
                                  <tr>
                                    <td colspan="7">
                                          Eventos Registrados: <br>
                                          <?php $eventos = $registrados['talleres_registrados'];
                                                $sql = formatear_eventos_a_sql($eventos);
                                                $eventos_registrados = $conn->query($sql);
                                                while($eventos = $eventos_registrados->fetch_assoc()) {
                                                    foreach($eventos as $evento):
                                                          echo utf8_encode($evento) . ", ";
                                                    endforeach;  
                                                }
                                                
                                           ?>
                                          
                                    </td>
                                  </tr>
                      <?php }
                            $conn->close();
                          } catch (Exception $e) {
                            $error = $e->getMessage();
                          }
                       ?>
                    </tbody>
              </table>
        </section>
        
        
    <?php include_once 'includes/templates/footer.php'; ?>  