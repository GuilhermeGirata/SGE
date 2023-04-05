<!DOCTYPE html>
<?php
	session_start();
	$perfil = $_SESSION['perfil'];
	$id_escola = $_SESSION['id_escola'];
	
	if($perfil != 7){
		echo "
			<script>
				alert('Usuário sem permissão de acesso');
				window.location.href='login.php';
			</script>
		";			
	}
	
	$sql ="SELECT * FROM tb_escolas";
	include "conexao.php";

	$escolas = $fusca-> prepare($sql);
	$escolas -> execute();
    
	$sql2 ="SELECT * FROM tb_usuarios where perfil='1'";
	
	$alunos = $fusca-> prepare($sql2);
	$alunos -> execute();
	
	$n_escolas = $escolas -> rowCount();
	$n_alunos = $alunos -> rowCount();
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Painel de controle - SGE</title>
        <!--
		<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
		-->
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
	<?php
	include "menu_superior.php";
	?>
        <div id="layoutSidenav">
		<?php
		include "menu_lateral.php";
		?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Painel de Controle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Sistema de Gestão escolar</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Escolas<br><?php echo $n_escolas; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Mais detalhes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Alunos<br><?php echo $n_alunos; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Mais detalhes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
				<?php
				include "rodape.php"
				?>
            </div>
        </div>
        <!-- Removido por Cezar Jenzura
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
		-->
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
