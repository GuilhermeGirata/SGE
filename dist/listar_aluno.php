<!DOCTYPE html>
<html lang="pt-br">
	<?php
		session_start();
		$fk_escola = $_SESSION['id_escola'];
		//============== Categorias ====================================
		include "conexao.php";
		$sql      = "
		SELECT * FROM tb_usuarios WHERE fk_escola = '$fk_escola' AND perfil = '1'";
						
		$alunos  = $fusca -> prepare($sql);
		$alunos -> execute();
		$fusca = null;
	?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Alunos</title>
       
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
                    <div class="container-fluid">
                     <div class="card-header">
                            <h1 class="mr-2">
                                Alunos:
        					</h1>
    					</div>
                        <div class="card mb-5">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0">
                                        <thead>
                							<tr> 
                								<th>Nome</th>            								
												<th>E-mail</th>             								
                							</tr>
                						</thead>                                        
                                       <tbody>
                							<?php
                							    
                								foreach($alunos as $bolacha){
													$nome  = $bolacha['nome_usuario'];										
													$email = $bolacha['email_usuario'];					
                								
                									echo "<td>".$nome."</td>";   									             									
                									echo "<td>".$email."</td>";      									
                									echo "</tr>";
                								}			
                							?>
                						</tbody>
                                    </table>
                                </div>
                            </div>
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