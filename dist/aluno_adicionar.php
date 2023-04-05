<!DOCTYPE html>
<?php
	session_start();
	$id_escola = $_SESSION['id_escola'];
	
	if(isset($_POST['salvar'])){
		$nome      = $_POST['nome'];
		$email     = $_POST['email'];
		$perfil    = "1";
		
		$sql = "
			INSERT INTO tb_usuarios 
			(fk_escola, nome_usuario, email_usuario, perfil) 
			VALUES 
			('$id_escola','$nome','$email','$perfil')";	
		include "conexao.php";
		$user = $fusca -> prepare($sql);
		$user -> execute();
		$fusca = null;
		echo"
			<script>
				alert('Aluno cadastrado com sucesso!');
				window.location.href='aluno_listar.php';
			</script>
		";
	}
?>
<html lang="pt-br">
   
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Aluno Cadastrar</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
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
                    <div class="container-fluid">
                        <h3 class="mt-4">Inserir novo aluno:</h3>
                        
                        <hr>
                        <div class="row">
							<div class="container">
								<form method="POST" action="">
									<div class="form-row">
										<div class="form-group col-md-12">
											<label for="inputEmail4">Nome:</label>
											<input type="text" name='nome' class="form-control" autofocus required>
										</div>
									</div><br>
									<div class="form-row">
										<div class="form-group col-md-12">
											<label for="inputEmail4">E-mail:</label>
											<input type="mail" name='email' class="form-control" >			
										</div>					
									</div><br>				
									<input type='submit' class="btn btn-primary" value='Salvar' name='salvar'>
									<input type='button' class="btn btn-primary" value='Voltar' onclick='window.history.back();'>
									<br><br>
								</form>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>