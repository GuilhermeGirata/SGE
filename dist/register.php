<!DOCTYPE html>
<?php
	//Capturando as informações do formulário
	date_default_timezone_set("America/Cuiaba");
	if(ISSET($_POST['login'])){
		$nome      = $_POST['nome_escola'];
		$email     = $_POST['email_escola'];	
		$responsavel = $_POST['responsavel'];
		$senha = md5($_POST['senha_usuario']);
		
		//Instruções para o Banco de dados
		$sql = "INSERT INTO tb_escolas (nome_escola,responsavel) VALUES ('$nome', '$responsavel')";
		include "conexao.php";
		$cliente = $fusca -> prepare($sql);
		$cliente -> execute();
		
		$sql2 = "SELECT id_escola FROM tb_escolas ORDER BY id_escola DESC LIMIT 1";
		$escola = $fusca -> prepare($sql2);
		$escola -> execute();
		foreach($escola as $e){
			$ultimoid = $e["id_escola"];
		}
		$perfil = '5';
		$sql3 = "INSERT INTO tb_usuarios 
		(nome_usuario, email_usuario, senha_usuario, perfil, fk_escola)
		VALUES ('$responsavel', '$email', '$senha', '$perfil', '$ultimoid')";
		$user = $fusca -> prepare($sql3);
		$user -> execute();
		$fusca = NULL;
		echo"
			<script>
				alert('Escola inserida com sucesso!');
				window.location.href='login.php';
			</script>
		";
	}
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema de Gestão escolar - login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="shortcut icon" type="image/png" href="imagens/book_open.png"> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container"><br>
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="container">
                                <div class="card shadow-lg border-1 rounded-lg mt-6">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-6">Sistema de Gestão Escolar</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Nome da escola:</label>
                                                <input class="form-control py-4" type="text" name="nome_escola" placeholder="Digite o nome da escola" autofocus required />
											</div>
											<div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Responsável pela escola:</label>
                                                <input class="form-control py-4" type="text" name="responsavel" placeholder="Digite o responsável pela escola" required />
											</div>
											<div class="form-group">
                                                <label class="small mb-1" for="inputPassword">E-mail:</label>
                                                <input class="form-control py-4" type="mail" name="email_escola" placeholder="Digite o e-mail" required />
											</div>
                                            <label class="small mb-1" for="inputPassword">Senha:</label>
                                                <input class="form-control py-4" type="password" name="senha_usuario" required />
											</div>
                                            <div class="container">
                                            <input type='submit' name='login' class="btn btn-lg btn-success btn-block" value='Cadastrar' style="margin-bottom: 10px;">
                                            <center>
												<input type='button' class="btn btn-lg btn-success btn-block" value='Voltar' onclick='window.history.back();'>
											</center>
											<br>
											</div>
                                        </form>
                                    </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
               <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Professor Cezar - 2021</div>
                       
                    </div>
                </div>
			</footer>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>