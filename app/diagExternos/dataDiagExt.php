<?php
  require_once '../../utilerias/constantes.php';
  require_once '../../utilerias/anexgrid.php';
  try
  {
    $anexGrid = new AnexGrid();

    /* Si es que hay filtro, tenemos que crear un WHERE dinámico */
    $wh = "id > 0";
    
    foreach($anexGrid->filtros as $f)
    {
      
      if($f['columna'] == 'placa') $wh .= " AND placa LIKE '%" . addslashes ($f['valor']) . "%'";
     /*
      if($f['columna'] == 'diag')         $wh .= " AND diag               LIKE '%" . addslashes ($f['valor']) . "%'";
      if($f['columna'] == 'idDep')        $wh .= " AND idDep              LIKE '%" . addslashes ($f['valor']) . "%'";
      if($f['columna'] == 'idProv')       $wh .= " AND idProv             LIKE '%" . addslashes ($f['valor']) . "%'";
      if($f['columna'] == 'dias')         $wh .= " AND dias               LIKE '%" . addslashes ($f['valor']) . "%'";
      if($f['columna'] == 'prioridad')    $wh .= " AND prioridad          LIKE '%" . addslashes ($f['valor']) . "%'";
      if($f['columna'] == 'obs')          $wh .= " AND obs                LIKE '%" . addslashes ($f['valor']) . "%'";
      if($f['columna'] == 'idEstatus')    $wh .= " AND idEstatus          LIKE '%" . addslashes ($f['valor']) . "%'";
      if($f['columna'] == 'pendiente')    $wh .= " AND pendiente          LIKE '%" . addslashes ($f['valor']) . "%'";
      */
    }
    
    //  if($f['columna'] == 'dependencia')  $wh .= " AND dep.dependencia    LIKE '%" . addslashes ($f['valor']) . "%'";
    //  if($f['columna'] == 'provNombre')   $wh .= " AND prov.nombre        LIKE '%" . addslashes ($f['valor']) . "%'";
    // if($f['columna'] == 'estatus')      $wh .= " AND est.estatus            LIKE '%" . addslashes ($f['valor']) . "%'";

    /* Nos conectamos a la base de datos */
    //$db = new PDO("mysql:dbname=id12373928_diag;host=localhost;charset=utf8", "id12373928_ruben", "ruben" );
    $db = new PDO("mysql:dbname=".DB_NAME.";host=".DB_SERVER.";charset=utf8",DB_USERNAME,DB_PASSWORD);
    /* Nuestra consulta dinámica */
   
   
    $registros = $db->query("
      SELECT diag.id as idDiag, placa, diag, idDep, dep.dependencia, idProv, prov.nombre, dias, prioridad, obs, idEstatus, est.estatus, pendiente
      FROM tbldiagext diag
      LEFT JOIN tbldep dep
        ON diag.idDep = dep.id
      LEFT JOIN tblproveedores prov
        ON diag.idProv = prov.id
      LEFT JOIN tblestatus est
        ON diag.idEstatus = est.id
      WHERE $wh ORDER BY $anexGrid->columna $anexGrid->columna_orden
      LIMIT $anexGrid->pagina,$anexGrid->limite")->fetchAll(PDO::FETCH_ASSOC);
      // WHERE $wh ORDER BY $anexGrid->columna $anexGrid->columna_orden
      //

    $total = $db->query("
        SELECT COUNT(*) Total
        FROM tblDiagExt
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