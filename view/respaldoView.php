<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo _NAMESYSTEM_; ?> | <?php if (!empty($action)) {
                                                echo $action;
                                            } ?> <?php if (!empty($url)) {
                                                        echo $url;
                                                    } ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once 'view/assets/menu.php'; ?>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once 'view/assets/top_menu.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Seguridad</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reportes</a> -->
                    </div>

                    <div class="container-fluid">

            

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <center>
                                    <h6 class="m-0 font-weight-bold text-primary"> Seguridad Base de Datos</h6>
                                </center>
                            </div>
                        </div>
             

         <!-- RESPALDAR-->

         <div class="container d-flex align-items-center justify-content-center">
	<div class="card w-75 mb-5">
		<div class="card-header text-center">
			<h2>Respaldar/Restaurar la Base de Datos</h2>
		</div>
		<div class="card-body">
			
			<div class="row text-center">
				
				<div class="col-md border-right py-1 btn btn-light " id="respaldar">					
					<span class="fa-stack fa-4x mb-4">
						<i class="fas fa-circle fa-stack-2x text-primary"></i>
						<i class="fa fa-file-archive fa-stack-1x fa-inverse"></i>
					</span>
					<h3>Respaldar</h3>
					<p>Crear un archivo de respaldo para la Base de Datos</p>
				
					<a class="respaldar btn btn-primary" href="#">Respaldo</a>
									
				</div>
				<div class="col-md border-left py-1 btn btn-light " id="restaurar">					
					<span class="fa-stack fa-4x mb-4">
						<i class="fas fa-circle fa-stack-2x text-primary"></i>
						<i class="fa fa-history fa-stack-1x fa-inverse"></i>
					</span>
					<h3>Restaurar</h3>
					<p>Restaurar la Base de Datos a un punto anterior</p>					
				</div>
			
			</div>
		</div>
	</div>
	
</div>

<div class="modal fade" id="modalRestaurar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog d-flex">
        <div class="modal-content">

			<div class="card">
			<div class="card-body swal2-content text-black">
				<h2 class="card-tittle text-center">Restaurar</h2>
				<hr>
				<form action="respaldo/restaurar" method="POST" target="_blank" id="formularioRestaurar">
					<div class="row justify-content-center">
						<label for="respaldo" class="col-form-label"><strong>Escoja un archivo</strong></label>
					</div>
					<div class="form-row justify-content-center m-2">
						
						<select name="respaldo" class="form-control col-md-10" required>
							<option value="" disabled="" selected="">--Seleccionar--</option>
							<?php
								$ruta="../../assets/respaldo/";
								if(is_dir($ruta)){
									if($aux=opendir($ruta)){
										while(($archivo = readdir($aux)) !== false){
											if($archivo != "." && $archivo != ".." && $archivo != ".gitignore"){
												$nombrearchivo=str_replace(".sql", "", $archivo);
												$nombrearchivo=str_replace("-", ":", $nombrearchivo);
												$ruta_completa=$ruta.$archivo;
												if(is_dir($ruta_completa)){
												}else{
													echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
												}
											}
										}
										closedir($aux);
									}
								}else{
									echo $ruta." No es ruta válida";
								}
							?>
						</select>
					</div>
					<div class="form-row justify-content-center m-2">
						<button type="submit" class="btn btn-warning  swal2-confirm swal2-styled"><i class="fa fa-history"></i> Restaurar</button>
					</div>
				</form>
			</div>


			</div>

        </div>
    </div>
</div>
    </div>


            <?php require_once 'view/assets/footer.php'; ?>
</body>
<script type="text/javascript" src="'../../assets/js/respaldar/respaldo.js"></script>

</html>