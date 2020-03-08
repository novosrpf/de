<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Listado de proveedores</title>
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
                    <div class="lead">
                        <h1>Listado de proveedores</h1>
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
                        { leyenda: 'Numero',  style: 'width:30px;',   ordenable: true, filtro: true, columna: 'id'  },
                        { leyenda: 'Nombre',  style: 'width:100px;',  ordenable: true, filtro: true, columna: 'nombre' },
                        { leyenda: 'Celular', style: 'width:100px;',  ordenable: true, filtro: true, columna: 'cel' },
                        { leyenda: 'Correo',  style: 'width:100px;',  ordenable: true, filtro: true, columna: 'correo' },
                       
                    ],
                    modelo: [
                        { propiedad: 'numero' },
                        { propiedad: 'nombre' },
                        { propiedad: 'cel' },
                        { propiedad: 'correo' },

                    ],
                    url: 'dataProveedores.php',
                    paginable: true,
                    filtrable: true,
                    limite: [20, 60, 100],
                    columna: 'nombre',
                    columna_orden: 'ASC'
                });
            })
        </script>

        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/js/jquery.anexgrid.js"></script>
    </body>
</html>