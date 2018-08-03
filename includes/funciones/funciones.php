<?php 
function productos_json(&$boletos, &$camisas = 0, &$etiquetas = 0){
      $dias = array(0 => 'un_dia', 1 => 'pase_completo', 2 => 'pase_2dias');
      
      unset($boletos['un_dia']['precio']);
      unset($boletos['completo']['precio']);
      unset($boletos['2dias']['precio']);
      
      $total_boletos = array_combine($dias, $boletos);

      
      
      $camisas = (int) $camisas;
      if($camisas > 0):
            $total_boletos['camisas'] = $camisas;
      endif;  
      
      $etiquetas = (int) $etiquetas;
      if($etiquetas > 0):
            $total_boletos['etiquetas'] = $etiquetas;
      endif;  
      
      return json_encode($total_boletos);
}

function formatear_pedido($articulos) {
  $articulos = json_decode( $articulos, true);
  $pedido = '';
  if(array_key_exists('un_dia',$articulos)):
    $pedido .= 'Pase(s) 1 día: ' . $articulos['un_dia'] . "<br/>";
  endif;
  if(array_key_exists('pase_2dias',$articulos)):
    $pedido .= 'Pase(s) 2 día: ' . $articulos['pase_2dias'] . "<br/>";
  endif;
  if(array_key_exists('pase_completo',$articulos)):
    $pedido .= 'Pase(s) Completos: ' . $articulos['pase_completo'] . "<br/>";
  endif;
  if(array_key_exists('camisas',$articulos)):
    $pedido .= 'Camisas: ' . $articulos['camisas'] . "<br/>";
  endif;
  if(array_key_exists('etiquetas',$articulos)):
    $pedido .= 'Etiquetas: ' . $articulos['etiquetas'] . "<br/>";
  endif;
  
  return $pedido;
}

function eventos_json(&$eventos) {
  $eventos_json = array();
  foreach($eventos as $evento):
        $eventos_json['eventos'][] = $evento;
  endforeach;  
  
  return json_encode($eventos_json);
}

function formatear_eventos_a_sql($eventos) {
   $eventos = json_decode($eventos, true);
   $sql = "SELECT `nombre_evento` FROM eventos WHERE clave = 'a' ";
   
   foreach($eventos['eventos'] as $evento):
         $sql .= " OR clave = '{$evento}'";
   endforeach; 
   
   return $sql;
}

