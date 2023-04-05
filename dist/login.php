<!DOCTYPE html>
<?php
	if(isset($_POST['login'])){
		$email_digitado = $_POST['email_usuario'];
		$senha_digitada = md5($_POST['senha_usuario']);
		
		//$sql = "
		//	SELECT * FROM tb_usuarios				
		//	WHERE 
		//	email_usuario='$email_digitado' 
		//	AND 
		//	senha_usuario='$senha_digitada'
		//";
		$sql = "
			SELECT * FROM tb_usuarios 
			INNER JOIN tb_escolas 
			ON tb_usuarios.fk_escola = tb_escolas.id_escola 
			WHERE 
			email_usuario = '$email_digitado' 
			AND 
			senha_usuario = '$senha_digitada' 
		";
		
		include "conexao.php";
		$login = $fusca -> prepare($sql);
		$login -> execute();
		
		//$sql2 = "SELECT * FROM tb_usuarios 
		//INNER JOIN tb_escolas ON tb_usuarios.fk_escola = tb_escola.id_escola 
		//WHERE email_usuario = '$email_digitado' AND senha_usuario = '$senha_digitada'" 

		
		$fusca = null;		
		$linha = $login -> rowCount();
		
		if($linha == 1){
			foreach($login as $l){
				$perfil       = $l['perfil'];				
				$nome_usuario = $l['nome_usuario'];
				$nome_escola  = $l['nome_escola'];	
				$id_escola    = $l['fk_escola'];	
			}
			
			session_start();
			$_SESSION['perfil']       = $perfil;
			$_SESSION['nome_usuario'] = $nome_usuario;
			$_SESSION['nome_escola']  = $nome_escola;
			$_SESSION['id_escola']  = $id_escola;
			
			if($perfil == '7'){
				header("Location: sge_home.php");
			}
			else{
				if($perfil == '5'){
					header("Location: adm_home.php");
				}
				else {
					echo"
						<script>
							alert('Perfil em desenvolvimento!');
							window.location.href='login.php';
						</script>
					";
				}
			}			
		}
		else{
			echo "Não permitido";
		}
		
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
                                                <label class="small mb-1" for="inputPassword">E-mail:</label>
                                                <input class="form-control py-4" type="email" name="email_usuario" placeholder="Digite seu e-mail" autofocus required /></div>
                                            <label class="small mb-1" for="inputPassword">Senha:</label>
                                                <input class="form-control py-4" type="password" name="senha_usuario" required /></div>
                                            <div class="container">
                                            <input type='submit' name='login' class="btn btn-lg btn-success btn-block" value='Login' style="margin-bottom: 10px;">
                                            </div>
                                        </form>
										<center>
										<a href='register.php'>Ainda não está Registrado? Registre-se</a>
										</center>
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
                        <div class="text-muted">Copyright &copy; Guilherme Girata - 2021</div>
                       
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
