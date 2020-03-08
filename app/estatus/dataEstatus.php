<?php
  require_once 'anexgrid.php';
  try
  {
    $anexGrid = new AnexGrid();

    /* Si es que hay filtro, tenemos que crear un WHERE dinámico */
    $wh = "id > 0";

    foreach($anexGrid->filtros as $f)
    {
        if($f['columna'] == 'id') $wh .= " AND id LIKE '%" . addslashes ($f['valor']) . "%'";
        if($f['columna'] == 'estatus')  $wh .= " AND estatus  LIKE '%" . addslashes ($f['valor']) . "%'";
    }

    /* Nos conectamos a la base de datos */
    $db = new PDO("mysql:dbname=de;host=localhost;charset=utf8", "root", "" );

    /* Nuestra consulta dinámica */
    $registros = $db->query("
        SELECT * FROM tblEstatus
        WHERE $wh ORDER BY $anexGrid->columna $anexGrid->columna_orden
        LIMIT $anexGrid->pagina,$anexGrid->limite")->fetchAll(PDO::FETCH_ASSOC
     );

    $total = $db->query("
        SELECT COUNT(*) Total
        FROM tblEstatus
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