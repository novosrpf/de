<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Listado de diagnosticos externos</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/estiloAzul.css" />
        <script src="assets/js/jquery.js"></script>
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
              <!--   -->
            </div>
        </div>

        <script>
            $(document).ready(function(){
                $("#list").anexGrid({
                    class: 'table-striped table-bordered table-condensed table-hover',
                    columnas: [
                        { leyenda: 'Placa',         style: 'width:60px;',  ordenable: true,   filtro: true,   columna: 'placa'  },
                        { leyenda: 'Diagnostico',   style: 'width:30px;',  ordenable: true,   filtro: true,   columna: 'diag' },
                        { leyenda: 'Pendiente',     style: 'width:30px;',  ordenable: true,   filtro: true,   columna: 'pend' },
                        { leyenda: 'Dependencia',   style: 'width:30px;',  ordenable: true,   filtro: true,   columna: 'dep' },
                        { leyenda: 'Proveedor',     style: 'width:100px;', ordenable: true,   filtro: true,   columna: 'prov' },
                        { leyenda: 'Dias',          style: 'width:100px;', ordenable: true,   filtro: false,  columna: 'dias' },
                        { leyenda: 'Prioridad',     style: 'width:100px;', ordenable: false,  filtro: false,  columna: 'prioridad' },
                        { leyenda: 'Observaciones', style: 'width:100px;', ordenable: false,  filtro: false,  columna: 'obs' },
                        { leyenda: 'Editar',        style: 'width:50px;',  ordenable: false, filtro: false, columna: 'editar' }
                    ],
                    modelo: [
                        { propiedad: 'placa' },
                        { propiedad: 'diag', },
                        { propiedad: 'pend' },
                        { propiedad: 'dep' },
                        { propiedad: 'prov' },
                        { propiedad: 'dias' },
                        { propiedad: 'prioridad' },
                        { propiedad: 'obs' },

                        { formato: function(tr, obj, celda){
                          return anexGrid_link({
                            class: 'btn-warning btn-xs btn-block',
                            contenido: 'Editar',
                            href: 'formActualizaDiag.php?id=' + obj.id
                          });
                        }},
                    ],
                    url: 'data.php',
                    paginable: true,
                    filtrable: true,
                    limite: [20, 60, 100],
                    columna: 'placa, diag',
                    columna_orden: 'ASC'
                });
            })
        </script>

        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.anexgrid.js"></script>
    </body>
</html>