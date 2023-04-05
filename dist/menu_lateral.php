<?php   
	session_start();
	$perfil = $_SESSION['perfil'];	
	$usuario = $_SESSION['nome_usuario'];
?>
<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion"> 
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <br>              
							
							<!-- ================= Localização única ============================ -->
                            <?php                                          
								if($perfil >= '5'){
									echo "										
										<a class='nav-link' href='adm_home.php'>
											<div class='sb-nav-link-icon'><i class='fas fa-home'></i></div>
											Painel de controle
										</a>
									";
								}
								/*if($perfil >= '3'){
									echo "	
										<a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseEmprestimos' aria-expanded='false' aria-controls='collapseCli'>
											<div class='sb-nav-link-icon'>
												<i class='fas fa-upload'></i>
											</div> 
											Empréstimos
											<div class='sb-sidenav-collapse-arrow'>
												<i class='fas fa-angle-down'></i>
											</div> 
										</a>
										<div class='collapse' id='collapseEmprestimos' aria-labelledby='headingOne' data-parent='#sidenavAccordion'>
											<nav class='sb-sidenav-menu-nested nav'>
												<a class='nav-link' href='emprestimos.php'>
													<div class='sb-nav-link-icon'><i class='fas fa-book'></i></div>
													Em aberto
												</a>														
											</nav>										
											<nav class='sb-sidenav-menu-nested nav'>
												<a class='nav-link' href='emprestimos_devolvidos.php'>
													<div class='sb-nav-link-icon'><i class='fas fa-book'></i></div>
													Devolvidos
												</a>														
											</nav>
										</div>
										
										<a class='nav-link' href='leitores.php'>
											<div class='sb-nav-link-icon'><i class='fas fa-book-reader'></i></div>
											Leitores
										</a>
										<a class='nav-link' href='livros.php'>
											<div class='sb-nav-link-icon'><i class='fas fa-book'></i></div>
											Livros
										</a>									
										
									";
								}*/							
							?>							
                            <!--===============================================================-->						
							
                            <!--================== Relatórios ===========================-->
                            <?php 
								if($perfil >= '5'){
									echo "
									<div>
										<a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseCli' aria-expanded='false' aria-controls='collapseCli'>
											<div class='sb-nav-link-icon'>
												<i class='fas fa-columns'></i>
											</div> 
											Alunos
											<div class='sb-sidenav-collapse-arrow'>
												<i class='fas fa-angle-down'></i>
											</div> 
										</a>
										<div class='collapse' id='collapseCli' aria-labelledby='headingOne' data-parent='#sidenavAccordion'>
											<nav class='sb-sidenav-menu-nested nav'>
												<a class='nav-link' href='aluno_adicionar.php'>Cadastrar</a>	
												<a class='nav-link' href='aluno_listar.php'>Listar</a>	
											</nav>											
										</div>
									</div>
									<div>
										<a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapsePro' aria-expanded='false' aria-controls='collapseCli'>
											<div class='sb-nav-link-icon'>
												<i class='fas fa-columns'></i>
											</div> 
											Professores
											<div class='sb-sidenav-collapse-arrow'>
												<i class='fas fa-angle-down'></i>
											</div> 
										</a>
										<div class='collapse' id='collapsePro' aria-labelledby='headingOne' data-parent='#sidenavAccordion'>
											<nav class='sb-sidenav-menu-nested nav'>
												<a class='nav-link' href='professor_adicionar.php'>Cadastrar</a>	
												<a class='nav-link' href='professor_listar.php'>Listar</a>	
											</nav>											
										</div>
									</div
									";								
								}
							?>
                            <!-- ================================================================ --> 
							
                           <a class="nav-link" href="logout.php"><div class="sb-nav-link-icon"><i class="fas fa-door-open"></i></div>
                                Sair
                            </a>
                        </div>
                    </div>
					
                    <div class="sb-sidenav-footer">
                        <div class="small">Logado como:</div>
                        <?php echo $usuario; ?>
                    </div>
                </nav>
            </div>
			
			<div class='modal fade' id='modalLivros' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
			  <div class='modal-dialog modal-dialog-centered modal-lg' role='document'>
				<div class='modal-content'>
				  <div class='modal-header'>
					<h5 class='modal-title' id='TituloModalCentralizado'>Gerar e baixar relatório dos livros?</h5></div>					
					<div>
					<h6 class='modal-title' id='TituloModalCentralizado'><br>&nbsp;&nbsp;&nbsp;Será gerada uma planilha com todos os livros cadastrados no sistema.<br><br></h6>					
				  </div>
				  
				  <div class='modal-footer'>
					<a class='nav-link' href='livros_excel.php'><button type='button' class='btn btn-primary'>Sim</button></a>											
					
					<button type='button' class='btn btn-secondary' data-dismiss='modal'>Sair</button>
						
				  </div>
				</div>
			  </div>
			</div>