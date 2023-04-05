<!DOCTYPE html>
<html lang="pt-br">
	<?php
		//============== Categorias ====================================
		include "conexao.php";
		$sql2      = "
						SELECT * FROM tb_livros
						INNER JOIN
						tb_categorias
						ON tb_livros.fk_categoria = tb_categorias.id_categoria
					"; 
		$livros  = $fusca -> prepare($sql2);
		$livros -> execute();
		$fusca = null;
	?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Livros</title>
       
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
                            <h4 class="mr-2">
                                Livros:
        				        <?php
                                    if($perfil >= '3'){
                                        echo "
                    				        <a href='livro_add.php' style='float:right' type='button' class='btn btn-primary btn-sm' title='Adicionar novo livro'>
                    				            Novo livro
                    						</a>										   
            						    ";
                                    }
        						?>		
								
        					</h4>
    					</div>
                        <div class="card mb-5">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0">
                                        <thead>
                							<tr>
                								<th>Código</th>
                								<th>Categoria</th>
                								<th>Título</th>
                								<th>Autor</th>
                								<th>Editora</th>
												<?php
                    								if($perfil >= '1'){
														echo "<th width='80px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Controle&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
													}
                								?>                								
                							</tr>
                						</thead>                                        
                                       <tbody>
                							<?php
                							    $perfil     =  $_SESSION['perfil'];
                								foreach($livros as $bolacha){
                									$id          = $bolacha['id_livro']; 
                									$codigo      = $bolacha['cod_interno']; 
                									$categoria   = $bolacha['cat_desc'];
                									$titulo      = $bolacha['titulo'];
                									$autor       = $bolacha['autor'];
                									$editora     = $bolacha['editora'];
                									$ano         = $bolacha['ano_publicacao'];
                									$localizacao = $bolacha['localizacao'];
                									//$isbn        = $bolacha['isbn'];
                									$quantidade  = $bolacha['quantidade'];
                									$obs         = $bolacha['observacao'];
													
                									$editar    = "&nbsp;&nbsp;<a href='livro_editar.php?id=$id'><span title='Alterar $titulo' <i class='far fa-edit' style='font-size:20px'></i></a>&nbsp;";
                									
													if($quantidade == "0"){
														$emprestar = "&nbsp;&nbsp;<i title='Livro já emprestado' class='fas fa-upload' style='font-size:20px; color:red'></i>&nbsp;";
													}
													else{
														$emprestar = "&nbsp;&nbsp;<a href='emprestimo_add.php?id=$id'><span title='Emprestar $titulo' <i class='fas fa-upload' style='font-size:20px'></i></a>&nbsp;";
													}
                									$excluir   = "&nbsp;&nbsp;<a href='livro_excluir.php?id=$id&titulo=$titulo' title='Excluir $titulo'><i class='far fa-trash-alt' style='font-size:20px'></i></a>";
                									
                									//== botao modal ==
													$btnModal ="<i class='fas fa-info-circle' data-toggle='modal' data-target='#ExemploModa".$id."lCentralizado' style='font-size:20px; cursor: pointer; color: #007BFF;' title='Mais informações sobre $titulo'></i>&nbsp;";
													
													//== Modal completo
													echo "
													<!-- Modal -->
														<div class='modal fade' id='ExemploModa".$id."lCentralizado' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
														  <div class='modal-dialog modal-dialog-centered modal-lg' role='document'>
															<div class='modal-content'>
															  <div class='modal-header'>
																<h5 class='modal-title' id='TituloModalCentralizado'>Código: $codigo</h5>
																<button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
																  <span aria-hidden='true'>&times;</span>
																</button>
															  </div>
															  <div class='modal-body'>
																<strong>Título:</strong> $titulo<hr>
																<strong>Categoria:</strong> $categoria<hr>
																<strong>Autor:</strong> $autor<hr>
																<strong>Editora:</strong> $editora<hr>
																<strong>Publicação:</strong> $ano<hr>
																<strong>Localização:</strong> $localizacao<hr>
																<strong>Observação:</strong> $obs<br>																
															  </div>
															  <div class='modal-footer'>
																<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>																
															  </div>
															</div>
														  </div>
														</div>													
													";													 
                								
                									echo "<tr>";
                									echo "<td>".$codigo."</td>";
                									echo "<td>".$categoria."</td>";
                									echo "<td>".$titulo."</td>";                								
                									echo "<td>".$autor."</td>";
                									echo "<td>".$editora."</td>";                									
                									
                									if($perfil >= '3'){
                									    echo "<td align='center'>";
														echo $btnModal;
														echo $emprestar;
                    									echo $editar;
                    									echo $excluir;
														echo "</td>";
													}
													else{
														echo "<td align='center'>";
														echo $btnModal;
														echo $emprestar;
                    									//echo $editar;
                    									//echo $excluir;
														echo "</td>";
													}
                									
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
