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
        if($f['columna'] == 'id') $wh .= " AND id LIKE '%" . addslashes ($f['valor']) . "%'";
        if($f['columna'] == 'estatus')  $wh .= " AND estatus  LIKE '%" . addslashes ($f['valor']) . "%'";
    }

    /* Nos conectamos a la base de datos */
    $db = new PDO("mysql:dbname=".DB_NAME.";host=".DB_SERVER.";charset=utf8",DB_USERNAME,DB_PASSWORD);

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