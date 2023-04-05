<!DOCTYPE html>
<?php
    session_start();
	$perfil = $_SESSION['perfil'];
	$id_escola = $_SESSION['id_escola'];
	
	$sql ="SELECT * FROM tb_usuarios where perfil='1' AND fk_escola='$id_escola'";
	include "conexao.php";

	$alunos = $fusca-> prepare($sql);
	$alunos -> execute();
    
	$n_alunos = $alunos -> rowCount();
	
	$sql2 ="SELECT * FROM tb_usuarios where perfil='4' AND fk_escola='$id_escola'";
	include "conexao.php";

	$professores = $fusca-> prepare($sql2);
	$professores -> execute();
    
	$n_professores = $professores -> rowCount();
	
	$fusca = null;
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema de Gestão Escolar</title>
        
        <!-- MetisMenu CSS -->
		<link href="bootstrap/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
       <!-- DataTables Responsive CSS -->
		<link href="bootstrap/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
       
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script> 
        <!-- MetisMenu CSS -->
		<link href="bootstrap/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
		<link rel="shortcut icon" type="image/png" href="imagens/book_open.png"> 
   
    </head>
    <body class="sb-nav-fixed">
        <?php include "menu_superior.php"; ?>
        <div id="layoutSidenav">
            <?php include "menu_lateral.php"; ?>
            <div id="layoutSidenav_content">
                <main>
					<div class="container-fluid px-4">
							<h1 class="mt-4">Painel de Controle</h1>
							<ol class="breadcrumb mb-4">
								<li class="breadcrumb-item active">Sistema de Gestão escolar</li>
							</ol>
						<div class="container-fluid"><br>
								<div class="row">
									<!-- ======================================================== --> 
									<!-- ===================== Alunos ========================= -->
									<div class="col-xl-3 col-md-6">
										<div class="card bg-primary text-white mb-5">
											<div class="row">
											   
													<i style='padding-left:15px;' class="fas fa-4x fa-upload"></i>
													<div class="card-body col-xs-9 text-center">
														<div class="">Alunos</div>
													</div>
											</div>
											<div class="card-footer d-flex align-items-center justify-content-between">Total de alunos: 
												<a class="text-white stretched-link" href="aluno_listar.php"> <div class="card-body huge text-center">
														<strong><?php echo $n_alunos; ?></strong>
													</div></a>
												<div class="text-white"><i class="fas fa-angle-right"></i></div>
											</div>
										</div>
									</div>
									<!-- ======================================================== -->
									<!-- ===================== Professores ========================= -->
									<div class="col-xl-3 col-md-6">
										<div class="card bg-primary text-white mb-5">
											<div class="row">
											   
													<i style='padding-left:15px;' class="fas fa-4x fa-upload"></i>
													<div class="card-body col-xs-9 text-center">
														<div class="">Professores</div>
													</div>
											</div>
											<div class="card-footer d-flex align-items-center justify-content-between">Total de professores: 
												<a class="text-white stretched-link" href="professor_listar.php"> <div class="card-body huge text-center">
														<strong><?php echo $n_professores; ?></strong>
													</div></a>
												<div class="text-white"><i class="fas fa-angle-right"></i></div>
											</div>
										</div>
									</div>
									<!-- ======================================================== -->									
								</div>
							</div>
					</main>
                <?php include "rodape.php"; ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script> -->
        <script src="bootstrap/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        
        
        
        	<!-- jQuery -->
		<!--<script src="bootstrap/vendor/jquery/jquery.min.js"></script>-->
        
        	<!-- Bootstrap Core JavaScript -->
		<script src="bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>
        
        <!-- Metis Menu Plugin JavaScript -->
		<script src="bootstrap/vendor/metisMenu/metisMenu.min.js"></script>

        
        <!-- DataTables JavaScript -->
		<!--<script src="bootstrap/vendor/datatables/js/jquery.dataTables.js"></script>-->
        <!--<script src="bootstrap/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>-->
        <script src="bootstrap/vendor/datatables-responsive/dataTables.responsive.js"></script>
        
        	<!-- Custom Theme JavaScript -->
		<script src="bootstrap/dist/js/sb-admin-2.js"></script>
        <script>
			$(document).ready(function() {
				$('#dataTables-example').DataTable({
					responsive: true, "order": [[ 0, "asc" ]]
				});				
			});				
		</script>
		
		
    </body>
</html>
