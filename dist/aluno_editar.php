<!DOCTYPE html>
<html lang="pt-br">
    <?php
		$id = $_GET['id_usuario'];
		$sql = "SELECT * FROM tb_usuarios WHERE id_usuario = '$id'"; 
		include "conexao.php";
		$user  = $fusca -> prepare($sql);
		$user -> execute();
		$fusca = NULL;
		foreach($user as $u){
			$nome_usuario   = $u['nome_usuario'];
			$email_usuario  = $u['email_usuario'];
			$fone    		= $u['fone'];
			$nascimento		= $u['nascimento'];
			$perfil 		= $u['perfil'];
			$obs	    	= $u['obs'];
		}
		
		if(ISSET($_POST['salvar'])){
		    date_default_timezone_set('America/Sao_Paulo');
	        $data_hoje  = date("Y-m-d H:i");
	        session_start();
	        $id			 			= $_SESSION['id_usuario']; 
		    $nomeUsuario   			= $_POST['nome_usuario'];
		    $emailUsuario 			= $_POST['email_usuario'];
			$foneUsuario  			= $_POST['fone'];
			$nascimentoUsuario		= $_POST['nascimento'];
		    $perfilUsuario  		= $_POST['perfil'];
		    $obsUsuario   			= $_POST['obs'];
		    
		    $sql = "UPDATE tb_usuarios
		            SET 
		            nome_usuario   	= '$nomeUsuario',
		            email_usuario  	= '$emailUsuario',
		            fone   			= '$foneUsuario',
					nascimento		= '$nascimentoUsuario',
		            perfil 			= '$perfilUsuario',
		            obs    			= '$obsUsuario'	            
		            WHERE 
		            id_usuario        = '$id'";
		    include "conexao.php";
		    $userEdit  = $fusca -> prepare($sql);
		    $userEdit -> execute();
		    $fusca = NULL;
		   
		    echo "
		        <script>
		            alert('Usuário alterado com sucesso!');
		            window.location.href='aluno_listar.php';
		        </script>
		    ";			
		}
	?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Usuário - Editar</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" type="image/png" href="imagens/icon1.png">
        <script>
			function mascara(o,f){
				v_obj=o
				v_fun=f
				setTimeout("execmascara()",1)
			}
			function execmascara(){
				v_obj.value=v_fun(v_obj.value)
			}
			function mtel(v){
				v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
				v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
				v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
				return v;
			}
			function id( el ){
				return document.getElementById( el );
			}
			window.onload = function(){
				id('fone').onkeypress = function(){
					mascara( this, mtel );
				}
			}		
		</script>
    </head>
    <body class="sb-nav-fixed">
        <?php include "menu_superior.php"; ?>
        <div id="layoutSidenav">
            <?php include "menu_lateral.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h3 class="mt-4">Editar Aluno</h3>                        
                        <hr>
                        <div class="row">
                            	<div class="container">
			<form method="POST" action="">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputEmail4">Nome Completo*:</label>
						<input type="text" name='nome_usuario' value="<?php echo $nome_usuario; ?>" class="form-control" required>
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword4">E-mail*:</label>
						<input type="text" name='email_usuario' value="<?php echo $email_usuario; ?>" class="form-control" id="email_usuario" required>
					</div>
					
				</div>	
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputPassword4">Celular:</label>
						<input type="phone" name='fone'  value="<?php echo $fone; ?>" id="fone" maxlength="15" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword4">Data de Nascimento:</label>
						<input type="date" name="nascimento" class="form-control"><?php echo $nascimento; ?>					
					</div>					
				</div>	
				<div class="form-row">
					<div class="form-group col-md-12">
    					<label for="inputAddress">Observação:</label>
    					<textarea class="form-control" name='obs'><?php echo $obs; ?></textarea>
				    </div>
				</div>				
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
