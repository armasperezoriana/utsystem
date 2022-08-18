<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo _NAMESYSTEM_; ?> | <?php if(!empty($action)){echo $action; } ?> <?php if(!empty($url)){echo $url;} ?></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once'view/assets/menu.php'; ?>
        <!-- End of Sidebar -->
        

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once'view/assets/top_menu.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bitácora del Sistema</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reportes</a> -->
                    </div>

                    <div class="container-fluid">

                    <!-- LEYENDA DEL MODULO -->
                    <p class="mb-4">En este módulo podrá visualizar todos los cambios registrados en el sistema y en cada uno de los módulos <a target="_blank"> 
                           </a></p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                         <center>   <h6 class="m-0 font-weight-bold text-primary">Bitácora del Sistema</h6></center> 
                        </div>
                         
                        </div>
                               <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                        data-target="#exampleModal">
                                                       Respaldo de la BD
                                                    </button>
                                                    <a class="nav-link collapsed"  href="<?=_ROUTE_ ?>Esteganografia"
                    >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Imagen de Seguridad</span>
                </a>
                                        
                                    </a>
                        </div>
                        <br>
                        <div class="table-responsive">
                        <div class="card-body" style='background:;'>
                            <div class="row" style='font-size:0.9em;'>
                                <table class="table table-striped datatable col-sm-12" id="" >
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Identificador</th>
                                            <th>Usuario</th>
                                            <th>Acción</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                             <th><center>Módulo</center></th>
                                              <th></th>
                                                <th></th>
                                        </tr>
                                    </thead>
                          
                                    <tbody>
                                        <?php foreach ($bitacora as $value): ?>
                                            <?php if (!empty($value['id_bitacora'])): ?>
                                        <tr>
                                             <td><?=$value['id_bitacora']?></td>
                                            <td><?=$value['cedula']?></td>
                                            <td><?=$value['usuario']?></td>
                                            <td><?=$value['operacion']?></td>
                                            <td><?=$value['fecha']?></td>
                                            <td><?=$value['hora']?></td>
                                            <td><?=$value['tabla']?></td>
                                            <td> 

                        <div class="col-sm-7" style='text-align:right;'>

                              <td> </td>
                                        </tr>

                                            <?php endif ?>
                                        <?php endforeach ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>   <!-- MODAL DE ayuda-->
                    
                             <div class="col-sm-7" style='text-align:right;'>
                            <span class="btn btn-primary" href="#" data-toggle="modal" data-target="#AyudaModal">
                                Ayuda
                            </span>

                        </div>  

        
          <?php require_once'view/assets/footer.php'; ?>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

   

 <!-- MODULo de AYUDA -->

               <a class="scroll-to-top rounded" href="#page-top">
                            <i class="fas fa-angle-up"></i>
                        </a>
                        <style type="text/css">
                            .modal{
                                font-size:0.8em;
                            }
                        </style>
                        <div class="modal fade" id="AyudaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding:0;">
                            <div class="container">
                                    <div class="modal-dialog">
                                        <div class="" role="document">
                                            <div class="modal-content">

                        <div class="modal-content">
                            <div class="modal-header bg-primary" style="color:#FFF">
                                <h5 class="modal-title" id="exampleModalLabel"><center>Módulo de ayuda</center></h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
  
   <div class="col-sm-7" style='text-align:right;'>
                            <span href="#" data-toggle="modal" data-target="#AyudaModal">
                            
                            </span>
                        </div>

                            <div class="modal-body">
                                  <p>
                               En este modulo se podrán visualizar todos los movimientos realizados por los usuarios en el sistema desde los registros, a las modificaciones y las eliminaciones
                  <br><br>
                  4. Para volver al menu principal presione "volver" situado en la parte inferior derecha
                  <br><br>
                  5. Para cerrar esta ventana emergente y seguir con el sistema presione e "cerrar"
                  <br><br>
                  6. Para hacer una busqueda dentro del modulo debe ingresar el nombre completo del dato que desea buscar

                </p>
              </div> 
                 <div class="modal-footer">
                                <button class=" btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>

                            </div>
                              </div>
                                </div>  
                            </div>
                              </div>

 <!-- MODULo de ELIMINAR -->

</body>
<!-- 
<script type="text/javascript" src="'../../assets/js/usuario/validacion.js"></script> -->
 
</html>