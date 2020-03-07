<?php
  require_once 'anexgrid.php';
  try
  {
    $anexGrid = new AnexGrid();

    /* Si es que hay filtro, tenemos que crear un WHERE dinámico */
    $wh = "id > 0";

    foreach($anexGrid->filtros as $f)
    {
        if($f['columna'] == 'placa') $wh .= " AND placa LIKE '%" . addslashes ($f['valor']) . "%'";
        if($f['columna'] == 'diag')  $wh .= " AND diag  LIKE '%" . addslashes ($f['valor']) . "%'";
        if($f['columna'] == 'pend')  $wh .= " AND pend  LIKE '%" . addslashes ($f['valor']) . "%'";
        if($f['columna'] == 'dep')   $wh .= " AND dep   LIKE '%" . addslashes ($f['valor']) . "%'";
        if($f['columna'] == 'prov')  $wh .= " AND prov  LIKE '%" . addslashes ($f['valor']) . "%'";




        /*
        if($f['columna'] == 'estado')      $wh .= " AND estado LIKE '%" . addslashes ($f['valor']) . "%'";
        if($f['columna'] == 'avisado')     $wh .= " AND avisado LIKE '%" . addslashes ($f['valor']) . "%'";
         if($f['columna'] == 'precio')     $wh .= " AND avisado LIKE '" . addslashes ($f['valor']) . "'";
         */
    }

    /* Nos conectamos a la base de datos */
    $db = new PDO("mysql:dbname=id12373928_diag;host=localhost;charset=utf8", "id12373928_ruben", "ruben" );

    /* Nuestra consulta dinámica */
    $registros = $db->query("
        SELECT * FROM diaexternos
        WHERE $wh ORDER BY $anexGrid->columna $anexGrid->columna_orden
        LIMIT $anexGrid->pagina,$anexGrid->limite")->fetchAll(PDO::FETCH_ASSOC
     );

    $total = $db->query("
        SELECT COUNT(*) Total
        FROM diaexternos
        WHERE $wh
    ")->fetchObject()->Total;

    header('Content-type: application/json');
    print_r($anexGrid->responde($registros, $total));
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
?>