<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Listado de diagnosticos externos</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../../assets/css/estiloAzul.css" />
        <script src="../../assets/js/jquery.js"></script>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="jumbotron">
                        <h1>Listado de diagnosticos externos</h1>
                    </div>
                    <div id="list"></div>
                </div>
            </div>

            <div class="text-center well">
              <footer>
              <p>Rubén Palos Flores</p>
              </footer>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                $("#list").anexGrid({
                    class: 'table-striped table-bordered table-condensed table-hover',
                    columnas: [
                        { leyenda: 'Placa',       style: 'width:60px;',  ordenable: true, filtro: true, columna: 'placa'  },
                        { leyenda: 'Diagnostico', style: 'width:30px;',  ordenable: true, filtro: true, columna: 'diag' },                
                        { leyenda: 'IdDep',       style: 'width:30px;',  ordenable: true, filtro: true, columna: 'idDep' },
                        { leyenda: 'Dep/Ent',     style: 'width:30px;',  ordenable: true, filtro: false, columna: 'dep.dependencia' },
                        { leyenda: 'IdProv',      style: 'width:30px;',  ordenable: true, filtro: true, columna: 'idProv' },
                        { leyenda: 'Proveedor',   style: 'width:30px;',  ordenable: true, filtro: false, columna: 'prov.nombre' },
                        { leyenda: 'Dias',        style: 'width:100px;', ordenable: true, filtro: true, columna: 'dias' },
                        { leyenda: 'Prioridad',   style: 'width:100px;', ordenable: true, filtro: true, columna: 'prioridad' },
                        { leyenda: 'Obs',         style: 'width:100px;', ordenable: true, filtro: true, columna: 'obs' },                        
                        { leyenda: 'Estatus',     style: 'width:50px;',  ordenable: true, filtro: false, columna: 'est.estatus' },
                        { leyenda: 'Pendiente',   style: 'width:50px;',  ordenable: true, filtro: true, columna: 'pendiente' },
                        { leyenda: 'Operaciones',   style: 'width:50px;',  ordenable: false, filtro: false, columna: 'operaciones' },
                    ],
                    modelo: [
                        { propiedad: 'placa' },
                        { propiedad: 'diag' },
                        { propiedad: 'idDep' },
                        { propiedad: 'dependencia' },
                        { propiedad: 'idProv' },
                        { propiedad: 'nombre' },
                        { propiedad: 'dias' },
                        { propiedad: 'prioridad' },
                        { propiedad: 'obs' },
                        { propiedad: 'Estatus' },
                        { propiedad: 'pendiente' },
                        { formato: function(tr, obj, celda){
                          return anexGrid_link({
                            class: 'btn-warning btn-xs btn-block',
                            contenido: 'Editar',
                            href: 'formActualizaDiag.php?id=' + obj.id
                          });
                        }},
                    ],
                    url: 'dataDiagExt.php',
                    paginable: true,
                    filtrable: true,
                    limite: [20, 60, 100],
                    columna: 'placa, diag ',
                    columna_orden: 'ASC'
                });
            })
        </script>

        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/js/jquery.anexgrid.js"></script>
    </body>
</html>